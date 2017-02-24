<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Evento;
use Illuminate\Support\Facades\Auth;

class ExcluidoEvento extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $evento_id;
    public function __construct($evento_id)
    {
        $this->evento_id = $evento_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $evento =  Evento::where('id',$this->evento_id)->first();
        $url = url('user'); 
        return $this->markdown('emails.excluirEvento')->with('user', Auth::user())->with('evento',$evento)->with('url',$url);;
    }
}
