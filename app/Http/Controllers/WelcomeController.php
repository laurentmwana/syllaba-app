<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Post;
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
            'documents' => $this->getLastDocument()
        ]);
    }

    private function getLastPosts(): Collection
    {
        return Post::with(['categories', 'comments', 'user'])
            ->orderByDesc('updated_at')
            ->limit(9)
            ->get();
    }

    private function getLastDocument(): Collection
    {
        return Document::with(['levels', 'levels.option'])
            ->orderByDesc('updated_at')
            ->get();
    }
}
