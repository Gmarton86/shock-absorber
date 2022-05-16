<?php

namespace App\Mail;

use App\Models\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $logs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->logs = Log::all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.logs')->subject("Logs");
    }
}
