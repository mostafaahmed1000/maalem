<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\JobSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with('job')->latest();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('job_title')) {
            $query->where('job_title', $request->job_title);
        }

        if ($request->filled('job_id')) {
            if ($request->job_id == '0') {
                $query->whereNull('job_id');
            } else {
                $query->where('job_id', $request->job_id);
            }
        }

        if ($request->filled('school')) {
            $query->whereHas('job', function($q) use ($request) {
                $q->where('school', $request->school);
            });
        }

        $submissions = $query->paginate(15)->withQueryString();
        $jobs = JobListing::orderBy('title')->get();
        $jobTitles = JobApplication::whereNotNull('job_title')->pluck('job_title')->unique()->sort();
        $schools = JobSchool::orderBy('name')->get();

        return view('admin.job_applications.index', compact('submissions', 'jobs', 'schools', 'jobTitles'));
    }

    public function show($id)
    {
        $item = JobApplication::with('job')->findOrFail($id);
        return view('admin.job_applications.show', compact('item'));
    }

    public function downloadResume($id)
    {
        $item = JobApplication::findOrFail($id);

        $resumePath = ltrim(trim((string) $item->resume_path), '/');

        if ($resumePath === '' || str_contains($resumePath, '..')) {
            return back()->with('error', 'No resume file is attached to this application.');
        }

        $disk = Storage::disk('public');

        if (!$disk->exists($resumePath) || !is_file($disk->path($resumePath))) {
            return back()->with('error', 'The resume file is missing from storage.');
        }

        return $disk->download($resumePath);
    }
}
