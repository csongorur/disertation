<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\CategoriesService;
use App\Services\MediasService;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    private $productsService;
    private $categoriesService;
    private $mediasService;

    /**
     * ProductsController constructor.
     */
    public function __construct() {
        $this->productsService = new ProductsService();
        $this->categoriesService = new CategoriesService();
        $this->mediasService = new MediasService();
    }

    /**
     * Display products list.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $products = $this->productsService->index();

        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show create category form.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $categories = $this->categoriesService->index();

        return view('admin.products.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store product.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $this->productsService->validation($request);

        $media = $this->mediasService->store($request);

        $request->merge(['media_id' => $media->id]);

        $this->productsService->store($request);

        Session::flash('success_msg', 'Product was created successfully');

        return redirect()->route('products');
    }

    /**
     * Show product edit form.
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product) {
        return view('admin.products.edit')->with([
            'product' => $product,
            'categories' => $this->categoriesService->index()
        ]);
    }

    /**
     * Update a product.
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, Product $product) {
        $this->productsService->validation($request);

        if ($request->has('file')) {
            $this->mediasService->delete($product->media);
            $media = $this->mediasService->store($request);

            $request->merge([
                'media_id' => $media->id
            ]);
        } else {
            $request->merge([
                'media_id' => $product->media->id
            ]);
        }

        $this->productsService->update($product, $request);

        Session::flash('success_msg', 'Product was updated successfully');

        return redirect()->back();
    }

    /**
     * Delete product.
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Product $product) {
        $this->productsService->delete($product);

        Session::flash('success_msg', 'Delete was successfully');

        return redirect()->back();
    }
}
