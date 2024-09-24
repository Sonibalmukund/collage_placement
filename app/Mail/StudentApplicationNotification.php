<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentApplicationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $job;
    public $resume;

    public function __construct($student, $job, $resume)
    {
        $this->student = $student;
        $this->job = $job;
        $this->resume = $resume;
    }

    public function build()
    {
        return $this->view('emails.student_application_notification')
                    ->subject('Application Submitted Successfully')
                    ->with([
                        'studentName' => $this->student->username,
                        'jobTitle' => $this->job->title,
                        'resumeName' => $this->resume->resume_name,
                        'companyname'=>$this->job->company->name,
                    ]);
    }
}

