<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show landing page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('pages.index.index');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shop() {
        return view('pages.shop.index');
    }

    /**
     * Show contact page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact() {
        return view('pages.contact.index');
    }
}
