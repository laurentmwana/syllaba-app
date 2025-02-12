<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $categoryId = $request->query('category');

        $posts = Post::findPaginatedFilter($categoryId);

        $categories = Category::limit(10)
            ->orderByDesc('updated_at')
            ->get();

        return view('post.index', compact('posts', 'categories'));
    }

    public function show(string $slug, int $id): View
    {
        $post = Post::with(['categories', 'comments', 'user'])->findOrFail($id);

        if (Str::slug($post->title) !== $slug) {
            abort(Response::HTTP_NOT_FOUND, "L'article #$slug-$id n'existe pas ");
        }

        return view('post.show', compact('post'));
    }
}
