<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
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
    
}