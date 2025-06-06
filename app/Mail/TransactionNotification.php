<?php

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data; // includes type, name, amount, etc.
    }

    public function build()
    {
        return $this->subject($this->data['type'] . ' Notification')
                    ->view('emails.transaction_notification')
                    ->with('data', $this->data);
    }
}
