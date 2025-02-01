<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\TokenGenerator;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Services\DataValues\DataValueFormatter;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::findPaginated();

        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.student.create', [
            'student' => new Student(),
            'genders' => DataValueFormatter::getGenders(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        Student::create([
            ...$request->validated(),
            'token' => TokenGenerator::alpha()
        ]);

        return redirect()->route('#student.index')
            ->with('message', "étudiant créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);

        return view('admin.student.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);

        return view('admin.student.edit', [
            'student' => $student,
            'genders' => DataValueFormatter::getGenders(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->validated());

        return redirect()->route('#student.index')
            ->with('message', "étudiant edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('#student.index')
            ->with('message', "faculté supprimé.");
    }
}
