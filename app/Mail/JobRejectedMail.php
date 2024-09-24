<?php

namespace App\Mail;

use App\Models\Jobs;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $student;

    public function __construct(Jobs $job, Student $student)
    {
        $this->job = $job;
        $this->student = $student;
    }

    public function build()
    {
        return $this->view('emails.job_rejected')
                    ->subject('Job Application Status: Rejected')
                    ->with([
                        'studentName' => $this->student->username,
                        'jobTitle' => $this->job->title,
                        'companyname'=>$this->job->company->name,
                    ]);
    }
}
