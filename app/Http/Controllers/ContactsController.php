<?php

namespace App\Http\Controllers;

use App\Services\ContactsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    private $contactsService;


    /**
     * ContactsController constructor.
     */
    public function __construct() {
        $this->contactsService = new ContactsService();
    }

    /**
     * Store contact.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $this->contactsService->validation($request);

        $this->contactsService->store($request);

        Session::flash('success_msg', 'The message was send!');

        return redirect()->back();
    }
}
