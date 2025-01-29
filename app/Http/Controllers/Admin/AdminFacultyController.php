<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;

class AdminFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $faculties = Faculty::findPaginated();

        return view('admin.faculty.index', [
            'faculties' => $faculties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.faculty.create', [
            'faculty' => new Faculty(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyRequest $request)
    {

        Faculty::create($request->validated());

        return redirect()->route('#faculty.index')
            ->with('message', "faculté créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $faculty = Faculty::with(['departments'])->findOrFail($id);

        return view('admin.faculty.show', [
            'faculty' => $faculty,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $faculty = Faculty::with(['departments'])->findOrFail($id);

        return view('admin.faculty.edit', [
            'faculty' => $faculty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyRequest $request, string $id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->update($request->validated());

        return redirect()->route('#faculty.index')
            ->with('message', "faculté editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->delete();

        return redirect()->route('#faculty.index')
            ->with('message', "faculté supprimée.");
    }
}
