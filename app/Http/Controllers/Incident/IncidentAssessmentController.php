<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncidentAssessmentController extends Controller
{
    /**
     * Summary of create
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function create(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate(
            [
            'incident_id' => 'required|exists:incidents,id',
            'warden_dispatched' => 'required|string',
            'narrative' => 'required|string',
            'discussion_with_community' => 'required|string',
            'monitoring_and_survey' => 'required|string',
            'evidence_file' => 'nullable|file',
            ]
        );

        // Create a new assessment
        $assessment = IncidentAssessment::create($validatedData);

        // Optionally, handle file upload if 'evidence_file' is present

        // Redirect or return a response
    }
}
