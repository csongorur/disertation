<?php

namespace App\Http\Controllers;

use App\Services\CartsService;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    private $cartsService;

    /**
     * CartsController constructor.
     */
    public function __construct()
    {
        $this->cartsService = new CartsService();
    }


    /**
     * Display cart content.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (!$request->has('ids')) {
            return redirect()->back();
        }

        $ids = json_decode($request->get('ids'));

        return view('pages.cart.index')->with([
            'products' => $this->cartsService->index($ids)
        ]);
    }
}
