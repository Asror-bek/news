<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use App\Services\Frontend\FeedBackService;

class FeedBackController extends Controller
{

    private $feedbackService;


    public function __construct(FeedBackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFeedBack()
    {
        $feedback = $this->feedbackService->fetchAllWithPaginate();
        return view('user.feedback.getFeedBack',[
            'feedback' => $feedback
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveFeedBack(FeedbackRequest $request)
    {
        $this->feedbackService->createNewFeedback($request->validated());
        return redirect()->route('user.feedback.getFeedBack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
