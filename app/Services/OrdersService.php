<?php

namespace App\Services;


use App\Models\Order;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersService
{
    use ValidatesRequests;


    /**
     * Validate order.
     * @param Request $request
     */
    public function validation(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
    }

    /**
     * Store a order.
     * @param Request $request
     * @return Order
     */
    public function store(Request $request) : Order {
        $order = new Order($request->all());

        $order->save();

        return $order;
    }

    /**
     * Update a specified order.
     * @param Request $request
     * @param Order $order
     * @return Order
     */
    public function update(Request $request, Order $order) : Order {
        $req = $request->all();
        $req['user_id'] = Auth::user()->getAuthIdentifier();

        $order->update($req);

        return $order;
    }
}