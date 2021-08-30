<?php

namespace App\Services;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedBackService
{
    public function fetchAllWithPaginate()
    {
        return Feedback::query()->get();
    }

    public function createNewFeedback(array $validated)
    {
        $feedback = new Feedback();
        $feedback->text  = $validated['text'];
        $feedback->email = $validated['email'];
        $feedback->title = $validated['title'];
        $feedback->UserId = Auth::id();
        $feedback->save();
        return $feedback;

    }
}



?>
