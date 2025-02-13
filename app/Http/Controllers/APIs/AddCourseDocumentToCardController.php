<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\CourseDocument;
use Illuminate\Http\Request;

class AddCourseDocumentToCardController extends Controller
{
    public function add(Request $request, int $id): JsonResponse
    {
        $CourseDocument = CourseDocument::findOrFail($id);

        

        return new JsonResponse();
    }
}
