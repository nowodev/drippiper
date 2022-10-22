<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('transaction')->paginate();

        return view('customer.orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        $order->load('user', 'order_items', 'order_items.product', 'order_items.stock');

        $progress_no = null;
        
        if (OrderStatus::PROCESSING->value == $order->order_status)
            $progress_no = 2;
        if (OrderStatus::SHIPPED->value == $order->order_status)
            $progress_no = 4;
        if (OrderStatus::DELIVERED->value == $order->order_status)
            $progress_no = 8;

        return view('customer.orders.show', compact('order', 'progress_no'));
    }
}
