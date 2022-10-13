<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Store a newly created cart in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'size'       => 'required',
            'colour'     => 'required',
            'quantity'   => 'required|numeric|min:1|max:10',
        ]);

        DB::transaction(function () use ($data) {

            $productId = $data['product_id'];
            $price     = Product::find($productId)->price;
            $quantity  = $data['quantity'];

            // Get stock ID to determine exact product customer wants.
            $stockId = Stock::whereProductId($productId)
                ->whereSize($data['size'])
                ->whereColour($data['colour'])
                ->first()
                ->id;

            Cart::create([
                'uuid'       => Str::uuid(),
                'user_id'    => auth()->id(),
                'product_id' => $productId,
                'stock_id'   => $stockId,
                'price'      => $price,
                'quantity'   => $quantity,
                'total'      => $price * $quantity
            ]);
        });

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }
}
