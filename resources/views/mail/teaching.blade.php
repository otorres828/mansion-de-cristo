
@component('mail::message')
# En Hora Buena
Enterate de la nueva enseñanza publicada por:
@component('mail::panel')
{{$teaching->user->name}}
@endcomponent

<h1 class="title">{{$teaching->name}}</h1> 
<img style="margin-buton:2;" src="@if($teaching->image){{asset('storage/'.$teaching->image->url)}}@else https://www.teknofilo.com/wp-content/uploads/2020/03/whatsapp-1280x720.jpg @endif" alt="Avatar of Author">,<br>

<span class="extract">{{$teaching->extract}}</span>


@component('mail::button', ['url' => route('blog.show_teaching',$teaching->slug), 'color' => 'primary'])
Click Para Leer Mas
@endcomponent

@lang('Gracias por leernos'),<br>
Mansion de Cristo

@slot('subcopy')
@lang(
    "Si tienes problemas con el boton \"Click Para Leer Mas\", copia y pega el URL\n".
    'en el navegador:') 
    <a href="{{route('blog.show_teaching',$teaching->slug)}}">
        <span>{{route('blog.show_teaching',$teaching->slug)}}</span>
    </a>
    
<h3>¿Por qué recibo este correo electrónico?</h3>
    Solo nos pondremos en contacto con usted si podemos ser útiles. En caso de no querer recibir más de estos correos electrónicos, haga clic aquí para
    <a href="{{route('blog.show_teaching',$teaching->slug)}}">
        <span >darse de baja</span>
    </a>
@endslot


@endcomponent
