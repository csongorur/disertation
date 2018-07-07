<?php

namespace App\Services;


use App\Models\Product;

class CartsService
{
    /**
     * Return cart content.
     * @param array $ids
     * @return array
     */
    public function index(array $ids) : array {
        $products = [];

        foreach ($ids as $id) {
            $products[] = Product::find($id);
        }

        return $products;
    }

    /**
     * Get total price.
     * @param array $products
     * @return float
     */
    public function getTotalPrice(array $products) : float {
        $totalPrice = 0;

        foreach ($products as $product) {
            $totalPrice += $product->price;
        }

        return $totalPrice;
    }
}