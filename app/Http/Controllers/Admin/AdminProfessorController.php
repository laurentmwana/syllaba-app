<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professor;
use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessorRequest;
use App\Services\DataValues\DataValueFormatter;

class AdminProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $professors = Professor::findPaginated();

        return view('admin.professor.index', [
            'professors' => $professors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.professor.create', [
            'professor' => new Professor(),
            'departments' => DataValueFormatter::getDepartments(),
            'genders' => DataValueFormatter::getGenders(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessorRequest $request)
    {
        $professor = Professor::create($request->validated());

        $professor->departments()->sync($request->validated('departments'));

        return redirect()->route('#professor.index')
            ->with('message', "professor créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $professor = Professor::with(['departments', 'courses'])->findOrFail($id);

        return view('admin.professor.show', [
            'professor' => $professor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $professor = Professor::with(['departments'])->findOrFail($id);


        return view('admin.professor.edit', [
            'professor' => $professor,
            'departments' => DataValueFormatter::getDepartments(),
            'genders' => DataValueFormatter::getGenders(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfessorRequest $request, string $id)
    {
        $professor = Professor::findOrFail($id);

        $professor->update($request->validated());

        $professor->departments()->sync($request->validated('departments'));

        return redirect()->route('#professor.index')
            ->with('message', "professor editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor = Professor::findOrFail($id);

        $professor->delete();

        return redirect()->route('#professor.index')
            ->with('message', "professor supprimée.");
    }
}
