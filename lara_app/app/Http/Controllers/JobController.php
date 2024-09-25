<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;

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
            'employer_id' => 'required',
        ]);

        if (!isset($validatedData)) {
            abort(421);
            exit();
        }

        Job::insert($validatedData);
        return redirect()->to('/')->with(['success' => 'Job created successfully']);
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
        try {
            $job->delete();
            return redirect()->to('/jobs')->with('success', 'Job deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->to('/jobs')->with('error', 'Failed to delete the job.');
        }
    }
}
