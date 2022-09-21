<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ProductForm extends Component
{
    use WithFileUploads;

    public $product;
    public $product_id;
    public $cover_image;
    public $images = [];
    public $buttonName;
    public $status;
    public $stocks = [0];
    public $i      = 1;

    protected array $rules = [
        'product.name'        => 'required|string',
        'product.price'       => 'required|integer',
        'product.sales_price' => 'sometimes|nullable|integer',
        'product.description' => 'required|string',
        'cover_image'         => 'required|image|mimes:jpg,jpeg,png,svg',
        'images.*'            => 'required|image|mimes:jpg,jpeg,png,svg',
        'stocks.*.size'       => 'required|string',
        'stocks.*.colour'     => 'required|string',
        'stocks.*.quantity'   => 'required|string',
    ];

    protected array $validationAttributes = [
        'product.name'        => 'name',
        'product.price'       => 'price',
        'product.sales_price' => 'sales_price',
        'product.description' => 'description',
        'stocks.*.size'       => 'size',
        'stocks.*.colour'     => 'colour',
        'stocks.*.quantity'   => 'quantity',
    ];

    public function mount()
    {
        $this->buttonName = $this->product_id ? 'Save' : 'Create';
        $this->status     = $this->product_id ? 'Updated' : 'Created';
    }

    public function render()
    {
        return view('livewire.product-form');
    }

    public function add()
    {
        $this->stocks[] = $this->i++;
    }

    public function remove($i)
    {
        unset($this->stocks[$i]);
    }

    public function store()
    {
        DB::transaction(function () {
            $data = $this->validate();

            $cover_image = $this->cover_image->store('photos');

            // If id is not set, create data
            if (!$this->product_id) {
                // Save cover image
                $this->cover_image->store('photos');

                $product = Product::query()->create([
                    'name'        => data_get($data, 'product.name'),
                    'price'       => data_get($data, 'product.price'),
                    'sales_price' => data_get($data, 'product.sales_price'),
                    'description' => data_get($data, 'product.description'),
                    'cover_image' => $cover_image,
                ]);

                foreach ($this->stocks as $stock) {
                    $product->stocks()->create([
                        'size'     => data_get($stock, 'size'),
                        'colour'   => data_get($stock, 'colour'),
                        'quantity' => data_get($stock, 'quantity'),
                    ]);
                }

                // Save other images
                foreach ($this->images as $image) {
                    $image = $image->store('photos');

                    $product->images()->create([
                        'name' => $image,
                    ]);
                }
            } else {

                // Update data
                $this->product->update([
                    'name'        => data_get($data, 'product.name'),
                    'price'       => data_get($data, 'product.price'),
                    'sales_price' => data_get($data, 'product.sales_price'),
                    'description' => data_get($data, 'product.description'),
                ]);

                foreach ($this->stocks as $key => $stock) {
                    $this->product->stocks()->update([
                        'size'     => data_get($stock, 'size'),
                        'colour'   => data_get($stock, 'colour'),
                        'quantity' => data_get($stock, 'quantity'),
                    ]);
                }
            }
        });


        return redirect()->route('admin.products.index')
            ->with('success', "Product $this->status Successfully");
    }
}
