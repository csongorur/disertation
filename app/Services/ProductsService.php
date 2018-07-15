<?php

namespace App\Services;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ProductsService
{
    use ValidatesRequests;



    private $mediasService;

    /**
     * ProductsService constructor.
     */
    public function __construct() {
        $this->mediasService = new MediasService();
    }


    /**
     * Return all product.
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index() {
        return Product::all();
    }

    /**
     * Return filtered categories.
     * @param Category $category
     * @return mixed
     */
    public function filter(Category $category) {
        return Product::where('category_id', $category->id)->get();
    }

    /**
     * Return products from a ids array.
     * @param array $ids
     * @return mixed
     */
    public function getProductsFromIds(array $ids) {
        return Product::whereIn('id', $ids)->get();
    }

    /**
     * Return a specified product.
     * @param integer $id
     * @return Product
     */
    public function show($id) {
        return Product::find($id);
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
            'price' => 'required'
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
            // Delete media.
            $this->mediasService->delete($product->media);

            // Delete product.
            $product->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}