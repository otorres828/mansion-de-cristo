@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
@stop

@section('content')
    @livewire('blog.estadisticas',['hoy'=>$hoy])
@stop


