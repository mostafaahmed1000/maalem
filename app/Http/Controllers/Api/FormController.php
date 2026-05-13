<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Consultation;
use App\Models\Partnership;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function storePartnership(Request $request)
    {
        $validated = $request->validate([
            'schoolName' => 'required|string|max:255',
            'schoolType' => 'nullable|array',
            'schoolAddress' => 'required|string|max:255',
            'cityCountry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'fullName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'totalStaff' => 'nullable|integer',
            'totalTeachers' => 'nullable|integer',
            'curriculum' => 'nullable|array',
            'pathways' => 'nullable|array',
            'participants' => 'nullable|array',
            'departments' => 'nullable|array',
            'delivery' => 'nullable|string',
            'startDate' => 'nullable|date',
            'period' => 'nullable|string',
            'priorities' => 'nullable|array',
            'notes' => 'nullable|string',
            'repName' => 'required|string|max:255',
            'repPosition' => 'required|string|max:255',
        ]);

        // Map frontend fields to DB fields if they differ
        $data = [
            'school_name' => $validated['schoolName'],
            'school_type' => $validated['schoolType'] ?? null,
            'address' => $validated['schoolAddress'],
            'city_country' => $validated['cityCountry'],
            'website' => $validated['website'] ?? null,
            'contact_name' => $validated['fullName'],
            'contact_position' => $validated['position'],
            'contact_mobile' => $validated['mobile'],
            'contact_email' => $validated['email'],
            'total_staff' => $validated['totalStaff'] ?? null,
            'total_teachers' => $validated['totalTeachers'] ?? null,
            'curriculum' => $validated['curriculum'] ?? null,
            'pathways' => $validated['pathways'] ?? null,
            'participants' => $validated['participants'] ?? null,
            'departments' => $validated['departments'] ?? null,
            'delivery_model' => $validated['delivery'] ?? null,
            'start_date' => $validated['startDate'] ?? null,
            'training_period' => $validated['period'] ?? null,
            'priorities' => $validated['priorities'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'rep_name' => $validated['repName'],
            'rep_position' => $validated['repPosition'],
        ];

        $partnership = Partnership::create($data);

        return response()->json([
            'message' => 'Partnership interest submitted successfully!',
            'data' => $partnership
        ], 201);
    }

    public function storeConsultation(Request $request)
    {
        $validated = $request->validate([
            'schoolName' => 'required|string|max:255',
            'schoolType' => 'nullable|array',
            'schoolAddress' => 'required|string|max:255',
            'cityCountry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'fullName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $data = [
            'school_name' => $validated['schoolName'],
            'school_type' => $validated['schoolType'] ?? null,
            'address' => $validated['schoolAddress'],
            'city_country' => $validated['cityCountry'],
            'website' => $validated['website'] ?? null,
            'contact_name' => $validated['fullName'],
            'contact_position' => $validated['position'],
            'contact_mobile' => $validated['mobile'],
            'contact_email' => $validated['email'],
        ];

        $consultation = Consultation::create($data);

        return response()->json([
            'message' => 'Consultation inquiry submitted successfully!',
            'data' => $consultation
        ], 201);
    }

    public function storeApplication(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cityCountry' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'orgName' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'pathway' => 'required|string|max:255',
            'levels' => 'nullable|array',
            'mode' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'motivation' => 'nullable|string',
            'goals' => 'nullable|string',
            'ai' => 'required|string|max:255',
            'aiDetails' => 'nullable|string|max:255',
            'signature' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $data = [
            'full_name' => $validated['fullName'],
            'dob' => $validated['dob'],
            'nationality' => $validated['nationality'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'city_country' => $validated['cityCountry'],
            'position' => $validated['position'],
            'organization' => $validated['orgName'],
            'experience' => $validated['experience'],
            'qualification' => $validated['qualification'] ?? null,
            'specialization' => $validated['specialization'] ?? null,
            'pathway' => $validated['pathway'],
            'levels' => $validated['levels'] ?? null,
            'learning_mode' => $validated['mode'],
            'schedule' => $validated['schedule'],
            'motivation' => $validated['motivation'] ?? null,
            'goals' => $validated['goals'] ?? null,
            'ai_experience' => $validated['ai'],
            'ai_details' => $validated['aiDetails'] ?? null,
            'signature' => $validated['signature'],
            'application_date' => $validated['date'],
        ];

        $application = Application::create($data);

        return response()->json([
            'message' => 'Application submitted successfully!',
            'data' => $application
        ], 201);
    }
}
