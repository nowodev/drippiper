<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->with('user:id,name', 'transaction')->paginate();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.orders.show', compact('order', 'progress_no'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderStatuses = OrderStatus::cases();

        return view('admin.orders.edit', compact('order', 'orderStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_status' => 'required'
        ]);

        $order->update([
            'order_status' => $validated['order_status']
        ]);


        return redirect()->route('admin.orders.index')
            ->with('success', "Order Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
