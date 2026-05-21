<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\JobLocation;
use App\Models\JobSchool;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()->paginate(15)->withQueryString();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $locations = JobLocation::orderBy('name')->get();
        $schools = JobSchool::orderBy('name')->get();
        return view('admin.jobs.create', compact('locations', 'schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'workplace_type' => 'required|in:On-site,Remote,Hybrid',
            'department' => 'required|string|max:255',
            'work_type' => 'required|in:Full-time,Part-time,Freelance,Contract',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        // Ensure location exists in management list
        JobLocation::firstOrCreate(['name' => $validated['location']]);
        
        // Ensure school exists in management list
        JobSchool::firstOrCreate(['name' => $validated['school']]);

        JobListing::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully!');
    }

    public function edit(JobListing $job)
    {
        $locations = JobLocation::orderBy('name')->get();
        $schools = JobSchool::orderBy('name')->get();
        return view('admin.jobs.edit', compact('job', 'locations', 'schools'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'workplace_type' => 'required|in:On-site,Remote,Hybrid',
            'department' => 'required|string|max:255',
            'work_type' => 'required|in:Full-time,Part-time,Freelance,Contract',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        // Ensure location exists in management list
        JobLocation::firstOrCreate(['name' => $validated['location']]);

        // Ensure school exists in management list
        JobSchool::firstOrCreate(['name' => $validated['school']]);

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }

    public function toggleStatus(JobListing $job)
    {
        $job->update(['is_active' => !$job->is_active]);
        return back()->with('success', 'Job status updated!');
    }
}
