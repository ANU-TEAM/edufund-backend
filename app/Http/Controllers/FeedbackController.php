<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;
use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return $this->success(
            FeedbackResource::collection($feedbacks),
            'Feedbacks fetched successfully',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = new Feedback;
        $validator = validator($request->all(), [
            'rating' => 'required|numeric',
            'comment' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->error("Validation failed", 400, $validator->errors()->all());
        }

        $feedback->rating = $request->rating;
        $feedback->comment = $request->comment;

        $feedback->save();

        return $this->success(
            [],
            'Application was created successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
