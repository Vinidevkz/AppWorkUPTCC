<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContatoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function build()
    {
        return $this->subject('Nova Mensagem para a Dynamo')
                    ->view('emails.contato'); // Aponte para a sua view
    }
}
