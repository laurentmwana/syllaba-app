<?php

namespace App\Http\Controllers;

use App\Models\CourseDocument;
use App\Models\Post;
use App\Models\Quiz;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return view('welcome.index', [
            'posts' => $this->getLastPosts(),
            'courseDocuments' => $this->getLastCourseDocuments(),
            'quizzes' => $this->getLastQuizzes(),
        ]);
    }

    private function getLastPosts(): Collection
    {
        return Post::with(['categories', 'comments', 'user'])
            ->orderByDesc('updated_at')
            ->limit(9)
            ->get();
    }

    private function getLastCourseDocuments(): Collection
    {
        return CourseDocument::with(['course', 'yearAcademic'])
            ->orderByDesc('updated_at')
            ->get();
    }

    private function getLastQuizzes(): Collection
    {
        return Quiz::orderByDesc('updated_at')
            ->limit(6)
            ->get();
    }
}
