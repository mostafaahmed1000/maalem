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
            'schoolStatus' => 'required|string|max:255',
            'establishedYears' => 'required_if:schoolStatus,Established|nullable|integer|min:1',
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
            'school_status' => $validated['schoolStatus'],
            'established_years' => $validated['establishedYears'] ?? null,
            'address' => $validated['schoolAddress'],
            'city_country' => $validated['cityCountry'],
            'website' => $validated['website'] ?? null,
            'contact_name' => $validated['fullName'],
            'contact_position' => $validated['position'],
            'contact_mobile' => $validated['mobile'],
            'contact_email' => $validated['email'],
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
            'schoolStatus' => 'required|string|max:255',
            'establishedYears' => 'required_if:schoolStatus,Established|nullable|integer|min:1',
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
            'school_status' => $validated['schoolStatus'],
            'established_years' => $validated['establishedYears'] ?? null,
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
        $rules = [
            'application_type' => 'required|string|in:individual,bulk',
            'signature' => 'required|string|max:255',
            'date' => 'required|date',
        ];

        if ($request->application_type === 'bulk') {
            $rules = array_merge($rules, [
                'schoolName' => 'required|string|max:255',
                'schoolType' => 'nullable|array',
                'schoolStatus' => 'required|string|max:255',
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
        } else {
            $rules = array_merge($rules, [
                'fullName' => 'required|string|max:255',
                'dob' => 'required|date',
                'nationality' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'cityCountry' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'orgName' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'pathway' => 'required|string|max:255',
                'levels' => 'nullable|array',
                'mode' => 'required|string|max:255',
                'schedule' => 'required|string|max:255',
                'ai' => 'required|string|max:255',
            ]);
        }

        $validated = $request->validate($rules);

        if ($validated['application_type'] === 'bulk') {
            $data = [
                'application_type' => 'bulk',
                'full_name' => $validated['fullName'],
                'mobile' => $validated['mobile'],
                'email' => $validated['email'],
                'city_country' => $validated['cityCountry'],
                'position' => $validated['position'],
                'organization' => $validated['schoolName'],
                'school_name' => $validated['schoolName'],
                'school_type' => $validated['schoolType'] ?? null,
                'school_status' => $validated['schoolStatus'],
                'school_address' => $validated['schoolAddress'],
                'total_staff' => $validated['totalStaff'] ?? null,
                'total_teachers' => $validated['totalTeachers'] ?? null,
                'curriculum' => $validated['curriculum'] ?? null,
                'participants' => $validated['participants'] ?? null,
                'departments' => $validated['departments'] ?? null,
                'start_date' => $validated['startDate'] ?? null,
                'priorities' => $validated['priorities'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'rep_name' => $validated['repName'],
                'rep_position' => $validated['repPosition'],
                'signature' => $validated['signature'],
                'application_date' => $validated['date'],
                
                // Map the pathway and schedule etc. as text so list view doesn't complain or break
                'pathway' => is_array($validated['pathways'] ?? null) ? implode(', ', $validated['pathways']) : ($validated['pathways'] ?? 'Bulk Application'),
                'learning_mode' => $validated['delivery'] ?? 'N/A',
                'schedule' => $validated['period'] ?? 'N/A',
            ];
        } else {
            $data = [
                'application_type' => 'individual',
                'full_name' => $validated['fullName'],
                'dob' => $validated['dob'],
                'nationality' => $validated['nationality'],
                'mobile' => $validated['mobile'],
                'email' => $validated['email'],
                'city_country' => $validated['cityCountry'],
                'position' => $validated['position'],
                'organization' => $validated['orgName'],
                'experience' => $validated['experience'],
                'qualification' => $request->qualification ?? null,
                'specialization' => $request->specialization ?? null,
                'pathway' => $validated['pathway'],
                'levels' => $validated['levels'] ?? null,
                'learning_mode' => $validated['mode'],
                'schedule' => $validated['schedule'],
                'motivation' => $request->motivation ?? null,
                'goals' => $request->goals ?? null,
                'ai_experience' => $validated['ai'],
                'ai_details' => $request->aiDetails ?? null,
                'signature' => $validated['signature'],
                'application_date' => $validated['date'],
            ];
        }

        $application = Application::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!',
            'data' => $application
        ], 201);
    }
}
