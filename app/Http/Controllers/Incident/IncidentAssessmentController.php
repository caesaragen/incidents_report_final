<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Models\ChiefComment;
use App\Models\Claimant;
use App\Models\Incident;
use App\Models\IncidentAssessment;
use App\Models\NextOfKin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        // $validatedData = $request->validate(
        //     [
        //     'incident_id' => 'required|exists:incidents,id',
        //     'warden_dispatched' => 'required|string',
        //     'narrative' => 'required|string',
        //     'discussion_with_community' => 'required|string',
        //     'monitoring_and_survey' => 'required|string',
        //     'evidence_file' => 'nullable|file',
        //     ]
        // );
        $incident_id = $request->input('incident_id'); 
        $actions_taken = $request->input('actions_taken');
        // dd($actions_taken);
        // Create a new assessment
        // $assessment = IncidentAssessment::create($validatedData);
        $incident = Incident::where('id', $incident_id)->first(); 
        $assessment = IncidentAssessment::create(
            [
            'incident_id' => $incident_id,
            'warden_dispatched' => $request->warden_dispatched,
            'narrative' => $request->narrative,
            'discussion_with_community' => $request->discussion_with_community,
            'monitoring_and_survey' => $request->monitoring_and_survey,
            'actions_taken' => $actions_taken , // This is a JSON column, so we can pass an array to it
            'evidence_file' => $request->evidence_file,
            ]
        );
        // dd($assessment);
        $assessment->save();
        return view('compensations.index')->with('success', 'Incident assessment recorded successfully.');

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = IncidentAssessment::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->editColumn(
                    'warden_dispatched', function ($row) {
                        return $row->warden_dispatched;
                    }
                )
                ->editColumn(
                    'narrative', function ($row) {
                        return $row->narrative;
                    }
                )
                ->addColumn(
                    'incident_type', function ($row) {
                        return $row->incident->ob->incidentType->name;
                    }
                )
                ->addColumn(
                    'action', function ($row) {
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Record Assessment</a>';
                        return $btn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        $incident_assessments = IncidentAssessment::all();
        return view('compensations.index', compact('incident_assessments'));
    }
    
    public function claim()
    {
        $assessment_id = request('assessment_id');
        $incident = IncidentAssessment::where('id', $assessment_id)->first();
        $incident_type = $incident->incident->ob->incidentType->name;
        // dd($incident_type);
        // dd($incident);
        return view('compensations.create', compact('assessment_id', 'incident_type'));
    }

    public function saveClaimant(Request $request) 
    {
        // Step 1: Validation
        // $request->validate(
        //     [
        //     'assessment_id' => 'required|integer|exists:incident_assessments,id', // Assuming the related table is 'incident_assessments'
        //     'name' => 'required|string|max:255',
        //     'id_passport_no' => 'required|string|max:50',
        //     'address' => 'required|string|max:255',
        //     'post_code' => 'nullable|string|max:10',
        //     'county' => 'required|string|max:100',
        //     'sub_county' => 'nullable|string|max:100',
        //     'location' => 'nullable|string|max:100',
        //     'sub_location' => 'nullable|string|max:100',
        //     'constituency' => 'nullable|string|max:100',
        //     'tel_no' => 'nullable|string|max:20',
        //     'email' => 'nullable|email|max:100',
        //     'sex' => 'required|in:MALE,FEMALE',
        //     'age' => 'required|integer',
        //     ]
        // );

        // dd($request->all());
        $claimant = Claimant::create(
            [
            'incident_assessment_id' => $request->input('assessment_id'),
            'name' => $request->input('name'),
            'id_passport_no' => $request->input('id_passport_no'),
            'address' => $request->input('address'),
            'post_code' => $request->input('post_code'),
            'county' => $request->input('county'),
            'sub_county' => $request->input('sub_county'),
            'location' => $request->input('location'),
            'sub_location' => $request->input('sub_location'),
            'constituency' => $request->input('constituency'),
            'tel_no' => $request->input('tel_no'),
            'email' => $request->input('email'),
            'sex' => $request->input('sex'),
            'age' => $request->input('age'),
            ]
        );
        // dd($claimant);
        $claimant->save();
        session(['claimant_id' => $claimant->id]);
        // if ($request->ajax()) {
        //     // Return JSON response for AJAX request
        //     return response()->json(['success' => 'Claimant successfully saved']);
        // }
        return response()->json(['success' => 'Claimant successfully saved']);

    }

    /**
     * Summary of createKin
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createKin(Request $request) 
    {
        $claimant_id = session('claimant_id');
    
        if(!$claimant_id) {
            return redirect()->back()->with('error', 'Claimant ID not found.');
        }
    
        // Create a new Next of Kin record in the database
        $nextOfKin = NextOfKin::create(
            [
            'name' => $request->input('name'),
            'claimant_id' => $claimant_id,
            'id_passport_no' => $request->input('id_passport_no'),
            'address' => $request->input('address'),
            'post_code' => $request->input('post_code'),
            'county' => $request->input('county'),
            'sub_county' => $request->input('sub_county'),
            'location' => $request->input('location'),
            'sub_location' => $request->input('sub_location'),
            'constituency' => $request->input('constituency'),
            'tel_no' => $request->input('tel_no'),
            'email' => $request->input('email'),
            'age' => $request->input('age')
            ]
        );
    
        $nextOfKin->save();
    
        return response()->json(['success' => 'Next of Kin successfully saved']);
    }

    public function saveChiefComments(Request $request) 
    {
        $claimant_id = session('claimant_id');

        if(!$claimant_id) {
            return redirect()->back()->with('error', 'Claimant ID not found.');
        }

        $comments = ChiefComment::create(
            [
            'claimant_id' => $claimant_id,
            'chief_comments' => $request->input('chief_comments'),
            'chief_name' => $request->input('chief_name'),
            'chief_phone' => $request->input('chief_phone'),
            ]
        );

        $comments->save();
        return response()->json(
            [
            'success' => 'Comments successfully saved',
            'redirect_url' => route('compensation-incident')
            ]
        );
    }

}
