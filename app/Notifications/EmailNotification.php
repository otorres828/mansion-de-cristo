<?php

namespace App\Notifications;

use App\Models\Announce;
use App\Models\Ministry;
use App\Models\Teaching;
use App\Models\Testimony;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $objeto;
    public $subject="";
    public $enterate="";
    public $show="";
    public $noticia=true;
    
    public function __construct(Object $objeto)
    {
        if($objeto instanceof Teaching){
            $this->subject="Nueva Enseñanza";
            $this->enterate="Enterate de la nueva enseñanza publicada por:";
            $this->show= route('blog.show_teaching', $objeto->slug);
        }else if($objeto instanceof Testimony){
            $this->subject="Nuevo Testimonio";
            $this->enterate="Enterate del ultimo testimonio que transformo la vida de:";
            $this->show= route('blog.show_testimony', $objeto->slug);
        }else if($objeto instanceof Announce){
            $this->subject="Nueva Noticia";
            $this->enterate="Enterate de la ultima noticia de nuestra congregacion titulada:";
            $this->show= route('blog.show_announces', $objeto->slug);
            $this->noticia=false;
        }else if($objeto instanceof Ministry){
            $this->subject="Nuevo Ministerio o departamento";
            $this->enterate="Enterate del nuevo ministerio o departamento:";
            $this->show= route('blog.show_ministery', $objeto->slug);
        }
        $this->objeto = $objeto;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->subject.": " . $this->objeto->name)
                    ->markdown('mail.email', ['objeto'=>$this->objeto,
                                                'enterate'=>$this->enterate,
                                                'show'=>$this->show,
                                                'noticia'=>$this->noticia]);
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
