<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CategoriesService;
use App\Services\ProductsService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $productsService;
    private $categoriesService;

    /**
     * PagesController constructor.
     */
    public function __construct() {
        $this->productsService = new ProductsService();
        $this->categoriesService = new CategoriesService();
    }

    /**
     * Show landing page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $products = $this->productsService->index();
        $selected_category = null;

        if ($request->has('category')) {
            $category = $this->categoriesService->show($request->get('category'));

            $products = $this->productsService->filter($category);

            $selected_category = $category->id;
        }

        return view('pages.index.index')->with([
            'products' => $products,
            'categories' => $this->categoriesService->index(),
            'selected_category' => $selected_category
        ]);
    }

    /**
     * Show about page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about() {
        return view('pages.about.index');
    }

    /**
     * Show shop page.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shop(Request $request) {
        $products = $this->productsService->index();
        $selected_category = null;

        if ($request->has('category')) {
            $category = $this->categoriesService->show($request->get('category'));

            $products = $this->productsService->filter($category);

            $selected_category = $category->id;
        }

        return view('pages.shop.index')->with([
            'categories' => $this->categoriesService->index(),
            'products' => $products,
            'selected_category' => $selected_category
        ]);
    }

    /**
     * Show contact page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact() {
        return view('pages.contact.index');
    }

    /**
     * Show product.
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(Product $product) {
        return view('pages.product.show')->with([
            'product' => $product
        ]);
    }
}
