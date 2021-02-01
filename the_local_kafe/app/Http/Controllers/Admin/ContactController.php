<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::paginate(10);

        return view('admin.contact.index', compact('contacts'));
    }

    public function delete($id) {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('admincontact.index')->with('delete', 'Delete Data Successfully');
    }
}
