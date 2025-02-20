<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewDemandeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $title;
    public $subject;
    public $type;
    /**
     * Create a new type instance.
     *
     * @return void
     */
    public function __construct(String $url, String $title, String $subject, String $type)
    {
        //
        $this->url = $url;
        $this->title = $title;
        $this->subject = $subject;
        $this->type = $type;
    }

    public function build()
{
    return $this->subject("A/S Loi0621 : ". $this->subject)
                ->view('emails.new-'.$this->type)
                ->with([
                    'url' => $this->url,
                    'title' => $this->title,
                    'type' => $this->type,
                ]);
}

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
