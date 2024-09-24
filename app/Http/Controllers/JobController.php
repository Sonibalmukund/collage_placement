<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobAppliction;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Jobs::with('company')->get();
        $student = auth()->guard('student')->user();
        return view('job.dashboard', compact('jobs', 'student'));
    }

    public function show($id)
    {
        $jobs = Jobs::findOrFail($id);
        $jobs->formatted_deadline = Carbon::parse($jobs->application_deadline)->format('d-m-Y');
        $company = $jobs->company;

        $student = auth()->guard('student')->user();

        return view('job.show', compact('company', 'jobs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
