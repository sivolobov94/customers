<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedBack extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    private $name;
    private $email;
    /**
     * Create a new message instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->email = $request->email;
        $this->subject = 'Обратная связь';
        $this->message = $request->message;
        $this->name = $request->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = ['name' => $this->name, 'message' => $this->message];
        return $this->from($this->email)->view('mail.feedback', $data);
    }
}
