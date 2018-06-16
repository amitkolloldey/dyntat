<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $fromData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $fromData)
    {
        $this->fromData = $fromData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->fromData;
        return $this->from($data['email'], $data['name'])
            ->subject('Contact Form')
            ->markdown('mail.contact.contact')
            ->with('fromData', $data);
    }
}
