<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class mailbody extends Mailable
{
    use Queueable, SerializesModels;
    public $dd;

    /**
     * Create a new message instance.
     */
    public function __construct($dd)
    {
        $this->dd = $dd;
    }

    /**
     * Get the message envelope.
     */
  
    public function build()
    {
        return $this->view('mailbody');
        
    }
}
    

