<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::query()->with('employer')->orderBy('id', 'desc')->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employers = Employer::all()->pluck(['id' => 'name']);
        return view('jobs.create', [
            'employers' => $employers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'salary' => 'required|string',
            'employer_id' => 'required'
        ]);



        $job = Job::create([
            'title' => $validatedData['title'],
            'salary' => $validatedData['salary'],
            'employer_id' => $validatedData['employer_id']
        ]);

        Mail::to(Auth::user())->send(
            new JobPosted($job)
        );


        return redirect()->to('/jobs')->with(['success' => 'Job created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        if (!isset($job)) {
            abort(404);
        }

        if (!Gate::allows('edit-job', $job)) {
            abort(401);
        };

        $employers = Employer::all()->pluck(['id' => 'name']);

        return view('jobs.edit', [
            'job' => $job,
            'employers' => $employers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        if (!isset($job)) {
            abort(404);
        }

        if (!Gate::allows('edit-job', $job)) {
            abort(401);
        };

        $validatedData = $request->validate([
            'title' => 'nullable',
            'salary' => 'nullable',
            'employer_id' => 'nullable',
        ]);

        if ($validatedData['employer_id'] === '0') {
            $validatedData['employer_id'] = $job['id'];
        }

        $result = $job->update($validatedData);

        if ($result === true) {
            return redirect()->to('/jobs')->with(['message' => 'Job updated successfully']);
        } else {
            abort(421);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        if (!Gate::allows('edit-job', $job)) {
            abort(401);
        };
        try {
            $job->delete();
            return redirect()->to('/jobs')->with('success', 'Job deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->to('/jobs')->with('error', 'Failed to delete the job.');
        }
    }
}
