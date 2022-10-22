<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $product;
    public $productId;
    public $colour;
    public $sizes;
    public $size;
    public $totalQuantity;
    public $quantity;

    public function mount()
    {
        $this->product = ModelsProduct::with('category:id,name', 'stocks', 'images')
            ->find($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function updatedColour($colour)
    {
        // empty size so that qty is empty
        $this->size = null;

        if (!is_null($colour)) {
            $this->sizes = Stock::where('product_id', $this->product->id)
                ->where('colour', $colour)
                ->distinct()
                ->get();
        }
    }

    public function updatedSize($size)
    {
        if (!is_null($size)) {
            $this->totalQuantity = Stock::where('product_id', $this->product->id)
                ->where('colour', $this->colour)
                ->where('size', $size)
                ->first()->quantity;
        }
    }
}
