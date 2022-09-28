<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $user_id = 2)
    {
        $cart = Cart::where('user_id', $user_id)->get();

        return new CartCollection($cart);
    }

    /**
     * Store a newly created cart in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'price'      => 'required',
            'quantity'   => 'required|numeric|min:1|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $total = $request->price * $request->quantity;

        $cart = Cart::create([
            'uuid'       => Str::uuid(),
            'user_id'    => $request->user_id,
            'product_id' => $request->product_id,
            'price'      => $request->price,
            'quantity'   => $request->quantity,
            'total'      => $total
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'Item added to cart successfully',
            'data' => $cart
        ], 201);
    }

    /**
     * Display the specified cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified cart in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'price'      => 'required',
            'quantity'   => 'required|numeric|min:1|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $total = $request->price * $request->quantity;

        $cart->update([
            'price'      => $request->price,
            'quantity'   => $request->quantity,
            'total'      => $total
        ]);

        return response()->json([
            'error' => 0,
            'message' => 'Cart updated successfully',
            'data' => $cart
        ], 200);
    }

    /**
     * Remove the specified cart from storage.
     *
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json([
            'error' => 0,
            'message' => 'Cart deleted successfully',
        ], 200);
    }
}
