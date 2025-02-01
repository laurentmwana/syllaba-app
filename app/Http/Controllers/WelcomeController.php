<?php

namespace App\Http\Controllers;

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

        return view('welcome.welcome', [
            'posts' => $this->getLastPosts(),
        ]);
    }

    private function getLastPosts(): Collection
    {
        return Post::with(['categories', 'comments', 'user'])
            ->get();
    }
}
