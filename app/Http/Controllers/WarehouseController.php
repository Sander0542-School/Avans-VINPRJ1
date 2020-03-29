<?php

namespace App\Http\Controllers;

use App\Models\Order;

class WarehouseController extends Controller
{
    public function index()
    {
        $orders = Order::join('order_containers', 'orders.id', '=', 'order_containers.order_id')
            ->where('status', 'processing')->groupBy('orders.id')->orderBy('date')->paginate(25);

        return view('pages.orders.warehouse')->with('orders', $orders);
    }
}
