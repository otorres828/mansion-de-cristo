@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
@stop

@section('content')
    @livewire('blog.estadisticas',['hoy'=>$hoy])
@stop

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

@stop

@section('js')
<x-scrip-table-blog/>
@stop
