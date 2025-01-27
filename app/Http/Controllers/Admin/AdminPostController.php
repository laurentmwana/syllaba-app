<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Services\File\FileUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminPostController extends Controller
{
    public function __construct(private FileUploader $fileUploader)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::with(['categories'])->paginate();

        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.post.create', [
            'post' => new Post(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $user = $request->user();

        $newImage = $this->fileUploader->upload($request->validated('image'), '/posts');

        $post = Post::create([
            ...$request->validated(),
            'image' => $newImage,
            'user_id' => $user->id
        ]);

        $post->categories()->sync($request->validated('categories'));

        return redirect()->route('#post.index')
            ->with('message', "article créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $post = Post::with(['categories'])->findOrFail($id);

        return view('admin.post.create', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $post = Post::with(['categories'])->findOrFail($id);

        return view('admin.post.create', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $this->fileUploader->delete($post->image);

        $updateImage = $this->fileUploader->upload($request->validated('image'), '/posts');

        $post->update([...$request->validated(), 'image' => $updateImage]);

        $post->categories()->sync($request->validated('categories'));

        return redirect()->route('#post.index')
            ->with('message', "article edité.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('#post.index')
            ->with('message', "article supprimé.");
    }
}
