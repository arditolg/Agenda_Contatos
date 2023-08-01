<?php

namespace App\Listeners;

use App\Events\ContatoCadastrado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoContatoCadastrado;

class EnviarEmailContatoCadastrado implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  ContatoCadastrado  $event
     * @return void
     */
    public function handle(ContatoCadastrado $event)
    {
        Mail::to('luisgustavolg1000@yahoo.com.br')->send(new NovoContatoCadastrado($event->contact));
    }
}

