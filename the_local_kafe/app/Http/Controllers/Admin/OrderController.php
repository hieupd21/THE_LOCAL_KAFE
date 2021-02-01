<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::select()->join('users', 'orders.order_user', '=', 'users.id')
                                 ->join('orders_status', 'orders.order_status', '=', 'orders_status.status_id')
                                 ->orderByDesc('order_id')
                                 ->paginate(10);
                                 
        return view('admin.order.index', compact('orders'));
    }

    public function show($id) {
        $number = Order::find($id);
        $order = Order::select()->join('users', 'orders.order_user', '=', 'users.id')
                                ->join('orders_status', 'orders.order_status', '=', 'orders_status.status_id')
                                ->join('orders_detail', 'orders.order_id', '=', 'orders_detail.detail_order')
                                ->join('products', 'products.prod_id', '=', 'orders_detail.detail_prod')
                                ->where('detail_order', $id)
                                ->first();
        $products = Order::select()->join('users', 'orders.order_user', '=', 'users.id')
                                ->join('orders_status', 'orders.order_status', '=', 'orders_status.status_id')
                                ->join('orders_detail', 'orders.order_id', '=', 'orders_detail.detail_order')
                                ->join('products', 'products.prod_id', '=', 'orders_detail.detail_prod')
                                ->where('detail_order', $id)
                                ->get();
        
        return view('admin.order.show', compact('order', 'products', 'number'));
    }

    public function update(Request $request, $id) {
        $order = Order::find($id);
        $status = OrderStatus::find($id);
        $order->order_address = $order->order_address;
        $order->order_total = $order->order_total;
        $order->order_description = $order->order_description;
        $order->order_user = $order->order_user;
        $order->order_status = $request->status;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Update Data Successfully');
    }

    public function edit($id) {
        $order = Order::find($id);
        $status = OrderStatus::all();

        return view('admin.order.edit', compact('status', 'order'));
    }
}
