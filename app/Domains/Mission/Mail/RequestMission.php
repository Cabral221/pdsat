<?php

namespace App\Domains\Mission\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestMission extends Mailable
{
    use Queueable, SerializesModels;

    public $genre;
    public $demandeur;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $demandeur, bool $genre)
    {
        $this->genre = $genre;
        $this->demandeur = $demandeur;
        $this->link = route('admin.missions.index');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('DEMANDE D\'ORDRE DE MISSION')
        ->markdown('emails.request-mission');
    }
}
