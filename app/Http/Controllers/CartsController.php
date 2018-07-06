<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function getItems(Request $request)
    {
        $req = $request->all();

        $products = Product::whereIn('id', $req)->get();

        return redirect()->route('cart')->with([
            'products' => $products
        ]);
    }

    public function index()
    {
        return view('pages.cart.index');
    }
}
