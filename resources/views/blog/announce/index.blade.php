@extends('layouts.blog')
@section('title', 'MDC-Noticias')

@section('seo_principal')
    <meta name="description" content="Encuentra las noticias mas recientes de nuestra congregacion">
@endsection

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    @livewire('blog.announce')
@endsection

@section('footer')
    @include('components.footerT')
@endsection
