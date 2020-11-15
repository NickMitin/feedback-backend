<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Feedback;
use App\Http\Resources\FeedbackCollection;

class FeedbackController extends Controller
{
    private \App\Services\FeedbackService $feedbackService;

    public function __construct()
    {
        $this->feedbackService = app('FeedbackService');
    }

    private function sendSuccessfulJSONResponse($data) 
    {
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new FeedbackCollection($this->feedbackService->getAll());
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
    public function store(\App\Http\Requests\FeedbackRequest $request)
    {
        $feedbackData = $request->validated();
        $this->feedbackService->create($feedbackData);
        return $this->sendSuccessfulJSONResponse($feedbackData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Feedback($this->feedbackService->getById($id));
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
