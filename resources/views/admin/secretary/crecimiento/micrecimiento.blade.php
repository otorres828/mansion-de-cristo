@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Crecimientos</h1>
@stop

@section('content')
    @livewire('admin.crecimiento')
@stop

