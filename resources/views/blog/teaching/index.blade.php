@extends('layouts.blog')
@section('title','MDC-Enseñanzas')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('seo_principal')
    <meta name="description" content="Aqui podras leer todas las enseñanzas mas recientes de los pastores de nuestra congregacion. A traves de estas lecturas podras transformar tu vida mediante la palabra de Dios.">
@endsection

@section('main')
    @livewire('blog.teaching')
@endsection

@section('footer')
    @include('components.footerT')
@endsection



