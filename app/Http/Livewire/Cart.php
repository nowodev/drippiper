<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Enums\OrderStatus;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;

    public $cartCount = 0;

    protected $listeners = ['cartUpdated'];

    public function mount()
    {
        $this->cartCount = CartModel::count();
    }

    public function render()
    {
        $cartItems = CartModel::query()->whereUserId(auth()->id())
            ->with('product:id,name,cover_image')->get();

        $total = $cartItems->sum('total');

        return view('livewire.cart', compact('cartItems', 'total'));
    }

    // Event Listener to display cart count
    public function cartUpdated()
    {
        $this->cartCount = CartModel::count();
    }

    // Increase item in cart by 1
    public function increaseQuantity($quantity, $cartId)
    {
        DB::transaction(function () use ($quantity, $cartId) {

            $cart = CartModel::query()->find($cartId);

            // Get current quantity of item in the cart
            $currentQuantityInCart = $cart?->quantity;

            // Get current amount of item in the cart
            $currentAmountInCart = $cart?->total;

            // Get new amount to add to cart
            $newAmount = ($currentAmountInCart / $currentQuantityInCart) + $currentAmountInCart;

            // Add item to cart for the authenticated user and if item already exists,
            // increase the unit item
            $cart->update(
                [
                    'quantity' => ++$quantity,
                    'total'    => $newAmount
                ]
            );
        });
    }

    // Reduce item in cart by 1
    public function reduceQuantity($quantity, $cartId)
    {
        // Ensure the least quantity is 1, and not something like -1
        // $quantity = $quantity == 1 ? 1 : --$quantity;
        DB::transaction(function () use ($quantity, $cartId) {

            if ($quantity == 1) {
                return;
            } else {
                $cart = CartModel::query()->find($cartId);

                // Get current units of item in the cart
                $currentQuantityInCart = $cart?->quantity;

                // Get current amount of item in the cart
                $currentAmountInCart = $cart?->total;

                // Get new amount to add to cart
                $newAmount = $currentAmountInCart - ($currentAmountInCart / $currentQuantityInCart);

                // Add item to cart for the authenticated user and if item already exists,
                // increase the unit item
                $cart->update(
                    [
                        'quantity' => --$quantity,
                        'total'    => $newAmount
                    ]
                );
            }
        });
    }

    // Remove item from cart
    public function removeItemFromCart($cartId)
    {
        CartModel::query()->find($cartId)->delete();

        $this->dispatchBrowserEvent('close-cart');

        $this->alert('success', 'Item removed from cart.');
    }

    // Checkout
    public function checkout($cartItems)
    {
        DB::transaction(function () use ($cartItems) {

            $order = Order::create([
                'user_id'      => auth()->id(),
                'order_no'     => sprintf('%s%06s', 'PPWR', mt_rand(1000, 9999)),
                'order_items'  => count($cartItems),
                'order_status' => OrderStatus::PROCESSING->value,
            ]);

            $orderTotal = [];

            foreach ($cartItems as $cart) {
                $data = [
                    'product_id' => $cart['product_id'],
                    'stock_id'   => $cart['stock_id'],
                    'price'      => $cart['price'],
                    'quantity'   => $cart['quantity'],
                    'total'      => $cart['total'],
                ];

                $orderTotal[] = $cart['total'];

                $order->order_items()->create($data);
            }

            // Add order total
            $order->update(['order_total' => collect($orderTotal)->sum()]);

            // Empty cart
            CartModel::query()->whereUserId(auth()->id())->delete();

            $this->cartCount = 0;
        });

        // Close checkout slide-over
        $this->dispatchBrowserEvent('close-cart');

        $this->alert('success', 'Order submitted.');
    }
}
