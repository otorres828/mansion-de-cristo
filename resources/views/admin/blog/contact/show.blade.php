@extends('adminlte::page')

@section('title', 'Lista de Mensajes')

@section('content_header')
    <h1>Mensaje</h1>
    
@stop

@section('content')
    <div class="card">       
        <div class="card-header" style="display:inline-flex">
            <h4>Nombre: </h4>
            <h4>{{$contact->name}}</h4><br>
        </div>
        <div class="card-header" style="display:inline-flex">
            <h4>Correo: </h4>
            <h4>{{$contact->email}}</h4>
        </div>

        <div class="card-body" style="background-color:rgb(252, 250, 250)">
            {!! Form::model($contact,['route'=>['admin.blog.contact.update',$contact],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                <div class="card-header " >
                    <h4 class="text-center">{{$contact->title}}</h4>
                    <p>{{ $contact->description}}</p>
                    
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                        NO LEIDO
                    </label>
                    <label>
                        {!! Form::radio('status', 2) !!}
                        LEIDO
                    </label>          
                </div>
                {!! Form::submit('Actualizar', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
@stop