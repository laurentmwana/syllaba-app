<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CourseDocument;
use App\Services\DataValues\DataValueFormatter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class CourseDocumentController extends Controller
{
    public function index(): View
    {
        $courseDocuments = CourseDocument::findPaginatedFilters();

        return view('course-document.index', [
            'courseDocuments' => $courseDocuments,
            'years' => DataValueFormatter::getYearAcademics(),
            'courses' => DataValueFormatter::getCourses(),
        ]);
    }

    public function show(string $slug, int $id): View
    {
        $courseDocument = CourseDocument::findOrFail($id);

        if (Str::slug($courseDocument->title) !== $slug) {
            abort(Response::HTTP_NOT_FOUND, "Le support de cours '#$slug-$id' n'existe pas");
        }

        return view('course-document.show', ['courseDocument' => $courseDocument]);
    }
}
