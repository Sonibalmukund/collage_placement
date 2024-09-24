<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Student;
use Carbon\Carbon;

class InterviewController extends Controller
{
    public function show(Jobs $job, Student $student)
    {
        // You can fetch more interview-related details here and pass them to a view
        $job = Jobs::with('company')->find($job->id);

        // Fetch the specific student (if you have any relations on the student model, use them as needed)
        $student = Student::find($student->id);
        $interviewDate = Carbon::now()->addDays(7)->format('Y-m-d');
        $companyLogoUrl = $job->company->logo ? asset('storage/' . $job->company->logo) : null;
        return view('interviews.details', compact('job', 'student','interviewDate','companyLogoUrl'));
    }
}
