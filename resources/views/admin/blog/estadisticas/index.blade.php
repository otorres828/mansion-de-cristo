@extends('adminlte::page')

@section('title', 'Estadisticas')


@section('content')
    @livewire('blog.estadisticas',['hoy'=>$hoy])
@stop


