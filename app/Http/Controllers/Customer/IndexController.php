<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)->take(4)->get();

        $newCollections = Product::where('status', true)->get()->random(2);

        return view('customer.frontend.index', compact('products', 'newCollections'));
    }

    public function productsIndex()
    {
        $products = Product::where('status', true)->with('category')->paginate(16);

        return view('customer.frontend.products.index', compact('products'));
    }
}
