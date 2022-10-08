<?php

namespace App\Http\Livewire;

use Image;
use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductForm extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $i = 1;
    public $status;
    public $product;
    public $product_id;
    public $buttonName;
    public $cover_image;
    public $images    = [];
    public $stocks    = [0];
    public $edit_mode = false;

    protected array $rules = [
        'product.name'        => 'required|string',
        'product.category_id' => 'required',
        'product.price'       => 'required|integer',
        'product.sales_price' => 'sometimes|nullable|integer',
        'product.description' => 'required|string',
        'cover_image'         => 'required|image|mimes:jpg,jpeg,png,svg',
        'images.*'            => 'sometimes|image|mimes:jpg,jpeg,png,svg|nullable',
        'stocks.*.size'       => 'required|string',
        'stocks.*.colour'     => 'required|string',
        'stocks.*.quantity'   => 'required|string',
    ];

    protected array $validationAttributes = [
        'product.name'        => 'name',
        'product.category_id' => 'category',
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
        $categories = Category::get();

        return view('livewire.product-form', compact('categories'));
    }

    public function add()
    {
        // Add value to array when creating products
        if (!$this->edit_mode) {
            return $this->stocks[] = $this->i++;
        }

        // Add value to collection when updating products
        return $this->stocks->push(Stock::make());
    }

    public function remove($key, $id = '')
    {
        unset($this->stocks[$key]);

        if ($this->edit_mode && !empty($id)) {
            Stock::query()->find($id)->delete();

            $this->alert('error', "Stock Deleted Successfully");
        }
    }

    public function store()
    {
        DB::transaction(function () {
            $data = $this->validate();

            $cover_image_name = $this->cover_image->getClientOriginalName();

            // If id is not set, create data
            if (!$this->product_id) {
                $this->cover_image->storeAs('public', $cover_image_name);

                $product = Product::query()->create([
                    'name'        => data_get($data, 'product.name'),
                    'category_id' => data_get($data, 'product.category_id'),
                    'price'       => data_get($data, 'product.price'),
                    'sales_price' => data_get($data, 'product.sales_price'),
                    'description' => data_get($data, 'product.description'),
                    'cover_image' => $cover_image_name,
                ]);

                foreach ($this->stocks as $stock) {
                    $product->stocks()->create([
                        'size'     => data_get($stock, 'size'),
                        'colour'   => data_get($stock, 'colour'),
                        'quantity' => data_get($stock, 'quantity'),
                    ]);
                }

                // Image::make($this->cover_image)->resize(225, 100)
                //     ->save(public_path('storage/' . $cover_image_name));
                //         // Save cover image
                //         Image::make($this->cover_image->getRealPath())->resize(320, 240)->save(public_path('storage/' . $cover_image_name));

                // Save other images
                foreach ($this->images as $image) {
                    $image_name = $image->getClientOriginalName();

                    $image = $image->storeAs('public', $image_name);

                    $product->images()->create([
                        'name' => $image_name,
                    ]);
                }
            } else {
                // Save cover image
                // Image::make($this->cover_image)->resize(225, 100)
                //     ->save(public_path('storage/' . $cover_image_name));
                // Image::make($this->cover_image)
                //     ->fit(300)
                //     // ->fit(320, 320, fn ($constraint) => $constraint->upsize())
                //     // ->resize(320, 320, fn ($constraint) => $constraint->aspectRatio())
                //     ->save(public_path('storage/' . $cover_image_name));

                $this->cover_image->storeAs('public', $cover_image_name);

                // Update data
                $this->product->update([
                    'name'        => data_get($data, 'product.name'),
                    'category_id' => data_get($data, 'product.category_id'),
                    'price'       => data_get($data, 'product.price'),
                    'sales_price' => data_get($data, 'product.sales_price'),
                    'description' => data_get($data, 'product.description'),
                    'cover_image' => $cover_image_name,
                ]);

                // Update individual stock
                foreach ($this->stocks as $stock) {
                    $this->product->stocks()->updateOrCreate(
                        [
                            'id' => data_get($stock, 'id')
                        ],
                        [
                            'size'     => data_get($stock, 'size'),
                            'colour'   => data_get($stock, 'colour'),
                            'quantity' => data_get($stock, 'quantity'),
                        ]
                    );
                }
            }

            $this->stocks = [];
        });


        return redirect()->route('admin.products.index')
            ->with('success', "Product $this->status Successfully");
    }
}
