<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $applications = Application::latest()->get();

        return view('admin.applications.index', [
            'all_applications' => $applications
        ]);
    }

    public function approved()
    {   
        $applications = Application::where('approved', '=', 1)->latest()->get();

        return view('admin.applications.approved', [
            'approved_applications' => $applications
        ]);
    }

    public function pending()
    {   
        $applications = Application::where('approved', '=', 0)->latest()->get();

        return view('admin.applications.pending', [
            'pending_applications' => $applications
        ]);
    }

    public function rejected()
    {   
        $applications = Application::where('approved', '=', 2)->latest()->get();

        return view('admin.applications.rejected', [
            'rejected_applications' => $applications
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
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
