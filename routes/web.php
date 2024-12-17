<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    GejalaController,
    DiagnosisController,
    RuleController,
    SolusiController
};

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

Route::get('/', function () {
    $user = Session::get('user');
    
    if ($user) {
        
        if ($user['role'] === 'admin') {
            return redirect('admin/dashboard');
        } else {
            return redirect('user/dashboard');
        }
    }

    
    return view('Home');
})->name('Home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route dashboard user
Route::get('user/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'user') {
        return view('user.dashboard');
    } else {
        return redirect('login');
    }
})->name('user.dashboard');

// Route dashboard admin
Route::get('admin/dashboard', function () {
    $user = Session::get('user');
    if ($user && $user['role'] === 'admin') {
        return view('admin.dashboard');
    } else {
        return redirect('login');
    }
})->name('admin.dashboard');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::prefix('admin')->name('admin.')->group(function () {
    // Gejala Routes
    Route::get('gejala', [GejalaController::class, 'index'])->name('gejala.index');
    Route::get('gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
    Route::post('gejala', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::put('gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

    // Diagnosis Routes
    Route::get('diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::get('diagnosis/create', [DiagnosisController::class, 'create'])->name('diagnosis.create');
    Route::post('diagnosis', [DiagnosisController::class, 'store'])->name('diagnosis.store');
    Route::get('diagnosis/{id}/edit', [DiagnosisController::class, 'edit'])->name('diagnosis.edit');
    Route::put('diagnosis/{id}', [DiagnosisController::class, 'update'])->name('diagnosis.update');
    Route::delete('diagnosis/{id}', [DiagnosisController::class, 'destroy'])->name('diagnosis.destroy');

    // Rule Routes
    Route::get('rules', [RuleController::class, 'index'])->name('rules.index');
    Route::get('rules/create', [RuleController::class, 'create'])->name('rules.create');
    Route::post('rules', [RuleController::class, 'store'])->name('rules.store');
    Route::get('rules/{id}/edit', [RuleController::class, 'edit'])->name('rules.edit');
    Route::put('rules/{id}', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('rules/{id}', [RuleController::class, 'destroy'])->name('rules.destroy');

    // Solution Routes
    Route::get('admin/solusi', [SolusiController::class, 'index'])->name('admin.solusi.index');
    Route::get('solusi', [SolusiController::class, 'index'])->name('solusi.index');
    Route::get('solusi/create/{diagnosis_id}', [SolusiController::class, 'create'])->name('solusi.create');
    Route::post('solusi', [SolusiController::class, 'store'])->name('solusi.store');
    Route::get('solusi/{id}/edit', [SolusiController::class, 'edit'])->name('solusi.edit');
    Route::put('solusi/{id}', [SolusiController::class, 'update'])->name('solusi.update');
    Route::delete('solusi/{id}', [SolusiController::class, 'destroy'])->name('solusi.destroy');
});
