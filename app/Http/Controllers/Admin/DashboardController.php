<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\JobApplicationMail;
use App\Mail\StudentApplicationNotification;
use App\Models\Company;
use App\Models\JobAppliction;
use App\Models\Jobs;
use App\Models\Resume;
use App\Models\Student;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         if (!auth()->guard('web')->check()) {
            // Redirect to login page or show an error message
            return redirect()->route('login')->with('error', 'Please log in to view the jobs.');
        }
        $user = Auth::user();
        $admin = auth()->guard('web')->user();

        $Jobs = Jobs::get();

        $students =Student::get();

        $company=Company::get();
        $StudentCount = $students->count();
        $Jobscount = $Jobs->count();

        $companiescount=$company->count();

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $todayAppliedJobs = JobAppliction::whereDate('created_at', $today)
                                        ->count();

        $yesterdayAppliedJobs = JobAppliction::whereDate('created_at', $yesterday)
                                            ->count();

        return view('admin.index', [
            'StudentCount' => $StudentCount,
            'Jobscount' => $Jobscount,
            'companiescount' => $companiescount,
            'todayAppliedJobs' => $todayAppliedJobs,
            'yesterdayAppliedJobs' => $yesterdayAppliedJobs,
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function jobs()
    {
        //
        $jobs = Jobs::with('company')->get();
        $jobApplications=JobAppliction::with('student')->get();
        $student = auth()->guard('web')->user();
        foreach ($jobs as $job) {
            $application = $job->applications->firstWhere('student_id', $student->id);
            $job->application_status = $application ? $application->status : 'not applied';
        }
        return view('admin.job', compact('jobs','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function student()
    {
        //
        $students = Student::with('resumes')->get();
    // Debug the first resume's student name (if exists)

    return view('admin.student', compact('students'));

    }

    /**
     * Display the specified resource.
     */
    public function company()
    {
        //
        $company=Company::get();
        return view('admin.company',compact('company'));
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
