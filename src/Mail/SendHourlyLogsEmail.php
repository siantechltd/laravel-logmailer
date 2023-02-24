<?php

namespace Siantech\LogMailer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendHourlyLogsEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        $this->files = $files;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $envelop = new Envelope();

        if(!config('logmailer.to')){
            throw new \Exception("Invalid <to> address!");
        }

        $addresses = explode(',', config('logmailer.to'));
        $envelop->to($addresses);

        if(config('logmailer.cc')){
            $envelop->cc(config('logmailer.cc'));
        }

        if(config('logmailer.bcc')){
            $envelop->bcc(config('logmailer.bcc'));
        }

        $envelop->subject(config('logmailer.subject'));

        return $envelop;
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            'vendor.siantech.emails.log-email'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $attachments = [];

        foreach ($this->files as $filename) {
            $attachments[] = Attachment::fromPath($filename);
        }

        return $attachments;
    }
}
