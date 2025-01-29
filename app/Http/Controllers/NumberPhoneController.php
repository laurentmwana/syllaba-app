<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\NumberPhoneRule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NumberPhoneController extends Controller
{
    public function index(): View
    {
        return view('number/add-number');
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'phone' => [
                'required',
                'string',
                (new NumberPhoneRule())
            ]
        ]);

        $user->update($validated);

        return redirect()->route('welcome');
    }
}
