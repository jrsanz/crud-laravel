<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reporte extends Mailable
{
    use Queueable, SerializesModels;

    public $reporte;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reporte = "ESTE ES EL REPORTE";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('reportes@mi-proyecto.test', 'Reportes')->view('emails.reporte');
        //return $this->view('view.name');
    }
}
