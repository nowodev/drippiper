<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status', true)->take(4)->get();

        $newCollections = Product::where('status', true)->get()
            ->random(fn ($items) => min(4, count($items)));

        return view('customer.index', compact('products', 'newCollections'));
    }

    public function productsIndex()
    {
        $products = Product::where('status', true)->with('category')->paginate(16);

        return view('customer.products', compact('products'));
    }

    public function category($slug)
    {
        $products = Product::whereHas('category', function($query) use ($slug) {
            $query->whereSlug($slug);
        })->paginate(16);

        return view('customer.category', compact('products'));
    }
}
