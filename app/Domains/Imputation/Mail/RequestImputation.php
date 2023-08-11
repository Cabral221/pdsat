<?php

namespace App\Domains\Imputation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestImputation extends Mailable
{
    use Queueable, SerializesModels;

    public $demandeur;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $demandeur)
    {
        $this->demandeur = $demandeur;
        $this->link = route('admin.imputations.index');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cabraldiop18@gmail.com', 'MDCSNEST')
        ->subject('DEMANDE D\'IMPUTATION BUDGETAIRE')
        ->markdown('emails.request-imputation');
    }
}
