<?php

use App\Http\Controllers\Incident\IncidentAssessmentController;
use App\Http\Controllers\Incident\IncidentsController;
use App\Http\Controllers\Incident\ObController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/', function () {
        return view('welcome');
    }
);

// Route::get(
//     '/dashboard', function () {
//         return view('dashboard');
//     }
// )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('obs', ObController::class);
        Route::get('/dashboard', [IncidentsController::class, 'dashboard'])->name('dashboard');
        Route::post('/obs', [ObController::class, 'store'])->name('obs.store');
        Route::get('/incidents', [IncidentsController::class, 'create'])->name('incidents.create');
        Route::post('/incidents', [IncidentsController::class, 'store'])->name('incidents.store');
        // Route::get('/incidents/{incident}', [IncidentsController::class, 'show'])->name('incidents.show');
        Route::get('/incidents/all', [IncidentsController::class, 'show'])->name('incidents.index');
        Route::get('/incidents/report', [IncidentsController::class, 'incidentAssessment'])->name('incidents.report');
        Route::post('/incidents/assessment', [IncidentAssessmentController::class, 'create'])->name('incidents.assessment.store');
        Route::get('/assessment/all', [IncidentAssessmentController::class, 'index'])->name('compensations.index');
        // Route::get('/compensation/create', [IncidentAssessmentController::class, 'claim'])->name('compensations.create');
        // Route::get('/compensation/create/{assessment_id}', [IncidentAssessmentController::class, 'claim'])->name('compensations.create');
        Route::get('/compensation/create/{incident_assessment_id}', [IncidentAssessmentController::class, 'claim'])->name('compensations.create');
        Route::post('/claimants/store', [IncidentAssessmentController::class, 'saveClaimant'])->name('claimants.store');
        Route::post('/kin/store', [IncidentAssessmentController::class, 'createKin'])->name('kin.store');
        Route::post('/comments/store', [IncidentAssessmentController::class, 'saveChiefComments'])->name('comments.store');
        Route::post('crops/store', [IncidentAssessmentController::class, 'saveCropsDestruction'])->name('crops.store');
        Route::get('/claims/all', [IncidentAssessmentController::class, 'showCropClaims'])->name('claims.index');
        Route::get('/claims/crop-damage/{claim_id}',  [IncidentAssessmentController::class, 'showSingleClaim'])->name('claims.crop-damage');
        Route::get('area-warden/claim/{claim-id}', [IncidentAssessmentController::class, 'areaWarden'])->name('area-warden.report');
    }
);

require __DIR__.'/auth.php';
