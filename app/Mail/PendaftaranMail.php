<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details; // Properti untuk menyimpan data email

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details; // Menyimpan data ke properti
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Pendaftaran Akun')
            ->view('email.pendaftaran')
            ->with('details', $this->details); // Mengirim data ke view
    }
}
