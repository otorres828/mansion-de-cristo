@extends('layouts.blog')
@section('title','MDC-Anuncios')

@section('header')
    <header data-parallax="true" class=" bg-cover bg-center flex items-center relative h-64 py-48 dark-filter opacity-95" style="background-image: url(&quot;https://aprendible.nyc3.digitaloceanspaces.com/static/persona-programando-480w.jpg&quot;); transform: translate3d(0px, 0px, 0px);"></header>
@endsection

@section('main')
    @livewire('blog.announce')
@endsection

@section('footer')
    @include('components.footerT')
@endsection