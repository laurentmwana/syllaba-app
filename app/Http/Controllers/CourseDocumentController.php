<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CourseDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CourseDocumentController extends Controller
{
    public function index(): View
    {
        $courseDocuments = CourseDocument::findPaginated();

        return view('course-document.index', compact('courseDocuments'));
    }

    public function show(string $slug, int $id): View
    {
        $courseDocument = CourseDocument::findOrFail($id);

        if (Str::slug($courseDocument->title) !== $slug) {
            abort(Response::HTTP_NOT_FOUND, "Le support de cours '#$slug-$id' n'existe pas");
        }

        return view('course-document.index', compact('courseDocument'));
    }
}
