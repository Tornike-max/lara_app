<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    $jobs = Job::query()->with('employer')->orderBy('id', 'desc')->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    $employers = Employer::all()->pluck(['id' => 'name']);
    return view('jobs.create', [
        'employers' => $employers
    ]);
});


Route::post('/jobs/store', function () {
    $validatedData = request()->validate([
        'title' => 'required|string',
        'salary' => 'required|string',
        'employer_id' => 'required',
    ]);

    if (!isset($validatedData)) {
        abort(421);
        exit();
    }

    Job::insert($validatedData);
    return redirect()->to('/')->with(['success' => 'Job created successfully']);
    dd($validatedData);
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
