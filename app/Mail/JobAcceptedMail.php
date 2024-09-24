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
        return $this->view('emails.job_accepted')
                    ->subject('Congratulations! You have passed the next round')
                    ->with([
                        'studentName' => $this->student->name,
                        'jobTitle' => $this->job->title,
                        'interviewDate' => $this->interviewDate,
                    ]);
    }
}
