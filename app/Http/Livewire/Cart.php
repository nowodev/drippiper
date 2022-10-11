<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
        $cartItems = CartModel::query()->whereIn('user_id', [2, 3])
            ->with('product:id,name,cover_image')->get();

        // get logged in customer
        // $cartItems = CartModel::query()->whereUserId(auth()->id())->get();

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

        $this->emit('cartUpdated');

        $this->alert('success', 'Item removed from cart.');
    }

    // Checkout
    public function checkout($cartItems)
    {
        DB::transaction(function () use ($cartItems) {

            $batchNo = sprintf('%s%06s', 'ZEYB', mt_rand(1000, 9999));

            // Insert into batches table
            $batch = auth()->user()->batches()->create([
                'batch_no'    => $batchNo,
                'order_items' => count($cartItems)
            ]);

            foreach ($cartItems as $cart) {
                $orderNo = sprintf('%s%06s', 'ZEY', mt_rand(10000, 99999));

                $data = [
                    'order_no'     => $orderNo,
                    'concept_id'   => $cart['concept_id'],
                    'concept_uuid' => $cart['concept_uuid'],
                    'concept_name' => $cart['concept_name'],
                    'price'        => $cart['price'],
                    'units'        => $cart['units'],
                    'total'        => $cart['total'],
                ];

                // Insert into orders table
                $batch->orders()->create($data);
            }

            // Empty cart
            CartModel::query()->whereUserId(auth()->id())->delete();
        });

        $this->emit('cartUpdated');

        // Close checkout slide-over

        $this->alert('success', 'Order submitted.');
    }
}
