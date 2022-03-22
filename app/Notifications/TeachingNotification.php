<?php

namespace App\Notifications;

use App\Models\Teaching;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeachingNotification extends Notification
{
    use Queueable;
    public $teaching;
    public $subject="Nueva Enseñanza";
    public function __construct(Teaching $teaching)
    {
        $this->teaching=$teaching;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nueva Enseñanza: '. $this->teaching->name)
                    ->markdown('mail.teaching', ['teaching'=>$this->teaching]);
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
