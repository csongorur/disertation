<?php

namespace App\Services;


use App\Models\Order;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersService
{
    use ValidatesRequests;



    private $productsService;

    /**
     * OrdersService constructor.
     */
    public function __construct()
    {
        $this->productsService = new ProductsService();
    }

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
        $ids = json_decode(json_decode($request->get('products')));
        $products = $this->productsService->getProductsFromIds($ids);
        $order = new Order($request->all());

        $order->save();

        foreach ($products as $product) {
            $order->products()->attach($product->id);
        }


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

    /**
     * Delete a specified order.
     * @param Order $order
     */
    public function delete(Order $order) {
        try {
            $order->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * Get total price.
     * @param Order $order
     * @return float
     */
    public function getTotalPrice(Order $order) : float {
        $totalPrice = 0;

        foreach ($order->products as $product) {
            $totalPrice += $product->price;
        }

        return $totalPrice;
    }
}