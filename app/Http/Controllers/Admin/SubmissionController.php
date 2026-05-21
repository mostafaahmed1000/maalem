<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Consultation;
use App\Models\Partnership;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function partnerships()
    {
        $submissions = Partnership::latest()->paginate(15)->withQueryString();
        return view('admin.submissions.partnerships', compact('submissions'));
    }

    public function consultations()
    {
        $submissions = Consultation::latest()->paginate(15)->withQueryString();
        return view('admin.submissions.consultations', compact('submissions'));
    }

    public function trainingApplications(Request $request)
    {
        $query = Application::latest();
        
        if ($request->filled('type')) {
            $query->where('application_type', $request->type);
        }
        
        $submissions = $query->paginate(5)->withQueryString();
        return view('admin.submissions.training_applications', compact('submissions'));
    }

    public function show($type, $id)
    {
        $model = match($type) {
            'partnership' => Partnership::findOrFail($id),
            'consultation' => Consultation::findOrFail($id),
            'training' => Application::findOrFail($id),
            default => abort(404)
        };

        return view('admin.submissions.show', [
            'type' => $type,
            'item' => $model
        ]);
    }
}
