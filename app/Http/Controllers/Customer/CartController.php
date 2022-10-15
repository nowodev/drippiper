<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Enums\OrderStatus;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Store a newly created cart in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'size'       => 'required',
            'colour'     => 'required',
            'quantity'   => 'required|numeric|min:1',
        ]);

        DB::transaction(function () use ($data) {

            $productId = $data['product_id'];
            $price     = Product::find($productId)->price;
            $quantity  = $data['quantity'];

            // Get stock ID to determine exact product customer wants.
            $stockId = Stock::whereProductId($productId)
                ->whereSize($data['size'])
                ->whereColour($data['colour'])
                ->first()
                ->id;

            Cart::create([
                'uuid'       => Str::uuid(),
                'user_id'    => auth()->id(),
                'product_id' => $productId,
                'stock_id'   => $stockId,
                'price'      => $price,
                'quantity'   => $quantity,
                'total'      => $price * $quantity
            ]);
        });

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    public function checkout(Request $request)
    {
        $cartItems = Cart::query()->whereUserId(auth()->id())
            ->with('product', 'product.category')->get();

        $total = $cartItems->sum('total');

        return view('customer.frontend.checkout', compact('cartItems', 'total'));
    }

    public function confirmOrder(Request $request)
    {
        $data = $request->validate([
            'email'   => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user())],
            'phone'   => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city'    => ['required', 'string', 'max:255'],
            'state'   => ['required', 'string', 'max:255'],
            'zip'     => ['nullable', 'string', 'max:255'],
        ]);

        $cartItems = Cart::whereUserId(auth()->id())->with('product', 'stock')->get();

        // Check if there's enough quantity for this order

        $error = [];

        foreach ($cartItems as $cart) {
            $qtyDifference = $cart->stock->quantity - $cart->quantity;

            if ($qtyDifference <= 0) {
                $error[] = "There is/are only {$cart->stock->quantity} quantity left for this {$cart->product->name} colour {$cart->stock->colour}. Please reduce the quantity in the cart.";
            }
        }

        if ($error) return redirect()->back()->with('error', $error);


        return redirect()->route('customer.checkout.pay');
    }

    public function pay()
    {
        $total = Cart::whereUserId(auth()->id())->sum('total');

        return view('customer.frontend.pay', compact('total'));
    }

    public function confirmPayment($reference)
    {
        // T781087639505013

        $response = Http::withHeaders([
            'Authorization' => 'Bearer sk_test_db76df1736de145071b4607f8d9d9559b71dde9b'
        ])
            ->get('https://api.paystack.co/transaction/verify/' . $reference)->json();

        $user = User::whereEmail(data_get($response, 'data.customer.email'))
            ->find(auth()->id());

        $cartItems = Cart::whereUserId($user->id)->with('stock')->get();

        $total = $cartItems->sum('total');

        DB::transaction(function () use ($user, $cartItems, $total, $reference, $response) {

            // Create Order
            $order = Order::create([
                'user_id'      => $user->id,
                'order_no'     => sprintf('%s%06s', 'PPWR', mt_rand(1000, 9999)),
                'order_items'  => count($cartItems),
                'order_status' => OrderStatus::PROCESSING->value,
                'order_total'  => $total
            ]);

            foreach ($cartItems as $cart) {
                $data = [
                    'product_id' => $cart['product_id'],
                    'stock_id'   => $cart['stock_id'],
                    'price'      => $cart['price'],
                    'quantity'   => $cart['quantity'],
                    'total'      => $cart['total'],
                ];

                $newStockQty = $cart->stock->quantity - $cart->quantity;

                // Update stock quantity
                $cart->stock()->update(['quantity' => $newStockQty]);

                // Create Order
                $order->order_items()->create($data);
            }

            // Store transaction

            Transaction::create([
                'user_id'       => $user->id,
                'order_id'      => $order->id,
                'reference'     => $reference,
                'message'       => data_get($response, 'message'),
                'customer_code' => data_get($response, 'data.customer.customer_code'),
                'amount'        => data_get($response, 'data.amount') / 100,             // converting from kobo to naira
                'channel'       => data_get($response, 'data.channel'),
                'fees'          => data_get($response, 'data.fees') / 100,               // converting from kobo to naira
                'paid_at'       => data_get($response, 'data.paidAt'),
            ]);

            // Empty cart
            $cart->each(fn ($cart) => $cart->where('user_id', $user->id)->delete());
        });

        return redirect()->route('customer.thanks');
    }

    public function thanks()
    {
        return view('customer.frontend.thanks');
    }
}
