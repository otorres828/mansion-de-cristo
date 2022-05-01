<?php

namespace App\Mail;

use App\Models\Teaching;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeachingMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $teaching;
    public $subject="Nueva Enseñanza";
    public function __construct(Teaching $teaching)
    {
        $this->teaching=$teaching;
    }


    public function build()
    {
        return $this->markdown('mail.teaching');
    }
}
