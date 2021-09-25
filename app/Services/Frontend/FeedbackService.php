<?php

namespace App\Services\Frontend;

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
//        $validated['UserId'] = auth()->id();
        $feedback = new Feedback();
        $feedback->Text = $validated['Text'];
        $feedback->Email = $validated['Email'];
        $feedback->Title = $validated['Title'];
        $feedback->UserId = Auth::id();
        $feedback->save();
        return $feedback;

    }
}


?>
