<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobAppliction;
use App\Models\Jobs;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->guard('company')->check()) {
            // Redirect to login page or show an error message
            return redirect()->route('company.login')->with('error', 'Please log in to view the jobs.');
        }
        $companyUser = auth()->guard('company')->user();
        $company=Company::get();
        $companyJobs = $companyUser->jobs ?? collect();

        // Find all students who applied to the jobs in the company
    //     $students = Student::with(['applications.job.company'])
    // ->whereHas('applications.job', function ($query) use ($companyUser) {
    //     $query->where('company_id', $companyUser->id);
    // })
    // ->get();

// Now you can loop through the students and access their applications, job, and company.
// $jobs = Jobs::with(['applications.student']) // Load applications and related students
//     ->where('company_id', $companyUser->id)  // Filter jobs by the logged-in company
//     ->get();
$Jobscount = Jobs::where('company_id', $companyUser->id)->count();

    // Total students who applied to company's jobs
    $StudentCount = JobAppliction::whereHas('job', function ($query) use ($companyUser) {
        $query->where('company_id', $companyUser->id);
    })->distinct('student_id')->count('student_id');

    // Today's applied jobs
    $todayAppliedJobs = JobAppliction::whereHas('job', function ($query) use ($companyUser) {
        $query->where('company_id', $companyUser->id);
    })->whereDate('created_at', Carbon::today())->count();

    // Yesterday's applied jobs
    $yesterdayAppliedJobs = JobAppliction::whereHas('job', function ($query) use ($companyUser) {
        $query->where('company_id', $companyUser->id);
    })->whereDate('created_at', Carbon::yesterday())->count();
    $allJobsAppliedCount = JobAppliction::whereHas('job', function ($query) use ($companyUser) {
        $query->where('company_id', $companyUser->id);
    })->count();


        return view('company.dashboard', compact('Jobscount', 'StudentCount', 'todayAppliedJobs', 'yesterdayAppliedJobs','companyUser','allJobsAppliedCount'));
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
    public function share(string $id)
    {
        $job = Jobs::with('company')->find($id); // Assuming you have a relation set up

    if (!$job) {
        return response()->json(['error' => 'Job not found'], 404);
    }

    return response()->json($job);
    }

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
