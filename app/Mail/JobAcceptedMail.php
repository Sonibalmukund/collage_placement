<?php

namespace App\Mail;

use App\Models\Jobs;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $student;
    public $interviewDate;

    public function __construct(Jobs $job, Student $student, $interviewDate)
    {
        $this->job = $job;
        $this->student = $student;
        $this->interviewDate = $interviewDate;
    }

    public function build()
    {
        // Create the URL to interview details
        $interviewDetailsUrl = route('interview.details', ['job' => $this->job->id, 'student' => $this->student->id]);

        // Retrieve company logo dynamically
        $companyLogoUrl = $this->job->company->logo ? asset('storage/' . $this->job->company->logo) : null;

        $companyLogoUrl = $this->job->company->getLogoUrl();  // Assuming Jobs has a relation to Company

        return $this->view('emails.job_accepted')
                    ->subject('Congratulations! You have passed the next round')
                    ->with([
                        'studentName' => $this->student->name,
                        'jobTitle' => $this->job->title,
                        'interviewDate' => $this->interviewDate,
                        'interviewDetailsUrl' => $interviewDetailsUrl,
                        'companyLogoUrl' => $companyLogoUrl,
                    ]);
    }
}
