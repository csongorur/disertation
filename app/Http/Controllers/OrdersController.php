<?php

namespace App\Http\Controllers;

use App\Services\CartsService;
use App\Services\OrdersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    private $cartsService;
    private $ordersService;

    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        $this->cartsService = new CartsService();
        $this->ordersService = new OrdersService();
    }

    /**
     * Display order form.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (!$request->has('ids')) {
            return redirect()->back();
        }

        $ids = $request->get('ids');
        $ids_array = json_decode($ids);

        $products = $this->cartsService->index($ids_array);
        $totalPrice = $this->cartsService->getTotalPrice($products);

        return view('pages.order.index')->with([
            'ids' => $ids,
            'total_price' => $totalPrice
        ]);
    }

    public function store(Request $request) {
        $this->ordersService->validation($request);

        if (!$request->has('products') && $request->get('products') == '') {
            return redirect()->back();
        }

        $this->ordersService->store($request);

        Session::flash('success_msg', 'Order was successful send');

        return redirect()->back();
    }
}
