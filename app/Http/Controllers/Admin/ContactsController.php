<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Services\ContactsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    private $contactsService;

    /**
     * ContactsController constructor.
     * @param $contactsService
     */
    public function __construct()
    {
        $this->contactsService = new ContactsService();
    }

    /**
     * Display all contacts.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('admin.contacts.index')->with([
            'contacts' => $this->contactsService->index()
        ]);
    }

    /**
     * Show contact edit form.
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Contact $contact) {
        return view('admin.contacts.edit')->with([
            'contact' => $this->contactsService->show($contact)
        ]);
    }

    /**
     * Update a specified contact.
     * @param Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contact $contact) {
        $this->contactsService->validation($request);

        $this->contactsService->update($request, $contact);

        Session::flash('success_msg', 'Contact was updated successfully');

        return redirect()->back();
    }

    /**
     * Delete a specified contact.
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Contact $contact) {
        $this->contactsService->delete($contact);

        Session::flash('success_msg', 'Contact was deleted successfully');

        return redirect()->back();
    }
}
