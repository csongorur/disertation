<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Services\OrdersService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    private $ordersService;

    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        $this->ordersService = new OrdersService();
    }

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
            'order' => $order,
            'total_price' => $this->ordersService->getTotalPrice($order)
        ]);
    }

    /**
     * Update a specified order.
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order) {
        $this->ordersService->validation($request);

        $this->ordersService->update($request, $order);

        Session::flash('success_msg', 'Update was successfully');

        return redirect()->back();
    }

    /**
     * Delete a specified order.
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Order $order) {
        $this->ordersService->delete($order);

        Session::flash('success_msg', 'Delete was successfully');

        return redirect()->back();
    }
}
