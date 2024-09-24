<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicationMail;
use App\Mail\StudentApplicationNotification;
use App\Models\Company;
use App\Models\JobAppliction;
use App\Models\Jobs;
use App\Models\Resume;
use App\Models\Student;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Check if the student is authenticated
        if (!auth()->guard('student')->check()) {
            return redirect()->route('login')->with('error', 'Please log in to view the jobs.');
        }
        $user = Auth::user();
        $student = auth()->guard('student')->user();

        $appliedJobs = JobAppliction::where('student_id', $student->id)
                                    ->pluck('job_id');

        $availableJobs = Jobs::whereNotIn('id', $appliedJobs)->get();

        $appliedJobCount = $appliedJobs->count();
        $availableJobCount = $availableJobs->count();

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $todayAppliedJobs = JobAppliction::where('student_id', $student->id)
                                        ->whereDate('created_at', $today)
                                        ->count();

        $yesterdayAppliedJobs = JobAppliction::where('student_id', $student->id)
                                            ->whereDate('created_at', $yesterday)
                                            ->count();

        return view('student.index', [
            'appliedJobs' => $appliedJobs,
            'availableJobs' => $availableJobs,
            'appliedJobCount' => $appliedJobCount,
            'availableJobCount' => $availableJobCount,
            'todayAppliedJobs' => $todayAppliedJobs,
            'yesterdayAppliedJobs' => $yesterdayAppliedJobs,
            'student' => $student
        ]);
    }



    public function ListedJobs()
    {
        $jobs = Jobs::with('company')->get();
        $student = auth()->guard('student')->user();
        foreach ($jobs as $job) {
            $application = JobAppliction::where('job_id', $job->id)
                                        ->where('student_id', $student->id)
                                        ->first();
            $job->application_status = $application ? $application->status : 'not applied';
        }
        return view('student.listedJobs', compact('jobs','student'));
    }


    public function show($id)
    {
        $job = Jobs::with('company')->findOrFail($id);
        $job->formatted_deadline = Carbon::parse($job->application_deadline)->format('d M, Y');
        $student = auth()->guard('student')->user();
        $application = JobAppliction::where('job_id', $id)
        ->where('student_id', $student->id)
        ->first();
        return view('student.show', compact('job', 'student','application'));
    }

    public function apply(Request $request, $jobId)
{
    // Validate the input
    $request->validate([
        'resume_file' => 'required|mimes:pdf,doc,docx|max:2048',
        'tenth_mark' => 'required|numeric',  // Add validation for 10th mark
        'twelfth_mark' => 'required|numeric',  // Add validation for 12th mark
        'graduation_mark' => 'required|numeric',  // Add validation for graduation mark
    ], [
        'resume_file.required' => 'Please upload a resume.',
        'resume_file.mimes' => 'Only PDF, DOC, or DOCX files are allowed.',
        'resume_file.max' => 'The resume file cannot be larger than 2MB.',
        'tenth_mark.required' => 'Please enter your 10th mark.',
        'twelfth_mark.required' => 'Please enter your 12th mark.',
        'graduation_mark.required' => 'Please enter your graduation mark.',
    ]);

    $student = auth()->guard('student')->user();

    if (!$student) {
        return redirect()->back()->with('error', 'You must be logged in to apply.');
    }

    // Store the resume file
    if ($request->hasFile('resume_file') && $request->file('resume_file')->isValid()) {
        $resumePath = $request->file('resume_file')->store('resumes', 'public');

        // Save resume details
        $resume = new Resume();
        $resume->student_id = $student->id;
        $resume->resume_name = $request->file('resume_file')->getClientOriginalName();
        $resume->resume_file = $resumePath;
        $resume->save();
    } else {
        // Handle the error
        return back()->withErrors(['resume_file' => 'Invalid file upload.']);
    }

    // Update student's contact number if it's not already saved

    // Create the job application
    $application = new JobAppliction();
    $application->job_id = $jobId;
    $application->student_id = $student->id;
    $application->resume_id = $resume->id;
    $application->status = 'pending';
    $application->tenth_mark = $request->input('tenth_mark');  // Get 10th mark from request
    $application->twelfth_mark = $request->input('twelfth_mark');  // Get 12th mark from request
    $application->graduation_mark = $request->input('graduation_mark');
    $application->save();

    // Send email notifications
    $job = Jobs::findOrFail($jobId);
    $company = $job->company;

    Mail::to($company->email)->send(new JobApplicationMail($student, $job, $resume));
    Mail::to($student->email)->send(new StudentApplicationNotification($student, $job, $resume));

    return redirect()->back()->with('success', 'Application submitted successfully!');
}

    public function appliedJobs()
    {
        $student = auth()->guard('student')->user();

        $appliedJobs = JobAppliction::with(['job.company'])
            ->where('student_id', $student->id)
            ->get();

        return view('student.appliedJobs', compact('appliedJobs'));
    }


}
