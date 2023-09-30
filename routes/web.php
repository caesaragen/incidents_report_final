<?php

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
    }
);

require __DIR__.'/auth.php';
