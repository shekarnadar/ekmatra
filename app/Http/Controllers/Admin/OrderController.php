<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders()
    {
    $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
    return view('admin.orders.index', compact('orders'));
    }
    
    public function showOrderDetails(Order $order)
    {
    $order->load('orderItems.product');
    return view('admin.orders.details', compact('order'));
    }
}
