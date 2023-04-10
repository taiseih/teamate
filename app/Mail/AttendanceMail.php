<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $attendance, $jobType, $condition)
    {
        $this->name = $name;
        $this->attendance = $attendance;
        $this->jobType = $jobType;
        $this->condition = $condition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('test@example.com')
        ->subject($this->name.'さんの勤怠が登録されました')
        ->view('emails.mail')
        ->with(
            [
                'name' => $this->name,
                'attendance' => $this->attendance,
                'jobType' => $this->jobType,
                'condition' => $this->condition,
            ]);
    }
}
