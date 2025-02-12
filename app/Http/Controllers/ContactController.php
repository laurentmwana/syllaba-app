<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ContactRequest;
use App\Models\User;
use App\Notifications\SendMessageContactNotified;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        return view('contact.index', [
            'contact' => new Contact([
                'name' => $user->name ?? '',
                'email' => $user->email ?? ''
            ])
        ]);
    }


    public function send(ContactRequest $request): RedirectResponse
    {
        $contact = Contact::create($request->validated());


        $users = User::findAdministrators();

        foreach ($users as $user) {
            $user->notify(new SendMessageContactNotified($contact));
        }

        return redirect()->route('contact.index')
            ->with('message', "message envoyé.");
    }
}
