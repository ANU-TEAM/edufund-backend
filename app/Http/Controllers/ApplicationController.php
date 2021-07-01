<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Resources\ApplicationResource;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function user()
    {
        $user_id = auth()->id();
        return $this->success(
            ApplicationResource::collection(Application::where('user_id', $user_id)->latest()->get()),
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
        $application = new Application;
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|image:jpeg,png,jpg,gif,svg|max:5120',
            'target_amount' => 'required|string',
            'category_id' => 'required|numeric',
            'school_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->error("Validation failed", 400, $validator->errors()->all());
        }



        $uploadFolder = 'applications';
        $image = $request->file('image_url');
        $image_uploaded_path = $image->store($uploadFolder, env('APP_STORAGE'));
        

        $application->user_id = auth()->user()->id;
        $application->title = $request->title;
        $application->description = $request->description;
        $application->image_url = $image_uploaded_path;
        $application->target_amount = $request->target_amount;
        $application->category_id = $request->category_id;
        $application->school_id = $request->school_id;

        $application->save();

        $newApplication = Application::findOrFail($application->id);

        return $this->success(
            new ApplicationResource($newApplication),
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
        $application = Application::findOrFail($id);
        
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|image:jpeg,png,jpg,gif,svg|max:5120',
            'target_amount' => 'required|string',
            'category_id' => 'required|numeric',
            'school_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->error("Validation failed", 400, $validator->errors()->all());
        }

        $this->authorize('update', $application);

        $uploadFolder = 'applications';
        $existing_image_path = $application->image_url;
        Storage::disk(env('APP_STORAGE'))->delete($existing_image_path);
        $new_image_path = $request->file('image_url')->store($uploadFolder, env('APP_STORAGE'));



        $application->title = $request->title;
        $application->description = $request->description;
        $application->image_url = $new_image_path;
        $application->approved = 0;
        $application->target_amount = floatval($request->target_amount);
        $application->category_id = $request->category_id;
        $application->school_id = $request->school_id;

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
        
        Storage::disk(env('APP_STORAGE'))->delete($application->image_url);

        if($application->delete()){
            return $this->success(
                'Application deleted successfully'
            );
        }
        
    }
}