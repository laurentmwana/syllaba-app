<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Enums\CommentStateEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $comments = Comment::with(['post', 'user'])->paginate();

        return view('admin.comment.index', [
            'comments' => $comments,
        ]);
    }

    public function lock(Comment $comment): RedirectResponse
    {
        $status = $comment->status === CommentStateEnum::OPEN->value
            ? CommentStateEnum::LOCK->Value
            : CommentStateEnum::OPEN->Value;

        $comment->update(['status' => $status]);

        return redirect()->route('#comment.index')
            ->with('message', "le status du commentaire a été mis à jour.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $comment = Comment::with(['post', 'user'])->findOrFail($id);

        return view('admin.comment.create', [
            'comment' => $comment,
        ]);
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('#comment.index')
            ->with('message', "commentaire supprimé.");
    }
}
