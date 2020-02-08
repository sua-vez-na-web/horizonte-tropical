<?php

namespace App\Mail;

use App\Correspondencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaidaCorrespondencia extends Mailable
{
    use Queueable, SerializesModels;
    public $correspondencia;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Correspondencia $correspondencia)
    {
        $this->correspondencia = $correspondencia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.SaidaCorrespondencia');
    }
}
