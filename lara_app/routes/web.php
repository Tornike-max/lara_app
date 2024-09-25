<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');

    Route::get('/jobs/create', 'create');

    Route::post('/jobs/store', 'store');

    Route::get('/jobs/{job}/edit', 'edit');

    Route::put('/jobs/update/{job}', 'update');

    Route::delete("/jobs/{job}", 'destroy');

    Route::get('/jobs/{job}', 'show');
});
// Route::resource('/jobs', JobController::class);
Route::view('/contact', 'contact');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);
