<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Consultation;
use App\Models\Partnership;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'partnerships' => Partnership::count(),
            'consultations' => Consultation::count(),
            'training_apps' => Application::count(),
            'jobs' => \App\Models\JobListing::count(),
            'job_apps' => \App\Models\JobApplication::count(),
        ];

        $recent_partnerships = Partnership::latest()->take(5)->get();
        $recent_consultations = Consultation::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_partnerships', 'recent_consultations'));
    }
}
