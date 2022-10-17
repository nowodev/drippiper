<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('transaction')->paginate();

        return view('customer.orders.index', compact('orders'));

        // $orders = Order::where('user_id', auth()->id())->with('order_items', 'order_items.product', 'order_items.stock')->get();

        // return view('customer.orders', compact('orders'));
    }


    public function show(Order $order)
    {
        $order->load('user', 'order_items', 'order_items.product', 'order_items.stock');

        return view('customer.orders.show', compact('order'));
    }
}
