<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;
use App\Models\JobLocation;
use App\Models\JobSchool;

class PublicJobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::where('is_active', true)->latest();
        $locations = JobLocation::orderBy('name')->get();
        $schools = JobSchool::orderBy('name')->get();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('school')) {
            $query->where('school', $request->school);
        }

        if ($request->filled('workplace_type')) {
            $query->where('workplace_type', $request->workplace_type);
        }

        if ($request->filled('work_type')) {
            $query->where('work_type', $request->work_type);
        }

        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $jobs = $query->get();
        return view('careers.index', compact('jobs', 'locations', 'schools'));
    }

    public function showApplyForm($job_id = null)
    {
        $job = null;
        if ($job_id) {
            $job = JobListing::where('is_active', true)->findOrFail($job_id);
        }
        
        return view('careers.apply', compact('job'));
    }

    public function storeApplication(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'nullable|exists:job_listings,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'portfolio_url' => 'nullable|url',
            'cover_letter' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume_path'] = $path;
        }

        JobApplication::create($validated);

        return back()->with('success', 'Your application has been submitted successfully!');
    }
}
