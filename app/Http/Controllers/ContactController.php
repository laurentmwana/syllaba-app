<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index', []);
    }

    
    public function send(): RedirectResponse
    {
        return redirect()->route('#contact.index')
            ->with('message', "message envoyé.");
    }

}
