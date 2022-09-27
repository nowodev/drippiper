<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with('category')->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('stocks', 'images');

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('stocks');

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {

            // Delete & Remove Cover Image
            $image_path = public_path('storage/' . $product->cover_image);

            if (File::exists($image_path)) {
                unlink($image_path);
            }

            // Delete & Remove Other Images
            foreach ($product->images as $image) {
                $image_path = public_path('storage/' . $image->name);

                if (File::exists($image_path)) {
                    unlink($image_path);
                }
            }

            // Delete stocks
            $product->stocks()->delete();
            // Delete images
            $product->images()->delete();
            // Delete product
            $product->delete();
        });


        return redirect()->route('admin.products.index')
            ->with('success', 'Product Deleted Successfully');
    }

    public function updateStatus(Product $product)
    {
        $status = $product->status;

        $product->update([
            'status' => !$status
        ]);


        return redirect()->route('admin.products.index')
            ->with('success', 'Product Status Updated Successfully');
    }
}
