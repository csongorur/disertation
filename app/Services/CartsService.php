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
}