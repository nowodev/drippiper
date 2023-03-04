<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Stock;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
    public $image;
    public $images    = [];
    public $sizes     = [];
    public $stocks    = [];
    public $edit_mode = false;

    protected array $rules = [
        'product.name'        => 'required|string',
        'product.category_id' => 'nullable',
        'product.price'       => 'required|integer',
        'product.description' => 'required|string',
        'cover_image'         => 'sometimes|image|mimes:jpg,jpeg,png,svg|max:3072|nullable',
        'images.*'            => 'sometimes|image|mimes:jpg,jpeg,png,svg|max:3072|nullable',
        'stocks.*.size'       => 'required|string',
        'stocks.*.quantity'   => 'required|string',
    ];

    protected array $validationAttributes = [
        'product.name'        => 'name',
        'product.category_id' => 'category',
        'product.price'       => 'price',
        'product.description' => 'description',
        'stocks.*.size'       => 'size',
        'stocks.*.quantity'   => 'quantity',
    ];

    public function mount()
    {
        $this->buttonName = $this->product_id ? 'Save' : 'Create';
        $this->status     = $this->product_id ? 'Updated' : 'Created';
        $this->sizes      = ['M', 'X', 'XL', 'XXL'];

        /**
         * Add empty data to stocks to use for color picker.
         * Only do this when creating. The stocks are
         * automatically loaded when editing.
         */
        if (!$this->stocks) {
            $this->stocks[] = [
                'size' => null,
                'quantity' => null,
            ];
        }
    }

    public function render()
    {
        $categories = Category::get();

        if ($this->product && !is_array($this->product)) {
            $this->image = Image::where('product_id', $this->product->id)
                ->get();
        }

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

    public function deleteImage($item, $type = null)
    {
        if ($type == 'images') {
            $image_path = public_path('storage/' . $item['name']);

            Image::find($item['id'])->delete();
        } else {
            $image_path = public_path('storage/' . $item['cover_image']);

            Product::find($item['id'])->update(['cover_image' => '']);
        }

        if (File::exists($image_path)) {
            unlink($image_path);
        }
    }

    public function store()
    {
        DB::transaction(function () {
            $data = $this->validate();

            $cover_image_name = $this?->cover_image?->getClientOriginalName();

            // If id is not set, create data
            if (!$this->product_id) {
                $this?->cover_image?->storeAs('product_cover_images', $cover_image_name, 'cpanel');

                $category_id = data_get($data, 'product.category_id') ?? null;

                $product = Product::query()->create([
                    'name'        => data_get($data, 'product.name'),
                    'category_id' => $category_id,
                    'price'       => data_get($data, 'product.price'),
                    'description' => data_get($data, 'product.description'),
                    'cover_image' => $cover_image_name ?? null,
                ]);

                foreach ($this->stocks as $stock) {
                    $product->stocks()->create([
                        'size'     => data_get($stock, 'size'),
                        'quantity' => data_get($stock, 'quantity'),
                    ]);
                }

                // Save other images
                foreach ($this->images as $image) {
                    $image_name = $image->getClientOriginalName();

                    $image = $image?->storeAs('product_images', $image_name, 'cpanel');

                    $product->images()->create([
                        'name' => $image_name,
                    ]);
                }
            } else {

                $this?->cover_image?->storeAs('product_cover_images', $cover_image_name, 'cpanel');

                $category_id = data_get($data, 'product.category_id') ?? null;

                // Update data
                $this->product->update([
                    'name'        => data_get($data, 'product.name'),
                    // 'category_id' => data_get($data, 'product.category_id'),
                    'category_id' => $category_id,
                    'price'       => data_get($data, 'product.price'),
                    'description' => data_get($data, 'product.description'),
                    'cover_image' => $cover_image_name ?? $this->product->cover_image,
                ]);

                // Update individual stock
                foreach ($this->stocks as $stock) {
                    $this->product->stocks()->updateOrCreate(
                        [
                            'id' => data_get($stock, 'id')
                        ],
                        [
                            'size'     => data_get($stock, 'size'),
                            'quantity' => data_get($stock, 'quantity'),
                        ]
                    );
                }

                // Update images
                foreach ($this->images as $image) {
                    $image_name = $image?->getClientOriginalName();

                    $image = $image?->storeAs('product_images', $image_name, 'cpanel');

                    $this->product->images()->create([
                        'name' => $image_name ?? $image->name,
                    ]);
                }
            }

            $this->stocks = [];
        });


        return redirect()->route('admin.products.index')
            ->with('success', "Product $this->status Successfully");
    }
}
