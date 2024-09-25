<?php

use App\Http\Controllers\JobController;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');

//     Route::get('/jobs/create', 'create');

//     Route::post('/jobs/store', 'store');

//     Route::get('/jobs/{job}/edit', 'edit');

//     Route::put('/jobs/update/{job}', 'update');

//     Route::delete("/jobs/{job}", 'destroy');

//     Route::get('/jobs/{job}', 'show');

// });
Route::resource('/jobs', JobController::class);
Route::view('/contact', 'contact');
