<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Mail\JobAcceptedMail;
use App\Mail\JobRejectedMail;
use App\Models\JobAppliction;
use App\Models\Jobs;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppliedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companyUser = auth()->user();

        $jobApplications = JobAppliction::with('job', 'student')
            ->whereHas('job', function ($query) use ($companyUser) {
                $query->where('company_id', $companyUser->id);
            })
            ->get();


        return view('company.Applied_job.index',compact('jobApplications'));
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
    public function show(Jobs $job, Student $student)
    {
        $companyUser = auth()->user();

        if ($job->company_id !== $companyUser->id) {
            abort(403, 'Unauthorized action.');
        }

        $jobApplication = JobAppliction::with('student', 'job')
            ->where('job_id', $job->id)
            ->where('student_id', $student->id)
            ->first();

        if (!$jobApplication) {
            return back()->with('error', 'This student has not applied for the selected job.');
        }

        return view('company.Applied_job.show', compact('job', 'jobApplication'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job, Student $student)
    {
        // Find the job application for the given job and student
        $jobApplication = JobAppliction::where('job_id', $job->id)
                                        ->where('student_id', $student->id)
                                        ->first();

        if (!$jobApplication) {
            return back()->with('error', 'This student has not applied for the selected job.');
        }

        // Return a view with the job and student details, and job application
        return view('company.Applied_job.update', compact('job', 'student', 'jobApplication'));
    }


    public function update(Request $request, Jobs $job, Student $student)
    {
        $jobApplication = JobAppliction::where('job_id', $job->id)
                                        ->where('student_id', $student->id)
                                        ->first();

        if (!$jobApplication) {
            return back()->with('error', 'This student has not applied for the selected job.');
        }

        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);


        $jobApplication->status = $request->status;
        $jobApplication->save();

        if ($request->status === 'accepted') {
            $interviewDate = now()->addDays(7);
            Mail::to($student->email)->send(new JobAcceptedMail($job, $student, $interviewDate));
        } elseif ($request->status === 'rejected') {
            Mail::to($student->email)->send(new JobRejectedMail($job, $student));
        }

        return redirect()->route('applied.job.show', ['job' => $job->id, 'student' => $student->id])
        ->with('success', 'Job application status updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
