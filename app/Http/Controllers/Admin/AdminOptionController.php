<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;


class AdminOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $options = Option::findPaginated();

        return view('admin.option.index', [
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.option.create', [
            'option' => new Option(),
            'departments' => $this->getCollectionDepartments(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        Option::create($request->validated());

        return redirect()->route('#option.index')
            ->with('message', "option créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $option = Option::with(['department'])->findOrFail($id);

        return view('admin.option.show', [
            'option' => $option,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $option = Option::with(['department'])->findOrFail($id);

        return view('admin.option.edit', [
            'option' => $option,
            'departments' => $this->getCollectionDepartments(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, string $id)
    {
        $option = Option::findOrFail($id);

        $option->update($request->validated());

        return redirect()->route('#option.index')
            ->with('message', "option editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);

        $option->delete();

        return redirect()->route('#option.index')
            ->with('message', "option supprimée.");
    }


    private function getCollectionDepartments(): Collection
    {
        return Department::orderByDesc('updated_at')
            ->get(['id', 'name']);
    }
}
