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
            'schoolTypeOther' => 'nullable|string|max:255',
            'schoolStatus' => 'required|string|max:255',
            'establishedYears' => 'required_if:schoolStatus,Established|nullable|integer|min:1',
            'schoolAddress' => 'required|string|max:255',
            'cityCountry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'fullName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ], [], [
            'schoolName' => 'School Name',
            'schoolType' => 'School Type',
            'schoolTypeOther' => 'Other School Type',
            'schoolStatus' => 'School Status',
            'establishedYears' => 'Number of Established Years',
            'schoolAddress' => 'School Address',
            'cityCountry' => 'City / Country',
            'website' => 'Website / Social Media',
            'fullName' => 'Full Name',
            'position' => 'Position',
            'mobile' => 'Mobile Number',
            'email' => 'Email Address',
        ]);

        $schoolTypes = $validated['schoolType'] ?? [];
        if (!empty($validated['schoolTypeOther'])) {
            $schoolTypes[] = $validated['schoolTypeOther'];
        }

        $data = [
            'school_name' => $validated['schoolName'],
            'school_type' => $schoolTypes,
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
            'schoolTypeOther' => 'nullable|string|max:255',
            'schoolStatus' => 'required|string|max:255',
            'establishedYears' => 'required_if:schoolStatus,Established|nullable|integer|min:1',
            'schoolAddress' => 'required|string|max:255',
            'cityCountry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'fullName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ], [], [
            'schoolName' => 'School Name',
            'schoolType' => 'School Type',
            'schoolTypeOther' => 'Other School Type',
            'schoolStatus' => 'School Status',
            'establishedYears' => 'Number of Established Years',
            'schoolAddress' => 'School Address',
            'cityCountry' => 'City / Country',
            'website' => 'Website / Social Media',
            'fullName' => 'Full Name',
            'position' => 'Position',
            'mobile' => 'Mobile Number',
            'email' => 'Email Address',
        ]);

        $schoolTypes = $validated['schoolType'] ?? [];
        if (!empty($validated['schoolTypeOther'])) {
            $schoolTypes[] = $validated['schoolTypeOther'];
        }

        $data = [
            'school_name' => $validated['schoolName'],
            'school_type' => $schoolTypes,
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
                'schoolTypeOther' => 'nullable|string|max:255',
                'schoolStatus' => 'nullable|string|max:255',
                'schoolAddress' => 'required|string|max:255',
                'cityCountry' => 'required|string|max:255',
                'website' => 'nullable|url',
                'fullName' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'mobile' => ['required', 'string', 'max:255', 'regex:/^[\+]?[0-9\s\-\(\)]{7,20}$/'],
                'email' => 'required|email|max:255',
                'totalStaff' => 'nullable|integer',
                'totalTeachers' => 'nullable|integer',
                'curriculum' => 'nullable|array',
                'curriculumOther' => 'nullable|string|max:255',
                'pathways' => 'nullable|array',
                'participants' => 'nullable|array',
                'departments' => 'nullable|array',
                'delivery' => 'nullable|string',
                'startDate' => 'nullable|date',
                'period' => 'nullable|array',
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
                'mobile' => ['required', 'string', 'max:255', 'regex:/^[\+]?[0-9\s\-\(\)]{7,20}$/'],
                'email' => 'required|email|max:255',
                'cityCountry' => 'required|string|max:255',
                'position' => 'nullable|string|max:255',
                'positionOther' => 'nullable|string|max:255|required_without:position',
                'orgName' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
                'pathway' => 'required|string|max:255',
                'levels' => 'nullable|array',
                'mode' => 'required|string|max:255',
                'schedule' => 'required|string|max:255',
                'ai' => 'required|string|max:255',
            ]);
        }

        $attributes = [
            'fullName' => 'Full Name',
            'dob' => 'Date of Birth',
            'nationality' => 'Nationality',
            'mobile' => 'Mobile Number',
            'email' => 'Email Address',
            'cityCountry' => 'City / Country',
            'position' => 'Position',
            'positionOther' => 'Position',
            'orgName' => 'Organization Name',
            'experience' => 'Total Years of Experience',
            'pathway' => 'Preferred Pathway',
            'levels' => 'Preferred Level / Track',
            'mode' => 'Preferred Learning Mode',
            'schedule' => 'Preferred Schedule',
            'ai' => 'Technology & AI Readiness',
            'schoolName' => 'School Name',
            'schoolType' => 'School Type',
            'schoolTypeOther' => 'Other School Type',
            'schoolStatus' => 'School Status',
            'schoolAddress' => 'School Address',
            'website' => 'Website / Social Media',
            'totalStaff' => 'Total Number of Staff',
            'totalTeachers' => 'Total Number of Teachers',
            'curriculum' => 'Current Educational Curriculum',
            'curriculumOther' => 'Other Curriculum',
            'pathways' => 'Requested Pathways',
            'participants' => 'Estimated Number of Participants',
            'departments' => 'Target Departments',
            'delivery' => 'Preferred Delivery Model',
            'startDate' => 'Preferred Start Date',
            'period' => 'Preferred Training Period',
            'priorities' => 'School Development Priorities',
            'notes' => 'Additional Notes',
            'repName' => 'Authorized Representative Name',
            'repPosition' => 'Representative Position',
            'signature' => 'Signature',
            'date' => 'Date',
        ];

        $messages = [
            'mobile.regex' => 'Please enter a valid phone number (e.g. +20 123 456 7890).',
            'positionOther.required_without' => 'Please select a position or type one in the "Other" field.',
        ];

        $validated = $request->validate($rules, $messages, $attributes);

        if ($validated['application_type'] === 'bulk') {
            $totalParticipants = 0;
            $participants = $validated['participants'] ?? [];
            if (is_array($participants)) {
                foreach ($participants as $p) {
                    if (is_array($p) && isset($p['count'])) {
                        $totalParticipants += (int)$p['count'];
                    }
                }
            }

            $schoolTypes = $validated['schoolType'] ?? [];
            if (!empty($validated['schoolTypeOther'])) {
                $schoolTypes[] = $validated['schoolTypeOther'];
            }

            $curriculum = $validated['curriculum'] ?? [];
            if (!empty($validated['curriculumOther'])) {
                $curriculum[] = $validated['curriculumOther'];
            }

            $data = [
                'application_type' => 'bulk',
                'full_name' => $validated['fullName'],
                'mobile' => $validated['mobile'],
                'email' => $validated['email'],
                'city_country' => $validated['cityCountry'],
                'position' => $validated['position'],
                'organization' => $validated['schoolName'],
                'school_name' => $validated['schoolName'],
                'school_type' => $schoolTypes,
                'school_status' => $validated['schoolStatus'] ?? null,
                'school_address' => $validated['schoolAddress'],
                'participant_count' => $totalParticipants,
                'total_staff' => $validated['totalStaff'] ?? null,
                'total_teachers' => $validated['totalTeachers'] ?? null,
                'curriculum' => $curriculum,
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
                'schedule' => is_array($validated['period'] ?? null) ? implode(', ', $validated['period']) : ($validated['period'] ?? 'N/A'),
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
                'position' => !empty($validated['positionOther']) ? $validated['positionOther'] : ($validated['position'] ?? ''),
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
