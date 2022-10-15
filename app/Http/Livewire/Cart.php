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
    public $cartItems;
    public $total;

    protected $listeners = ['cartUpdated'];

    public function mount()
    {
        $this->cartCount = CartModel::whereUserId(auth()->id())->count();
    }

    public function render()
    {
        $this->cartItems = CartModel::query()->whereUserId(auth()->id())
            ->with('product:id,name,cover_image')->get();

        $this->total = $this->cartItems->sum('total');

        return view('livewire.cart');
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
}
