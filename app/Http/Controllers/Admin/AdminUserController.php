<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = User::findPaginated();

        return view('admin.user.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.user.create', [
            'user' => new User(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('#user.index')
            ->with('message', "utilisateur créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->validated());

        return redirect()->route('#user.index')
            ->with('message', "utilisateur edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('#user.index')
            ->with('message', "utilisateur supprimé.");
    }
}
