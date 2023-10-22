<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Models\ChiefComment;
use App\Models\Claimant;
use App\Models\County;
use App\Models\CropDamageAttachment;
use App\Models\CropDestruction;
use App\Models\DestructionAttachment;
use App\Models\HumanDeath;
use App\Models\Incident;
use App\Models\IncidentAssessment;
use App\Models\MortalityAttachment;
use App\Models\NextOfKin;
use App\Models\PropertyDamage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

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
    
    public function claim($incident_assessment_id)
    {
        $counties = County::all();
        
        $incident = IncidentAssessment::where('id', $incident_assessment_id)->first();
        $incident_type = $incident->incident->ob->incidentType->name;
        return view('compensations.create', compact('incident_assessment_id', 'incident_type', 'counties'));
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
        $assessment_id = $request->input('assessment_id');
        $claimant_id = Claimant::where('incident_assessment_id', $assessment_id)->first()->id;
    
    
        // Create a new Next of Kin record in the database
        $nextOfKin = NextOfKin::create(
            [
            'name' => $request->input('name'),
            'claimant_id' =>  $claimant_id ,
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
            'age' => $request->input('age'),
            'relationship' => $request->input('relationship'),
            ]
        );
    
        $nextOfKin->save();
    
        return response()->json(['success' => 'Next of Kin successfully saved']);
    }

    public function saveChiefComments(Request $request) 
    {
        $assessment_id = $request->input('assessment_id');
        $claimant_id = Claimant::where('incident_assessment_id', $assessment_id)->first()->id;

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
            'success' => 'Comments successfully saved'
            ]
        );
    }

    public function saveCropsDestruction(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $claimant_id = Claimant::where('incident_assessment_id', $assessment_id)->first()->id;

        $cropsDestruction = CropDestruction::create(
            [
            'claimant_id' => $claimant_id,
            'circumstances' => $request->input('circumstances'),
            'crop_name' => $request->input('crop_name'),
            'animal_responsible' => $request->input('animal_responsible'),
            'land_ownership_status' => $request->input('land_ownership_status'),
            'acreage' => $request->input('acreage'),
            'stage' => $request->input('stage'),
            'value' => $request->input('value'),
            'measures' => $request->input('measures'),
            'place' => $request->input('place'),
            'location_status' => $request->input('location_status'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'verified_by' => $request->input('verified_by'),
            'est_no' => $request->input('est_no'),
            'designation' => $request->input('designation'),
            'signature' => $request->input('signature'),
            ]
        );

        $cropsDestruction->save();
        return view('claims.index')->with('success', 'Crops destruction successfully saved');
    }
    public function saveHumanDeath(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $claimant_id = Claimant::where('incident_assessment_id', $assessment_id)->first()->id;

        $humanDeath = HumanDeath::create(
            [
            'claimant_id' => $claimant_id,
            'place_of_death' => $request->input('place_of_death'),
            'animal_responsible' => $request->input('animal_responsible'),
            'inside_outside_pa' => $request->input('inside_outside_pa'),
            'gps_coordinates' => $request->input('gps_coordinates'),
            'date_of_incident' => $request->input('date_of_incident'),
            'time_of_incident' => $request->input('time_of_incident'),
            'circumstances' => $request->input('circumstances'),
            'verifying_officer' => $request->input('verifying_officer'),
            'est_no' => $request->input('est_no'),
            'warden_details' => $request->input('warden_details'),
            'name' => $request->input('name'),
            'verification_date' => $request->input('verification_date'),
            'designation' => $request->input('designation'),
            ]
        );
        $humanDeath->save();
        return view('claims.mortality')->with('success', 'Human death successfully saved');
    } 

    public function savePropertyDamage(Request $request)
    {
        $assessment_id = $request->input('assessment_id');
        $claimant_id = Claimant::where('incident_assessment_id', $assessment_id)->first()->id;

        $propertyDamage = PropertyDamage::create(
            [
            'claimant_id' => $claimant_id,
            'circumstances' => $request->input('circumstances'),
            'no_of_adult' => $request->input('no_of_adult'),
            'estimated_value' => $request->input('estimated_value'),
            'animal_responsible' => $request->input('animal_responsible'),
            'total_estimated_value' => $request->input('total_estimated_value'),
            'place_of_incident' => $request->input('place_of_incident'),
            'date_of_incident' => $request->input('date_of_incident'),
            'time_of_incident' => $request->input('time_of_incident'),
            'verified_by_name' => $request->input('verified_by_name'),
            'est_no' => $request->input('est_no'),
            'details_of_incident' => $request->input('details_of_incident'),
            'insert_name' => $request->input('insert_name'),
            'date_verified' => $request->input('date_verified'),
            'designation' => $request->input('designation'),
            'insideOrOutsidePA' => $request->input('insideOrOutsidePA'),
            ]
        );
        // dd($propertyDamage);
        $propertyDamage->save();

        return view('claims.properties')->with('success', 'Property damage successfully saved');

    }
    public function showCropClaims(Request $request)
    {
        if($request->ajax()) {
            $data = CropDestruction::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->editColumn(
                    'crop_name', function ($row) {
                        return $row->crop_name;
                    }
                )
                ->addColumn(
                    'claimant_name', function ($row) {
                        return $row->claimant->name;
                    }
                )
                ->editColumn(
                    'value', function ($row) {
                        return $row->value;
                    }
                )
                ->editColumn(
                    'place', function ($row) {
                        return $row->place;
                    }
                )
                ->editColumn(
                    'date', function ($row) {
                        return $row->date;
                    }
                )
                ->addColumn(
                    'action', function ($row) {
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        $crops_destruction = CropDestruction::all();
        return view('claims.index', compact('crops_destruction'));
    }

    public function showPropertyClaims(Request $request)
    {
        if($request->ajax()) {
            $data = PropertyDamage::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->editColumn(
                    'circumstances', function ($row) {
                        return $row->circumstances;
                    }
                )
                ->addColumn(
                    'claimant_name', function ($row) {
                        return $row->claimant->name;
                    }
                )
                ->editColumn(
                    'animal_responsible', function ($row) {
                        return $row->animal_responsible;
                    }
                )
                ->editColumn(
                    'place_of_incident', function ($row) {
                        return $row->place_of_incident;
                    }
                )
                ->editColumn(
                    'date_of_incident', function ($row) {
                        return $row->date_of_incident;
                    }
                )
                ->addColumn(
                    'action', function ($row) {
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        $property_damages = PropertyDamage::all();
        return view('claims.properties', compact('property_damages'));
    }

    public function showHumanDeathClaims(Request $request)
    {
        if($request->ajax()) {
            $data = HumanDeath::with('claimant')->select('human_deaths.*'); // Ensure to use correct relationship method name
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->addColumn(
                    'claimant_name', function ($row) {
                        return $row->claimant->name; // Assuming there's a 'name' column in the related 'claimant' table
                    }
                )
                ->make(true);
        }

        $human_deaths = HumanDeath::all();
        return view('claims.mortality', compact('human_deaths')); // Assuming you have a mortality.index view
    }

    
    // public function showHumanDeathClaims(Request $request)
    // {
    //     if($request->ajax()) {
    //         $data = HumanDeath::select('*');
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->editColumn(
    //                 'created_at', function ($row) {
    //                     return Carbon::parse($row->created_at)->format('Y-m-d');
    //                 }
    //             )
    //             ->editColumn(
    //                 'place_of_death', function ($row) {
    //                     return $row->place_of_death;
    //                 }
    //             )
    //             ->addColumn(
    //                 'claimant_name', function ($row) {
    //                     return $row->claimant->name;
    //                 }
    //             )
    //             ->editColumn(
    //                 'animal_responsible', function ($row) {
    //                     return $row->animal_responsible;
    //                 }
    //             )
    //             ->editColumn(
    //                 'date_of_incident', function ($row) {
    //                     return $row->date_of_incident;
    //                 }
    //             )
    //             ->editColumn(
    //                 'time_of_incident', function ($row) {
    //                     return $row->time_of_incident;
    //                 }
    //             )
    //             ->addColumn(
    //                 'action', function ($row) {
    //                     $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    //                     return $btn;
    //                 }
    //             )
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     $human_deaths = HumanDeath::all();
    //     return view('claims.mortality', compact('human_deaths'));
    // }

    /**
     * Summary of showSingleClaim
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed                    $claim_id
     * @return mixed
     */
    public function showSingleClaim(Request $request, $claim_id)
    {
        $cropDestruction = CropDestruction::where('id', $claim_id)->first();
        $cropDestruction_id = $cropDestruction->id;
        $attachments = CropDamageAttachment::where('crops_destruction_id', $cropDestruction_id)->get();
        // dd($attachments);
        if ($request->has('download')) {
            $pdf = Pdf::loadView('components.crop-report', compact('cropDestruction'));
            
            return $pdf->download('crop_destruction_claim_' . $claim_id . '.pdf');
        }

        return view('compensations.crop-damage', compact('cropDestruction', 'cropDestruction_id', 'attachments'));
    }

    public function showMortality($claim_id)
    {
        $humanDeath = HumanDeath::where('id', $claim_id)->first();
        $human_death_id = $humanDeath->id;
        $attachments = MortalityAttachment::where('human_deaths_id', $human_death_id)->get();
        return view('compensations.mortality', compact('humanDeath', 'human_death_id', 'attachments'));
    }

    public function showProperty($claim_id)
    {
        $propertyDamage = PropertyDamage::where('id', $claim_id)->first();
        $property_damages_id = $propertyDamage->id;
        $attachments = DestructionAttachment::where('property_damages_id', $property_damages_id)->get();
        return view('compensations.property-damage', compact('propertyDamage', 'property_damages_id', 'attachments'));
    }

    public function areaWarden($claim_id)
    {
        $cropDestruction = CropDestruction::where('id', $claim_id)->first();
        
        return view('compensations.area-warden', compact('cropDestruction'));
    }
    
    public function storeCropAttachments(Request $request)
    {
        // $request->validate([
        //     'agricultural_officer' => 'required|file|max:10240', // 10 MB
        //     'cwc_recommendations' => 'required|file|max:10240', // 10 MB
        //     'mwc_recommendations' => 'required|file|max:10240', // 10 MB
        // ]);
    
        // Assuming you have a claim_id to associate with these attachments
        $crop_destruction_id = $request->input('crop_destruction_id');
    
        // Find the claim or fail
    
        // Define attachment types and their corresponding request names
        $attachmentTypes = [
            'Valuation officer (agricultural/livestock officer report)' => 'agricultural_officer',
            'County wildlife compensation committee recommendations' => 'cwc_recommendations',
            'Ministerial wildlife compensation committee recommendation' => 'mwc_recommendations',
        ];
    
        foreach ($attachmentTypes as $type => $requestName) {
            if ($request->hasFile($requestName)) {
                $file = $request->file($requestName);
    
                // Store the file and get its path
                $path = $file->store('attachments', 'public');
    
                // Create a new attachment record
                $attachment = new CropDamageAttachment();
                $attachment->crops_destruction_id = $crop_destruction_id;
                $attachment->type = $type;
                $attachment->file_path = $path;
    
                // Save the attachment
                $attachment->save();
            }
        }
    
        return redirect()->back()->with('status', 'Attachments added successfully.');
    }
    public function storeDamageAttachments(Request $request)
    {
        // Uncomment this if you want to validate the files
        // $request->validate([
        //     'agricultural_officer' => 'nullable|file|max:10240', // 10 MB
        //     'cwc_recommendations' => 'nullable|file|max:10240', // 10 MB
        //     'mwc_recommendations' => 'nullable|file|max:10240', // 10 MB
        // ]);
            // dd($request->all());
        $property_damages_id = $request->input('property_damages_id');
    
        $attachmentTypes = [
            'Valuation officer (agricultural/livestock officer report)' => 'agricultural_officer',
            'County wildlife compensation committee recommendations' => 'cwc_recommendations',
            'Ministerial wildlife compensation committee recommendation' => 'mwc_recommendations',
        ];
    
        foreach ($attachmentTypes as $type => $requestName) {
            if ($request->hasFile($requestName)) {
                $file = $request->file($requestName);
                // dd($file);
                $path = $file->store('attachments', 'public');
    
                // Using create method
                DestructionAttachment::create(
                    [
                    'property_damages_id' => $property_damages_id,
                    'type' => $type,
                    'file_path' => $path,
                    ]
                );
            }
        }
    
        return redirect()->back()->with('status', 'Attachments added successfully.');
    }
    

    public function storeMortalityAttachments(Request $request)
    {
        // Validation rules can be uncommented and modified as needed
        // $request->validate([
        //     'oic' => 'required|file|max:10240',
        //     'medical' => 'required|file|max:10240',
        //     // ... other validation rules
        // ]);
    
        // Assuming you have a mortality_id to associate with these attachments
        $human_death_id = $request->input('human_death_id');
    
        // Define attachment types and their corresponding request names
        $attachmentTypes = [
            'Officer In Charge of a police station or post' => 'oic',
            'Medical officer report' => 'medical',
            'Ministerial wildlife compensation committee recommendation' => 'mwc_recommendations',
            'County wildlife compensation committee recommendations' => 'cwc_recommendations',
            'Relationship of next of kin to the victim' => 'kin_relationship',
            'Birth notification' => 'birth_notification',
            'Birth certificate' => 'birth_certificate',
            'Marriage certificate' => 'marriage_certificate',
            'Sworn affidavit' => 'sworn_affidavit',
        ];
    
        foreach ($attachmentTypes as $type => $requestName) {
            if ($request->hasFile($requestName)) {
                $file = $request->file($requestName);
    
                // Store the file and get its path
                $path = $file->store('attachments', 'public');
    
                // Create a new attachment record
                $attachment = new MortalityAttachment();  // Assuming you have a MortalityAttachment model
                $attachment->mortality_id = $human_death_id;  // Change this to the appropriate foreign key
                $attachment->type = $type;
                $attachment->file_path = $path;
    
                // Save the attachment
                $attachment->save();
            }
        }
    
        return redirect()->back()->with('status', 'Attachments added successfully.');
    }
    
}
