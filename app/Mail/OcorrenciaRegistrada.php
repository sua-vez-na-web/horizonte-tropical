<?php

namespace App\Mail;

use App\Ocorrencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OcorrenciaRegistrada extends Mailable
{
    use Queueable, SerializesModels;

    public $ocorrencia;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ocorrenciaRegistrada');
    }
}
