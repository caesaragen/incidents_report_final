<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Models\IncidentType;
use Illuminate\Http\Request;
use Auth;

class IncidentsController extends Controller
{
    public function dashboard(Request $request)
    {
        $incident_types = IncidentType::all();
        Auth::user()->id;
        // dd(Auth::user()->id);
        return view('dashboard', compact('incident_types'));
    }
    
}
