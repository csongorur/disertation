<?php

namespace App\Services;


use App\Models\Contact;
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

    /**
     * Return all contacts.
     * @return Contact[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index() {
        return Contact::all();
    }

    /**
     * Return a specified contact.
     * @param Contact $contact
     * @return Contact
     */
    public function show(Contact $contact) {
        return $contact;
    }

    /**
     * Update a specified contact.
     * @param Request $request
     * @param Contact $contact
     * @return Contact
     */
    public function update(Request $request, Contact $contact) {
        $contact->update($request->all());

        return $contact;
    }

    /**
     * Delete a specified contact.
     * @param Contact $contact
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Contact $contact) {
        return $contact->delete();
    }
}