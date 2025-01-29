<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;

class AdminDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $departments = Department::findPaginated();

        return view('admin.department.index', [
            'departments' => $departments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.department.create', [
            'department' => new Department(),
            'faculties' => $this->getCollectionFaculties(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('#department.index')
            ->with('message', "département créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $department = Department::with(['faculty', 'options'])->findOrFail($id);

        return view('admin.department.show', [
            'department' => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $department = Department::with(['faculty'])->findOrFail($id);

        return view('admin.department.edit', [
            'department' => $department,
            'faculties' => $this->getCollectionFaculties(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        $department = Department::findOrFail($id);

        $department->update($request->validated());

        return redirect()->route('#department.index')
            ->with('message', "département edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('#department.index')
            ->with('message', "département supprimé.");
    }

    private function getCollectionFaculties(): Collection
    {
        return Faculty::orderByDesc('updated_at')
            ->get(['id', 'name']);
    }
}
