<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\JobLocation;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()->paginate(15);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $locations = JobLocation::orderBy('name')->get();
        return view('admin.jobs.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'workplace_type' => 'required|in:On-site,Remote,Hybrid',
            'department' => 'required|string|max:255',
            'work_type' => 'required|in:Full-time,Part-time,Freelance,Contract',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        // Ensure location exists in management list
        JobLocation::firstOrCreate(['name' => $validated['location']]);

        JobListing::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully!');
    }

    public function edit(JobListing $job)
    {
        $locations = JobLocation::orderBy('name')->get();
        return view('admin.jobs.edit', compact('job', 'locations'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'workplace_type' => 'required|in:On-site,Remote,Hybrid',
            'department' => 'required|string|max:255',
            'work_type' => 'required|in:Full-time,Part-time,Freelance,Contract',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        // Ensure location exists in management list
        JobLocation::firstOrCreate(['name' => $validated['location']]);

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }
}
