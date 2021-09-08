<?php

namespace App\Services\Admin;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public function fetchAllWithPaginate()
    {
        return Comment::query()->get();
    }

    public function createNewComment(array $validated)
    {
        $comment = new Comment();
        $comment->text = $validated['text'];
        $comment->NewsId = $validated['NewsId'];
        $comment->UserId = Auth::id();
        $comment->save();
        return $comment;
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
    }
}



?>
