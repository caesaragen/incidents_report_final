<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Models\CompensationAnimal;
use App\Models\IncidentType;
use App\Models\Incident;
use App\Models\Ob;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;


class IncidentsController extends Controller
{
    public function dashboard(Request $request)
    {
        $incident_types = IncidentType::all();
        $user_id = Auth::user()->id;
        $obs = Ob::where('user_id', $user_id)->get();
        if ($request->ajax()) {
            $data = Ob::select('*')->where('user_id', $user_id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        // Format the 'created_at' date using Carbon
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->addColumn(
                    'incident_type_name', function ($row) {
                        return $row->incidentType->name; // Assuming 'incidentType' is the relationship name and 'name' is the column for the incident type name
                    }
                )
                ->addColumn(
                    'action', function ($row) {
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Record Incident</a>';
                        return $btn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard', compact('incident_types'));
    }

    public function index()
    {
        $incident_types = IncidentType::all();
        return view('incidents.index', compact('incident_types'));
    }

    public function create(Request $request)
    {
        $incident_types = IncidentType::all();
        $compensation_animals = CompensationAnimal::all();
        $obNumber = $request->input('ob'); // Retrieve the 'ob' query parameter
        $ob = Ob::where('ob_number', $obNumber)->first(); // Assuming 'ob_number' is the field in your OB model
    
        return view('incidents.create', compact('incident_types', 'obNumber', 'ob', 'compensation_animals'));
    }

    public function store(Request $request)
    {
       
        $obNumber = $request->input('ob_number');
        $ob = Ob::where('ob_number', $obNumber)->first();
        dd($ob);
        $incident = Incident::create(
            [
                'name_of_affected' => $ob->name_of_affected,
                'compensation_animal_id' => $request->input('compensation_animal_id'),
                'date_of_incident' => $request->input('date_of_incident'),
                'compensationable' => 'yes', // Assuming this is the default value
                'ob_id' => $ob->id,
            ]
        );
        $incident->save();
        return redirect()->route('incidents.index')->with('success', 'Incident recorded successfully.');
    }
    
    
}
