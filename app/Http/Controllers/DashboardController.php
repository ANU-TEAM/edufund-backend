<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Feedback;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_pending_applications = $applications = Application::where('approved', '=', 0)
            ->latest()->limit(5)->get();
        $applications = Application::all();
        $totalApplications = $applications->count();
        $pending = $applications->where('approved', '=', 0)->count();
        $approved = $applications->where('approved', '=', 1)->count();
        $rejected = $applications->where('approved', '=', 2)->count();
        
        return view('admin.dashboard', [
            'latest_pending_applications' => $latest_pending_applications,
            'applications' => $applications,
            'totalApplications' => $totalApplications,
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected
        ]);
    }

    public function detail(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        return view('detail', [
            'application' => $application,
        ]);
    }

    public function feedbacks(Request $request)
    {
        $feedbacks = Feedback::latest()->get();
        $average = $feedbacks->avg('rating');
        return view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks,
            'average' => $average
        ]);
    }

    public function approve(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->approve();
        return back();
    }

    public function reject(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->reject();
        return back();
    }

    public function pending(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->pending();
        return back();
    }
  
}
