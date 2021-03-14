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
            ApplicationResource::collection(Application::where('approved', 1)->get()),
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
            'category_id' => 'required|numeric'
        ]);

        $application = Application::create($validatedRequest + [
            'user_id' => auth()->user()->id
        ]);

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
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
            'target_amount' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->error("Validation failed", 400, $validator->errors()->all());
        }

        $application = Application::findOrFail($id);
        $this->authorize('update', $application);

        $application->title = $request->title;
        $application->description = $request->description;
        $application->image_url = $request->image_url;
        $application->target_amount = $request->target_amount;
        $application->category_id = $request->category_id;

        $application->save();

        return $this->success(
            new ApplicationResource($application),
            'Application updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        $this->authorize('delete', $application);

        if($application->delete()){
            return $this->success(
                'Application deleted successfully'
            );
        }
        
    }
}
