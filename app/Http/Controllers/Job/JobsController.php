<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\JobAppliction;
use App\Models\Jobs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companyUser = auth()->user();

        $job = Jobs::with('company')
            ->whereHas('company', function ($query) use ($companyUser) {
                $query->where('company_id', $companyUser->id);
            })
            ->get();
            return view('company.index', compact('job'));
        // return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('company.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $jobs=$request->validate([
            'title'=>'required',
            'position'=>'required',
            'vacancy'=>'required|numeric',
            'location'=>'required',
            'type'=>'required',
            'salary'=>'required|numeric',
            'description'=>'required',
            'application_deadline'=>'required',
            'company_id'=>'required',
        ]);
        $applicationDeadline = Carbon::createFromFormat('d F Y', $request->input('application_deadline'))->format('Y-m-d');
        // dd($jobs);
    // Create the job
    Jobs::create([
        'title' => $request->input('title'),
        'position' => $request->input('position'),
        'vacancy' => $request->input('vacancy'),
        'location' => $request->input('location'),
        'description' => $request->input('description'),
        'application_deadline' => $applicationDeadline,
        'type' => $request->input('type'),
        'company_id' => $request->company_id,
        'salary' => $request->input('salary'),

    ]);
        return redirect()->route('jobs.index')->with('success','Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $job = Jobs::with('company')->find($id);

        if (!$job) {
            // Handle the case where the job is not found
            return redirect()->back()->withErrors(['error' => 'Job not found!']);
        }

        return view('company.show', compact('job'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $jobs = Jobs::with('company')->find($id);
        return view('company.edit', compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate=$request->validate([
            'title'=>'required',
            'position'=>'required',
            'vacancy'=>'required|numeric',
            'location'=>'required',
            'type'=>'required',
            'salary'=>'required|numeric',
            'description'=>'required',
            'application_deadline'=>'required',
            'company_id'=>'required',
            'updated_at'=>now(),
        ]);
        $validate['application_deadline'] = Carbon::createFromFormat('d F Y', $request->input('application_deadline'))->format('Y-m-d');

        $jobs = Jobs::with('company')->find($id);
        $jobs->update($validate);
        return redirect()->route('jobs.index')
      ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the item and delete it
    $item = Jobs::findOrFail($id);
    $item->delete();

    // Redirect back with success message
    return back()->with('success', 'Item deleted successfully.');
}
}
