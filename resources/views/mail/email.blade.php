
@component('mail::message')
# En Hora Buena
{{$enterate}}
@if ($noticia)
    @component('mail::panel')
    {{$objeto->user->name}}
    @endcomponent
@endif

<h1 class="title">{{$objeto->name}}</h1> 
<img style="margin-buton:2;" src="@if($objeto->image){{asset('storage/'.$objeto->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="Avatar of Author">,<br>

<span class="extract">{{$objeto->extract}}</span>


@component('mail::button', ['url' => $show, 'color' => 'primary'])
Click Para Leer Mas
@endcomponent
@lang('Gracias por leernos'),<br>
Mansion de Cristo

@slot('subcopy')
@lang(
    "Si tienes problemas con el boton \"Click Para Leer Mas\", copia y pega el URL\n".
    'en el navegador:') 
    <a href="{{ $show }}">
        <span>{{ $show }}</span>
    </a>
    
<h3>¿Por qué recibo este correo electrónico?</h3>
    Solo nos pondremos en contacto con usted si podemos ser útiles. En caso de no querer recibir más de estos correos electrónicos, haga clic aquí para
    <a href="{{ $show }}">
        <span >darse de baja</span>
    </a>
@endslot


@endcomponent
