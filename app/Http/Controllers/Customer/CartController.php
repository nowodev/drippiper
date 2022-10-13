<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $user_id = 2)
    {
        $cart = Cart::where('user_id', $user_id)->get();

        // return new CartCollection($cart);
    }

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
            'quantity'   => 'required|numeric|min:1|max:10',
        ]);

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

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    /**
     * Display the specified cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified cart in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'price'      => 'required',
            'quantity'   => 'required|numeric|min:1|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $total = $request->price * $request->quantity;

        $cart->update([
            'price'      => $request->price,
            'quantity'   => $request->quantity,
            'total'      => $total
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'Cart updated successfully',
            'data' => $cart
        ], 200);
    }

    /**
     * Remove the specified cart from storage.
     *
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json([
            'error' => 0,
            'message' => 'Cart deleted successfully',
        ], 200);
    }
}
