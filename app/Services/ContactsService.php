<?php

namespace App\Services;


use App\Contact;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ContactsService
{
    use ValidatesRequests;


    /**
     * Contact validation.
     * @param Request $request
     */
    public function validation(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'message' => 'required'
        ]);
    }

    /**
     * Store the contact.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request) {
        $contact = Contact::create([
            'email' => $request->get('email'),
            'message' => $request->get('message')
        ]);

        return $contact;
    }
}