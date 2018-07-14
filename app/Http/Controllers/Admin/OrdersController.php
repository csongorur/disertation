<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display all orders.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $orders = Order::all();

        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Edit a specified order.
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order) {
        return view('admin.orders.edit')->with([
            'order' => $order
        ]);
    }
}
