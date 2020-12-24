<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Сайт сломался';


    public function __construct($data)
    {
        // todo: пока неизвестно куда отправлять и нет шаблона письма
    }


    public function build()
    {
        return $this->view('view.name');
    }
}
