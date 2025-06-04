<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->mailData['subject'],
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.user_notification',
            with: [
                'content' => $this->mailData['message'],
            ],
        );
    }

    public function attachments()
    {
        $attachments = [];
        foreach ($this->mailData['attachments'] as $file) {
            $attachments[] = Attachment::fromPath($file->getRealPath())
                ->as($file->getClientOriginalName())
                ->withMime($file->getClientMimeType());
        }
        return $attachments;
    }
}