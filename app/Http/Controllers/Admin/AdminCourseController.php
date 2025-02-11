<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Services\DataValues\DataValueFormatter;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::findPaginated();

        return view('admin.course.index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.course.create', [
            'course' => new Course(),
            'levels' => DataValueFormatter::getLevels(),
            'professors' => DataValueFormatter::getProfessors(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->validated());


        $course->levels()->sync($request->validated('levels'));

        return redirect()->route('#course.index')
            ->with('message', "cours créée.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $course = Course::with(['levels', 'courseDocuments', 'professor'])->findOrFail($id);

        return view('admin.course.show', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::with(['levels'])->findOrFail($id);

        return view('admin.course.edit', [
            'course' => $course,
            'levels' => DataValueFormatter::getLevels(),
            'professors' => DataValueFormatter::getProfessors(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);

        $course->update($request->validated());

        $course->levels()->sync($request->validated('levels'));

        return redirect()->route('#course.index')
            ->with('message', "cours editée.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('#course.index')
            ->with('message', "cours supprimée.");
    }
}
