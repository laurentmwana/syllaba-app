<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{
    public function index(): View
    {
        return view('document.index', []);
    }

    public function show(): View
    {
        return view('document.index', []);
    }
}
