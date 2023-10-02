<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Models\IncidentAssessment;
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
        return view('compensations.create');
    }

}
