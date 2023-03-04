<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $product;
    public $productId;
    public $sizes;
    public $size;
    public $totalQuantity;
    public $quantity;

    public function mount()
    {
        $this->product = ModelsProduct::with('category:id,name', 'stocks', 'images')
            ->find($this->productId);

        $this->sizes = Stock::where('product_id', $this->product->id)
            ->distinct()
            ->get();
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function updatedSize($size)
    {
        if (!is_null($size)) {
            $this->totalQuantity = Stock::where('product_id', $this->product->id)
                ->where('size', $size)
                ->first()->quantity;
        }
    }
}
