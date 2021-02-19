<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    public function edit($id)
    {
        return view('admin.contacts.edit', [
            'contact' => $this->contact->whereId($id)->firstOrFail(),
        ]);
    }
}
