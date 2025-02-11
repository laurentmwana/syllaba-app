<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use App\Models\CourseDocument;
use App\Services\File\FileUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseDocumentRequest;
use App\Services\DataValues\DataValueFormatter;

class AdminCourseDocumentController extends Controller
{
    public function __construct(private FileUploader $fileUploader) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courseDocuments = CourseDocument::findPaginated();

        return view('admin.course-document.index', [
            'courseDocuments' => $courseDocuments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.course-document.create', [
            'courseDocument' => new CourseDocument(),
            'yearAcademics' => DataValueFormatter::getYearAcademics(),
            'courses' => DataValueFormatter::getCourses(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseDocumentRequest $request)
    {
        CourseDocument::create($request->validated());

        return redirect()->route('#course-document.index')
            ->with('message', "support du cours créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $courseDocument = CourseDocument::with(['course', 'yearAcademic', 'tomes'])
            ->findOrFail($id);

        return view('admin.course-document.show', [
            'courseDocument' => $courseDocument,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $courseDocument = CourseDocument::findOrFail($id);

        return view('admin.course-document.edit', [
            'courseDocument' => $courseDocument,
            'yearAcademics' => DataValueFormatter::getYearAcademics(),
            'courses' => DataValueFormatter::getCourses(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseDocumentRequest $request, string $id)
    {
        $courseDocument = CourseDocument::findOrFail($id);

        $courseDocument->update($request->validated());

        return redirect()->route('#course-document.index')
            ->with('message', "support du cours edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courseDocument = CourseDocument::findOrFail($id);

        $courseDocument->delete();

        return redirect()->route('#course-document.index')
            ->with('message', "support du cours supprimé.");
    }
}
