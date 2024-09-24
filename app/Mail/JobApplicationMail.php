<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationMail extends Mailable
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
        return $this->view('emails.job_application')
                    ->subject('New Job Application')
                    ->with([
                        'studentName' => $this->student->username,
                        'jobTitle' => $this->job->title,
                        'resumeName' => $this->resume->resume_name,
                    ]);
    }
}
