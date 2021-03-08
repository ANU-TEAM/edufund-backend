<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Resources\ApplicationResource;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use ApiResponder;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(
            ApplicationResource::collection(Application::all()),
            'Applications fetched successfully',
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
        $validatedRequest = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
            'target_amount' => 'required|numeric',
            'amount_gained' => 'required|numeric',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        $application = Application::create($validatedRequest);

        return $this->success(
            new ApplicationResource($application),
            'Application was created successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success(
            new ApplicationResource(Application::findOrFail($id)),
            'Application retrieved successfully',
            200
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
