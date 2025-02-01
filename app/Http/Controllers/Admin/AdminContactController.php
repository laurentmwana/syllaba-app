<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = Contact::findPaginated();

        return view('admin.contact.index', [
            'contacts' => $contacts,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contact.show', [
            'contact' => $contact,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route('#contact.index')
            ->with('message', "message de contact supprimé.");
    }
}
