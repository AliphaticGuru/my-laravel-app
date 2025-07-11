<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
// use App\Models\Job;


Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/welcome', 'welcome');


// Route::resource('jobs', JobController::class)->middleware('auth');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', [JobController::class, 'index']);
    Route::get('/jobs/create', [JobController::class, 'create']);
    Route::get('/jobs/{job}', [JobController::class, 'show']);
    Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
        ->middleware('auth')
        ->can('edit', 'job');

    Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create'] );
Route::post('/register', [RegisteredUserController::class, 'store'] );

Route::get('login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('/', function () {    
//     return view('home');
// });


// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
