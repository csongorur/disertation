<?php

namespace App\Services;


use App\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ProductsService
{
    use ValidatesRequests;



    /**
     * Return all product.
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index() {
        return Product::all();
    }

    /**
     * Return a specified product.
     * @param Product $product
     * @return Product
     */
    public function show(Product $product) {
        return $product;
    }

    /**
     * Product validation.
     * @param Request $request
     */
    public function validation(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required|number'
        ]);
    }

    /**
     * Store a product.
     * @param Request $request
     * @return Product
     */
    public function store(Request $request) {
        $product = Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'media_id' => $request->get('media_id'),
            'category_id' => $request->get('category_id'),
            'price' => $request->get('price')
        ]);

        return $product;
    }

    /**
     * Update a product.
     * @param Product $product
     * @param Request $request
     * @return Product
     */
    public function update(Product $product, Request $request) {
        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'media_id' => $request->get('media_id'),
            'category_id' => $request->get('category_id'),
            'price' => $request->get('price')
        ]);

        return $product;
    }

    /**
     * Delete a product.
     * @param Product $product
     * @throws \Exception
     */
    public function delete(Product $product) {
        try {
            $product->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}