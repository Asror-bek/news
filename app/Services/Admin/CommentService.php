<?php

namespace App\Services\Admin;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public function fetchAllWithPaginate($newsId)
    {
        return Comment::query()->where("NewsId", "=", $newsId)->get();
    }

    public function createNewComment(array $validated, $newsId)
    {
        $comment = new Comment();
        $comment->Text = $validated['Text'];
        $comment->NewsId = $newsId;
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
