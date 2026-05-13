<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with('job')->latest();

        if ($request->has('job_id')) {
            if ($request->job_id == '0') {
                $query->whereNull('job_id');
            } else {
                $query->where('job_id', $request->job_id);
            }
        }

        $submissions = $query->paginate(15);
        return view('admin.job_applications.index', compact('submissions'));
    }

    public function show($id)
    {
        $item = JobApplication::with('job')->findOrFail($id);
        return view('admin.job_applications.show', compact('item'));
    }

    public function downloadResume($id)
    {
        $item = JobApplication::findOrFail($id);
        if (!$item->resume_path) {
            abort(404);
        }
        return response()->download(storage_path('app/public/' . $item->resume_path));
    }
}
