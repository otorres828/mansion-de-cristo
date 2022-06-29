@extends('layouts.blog')
@section('title','MDC-Testimonios')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('seo_principal')
    <meta name="description" content="Descubre cuales son los testimonios mas impactantes en los cuales Cristo cambio una vida. Tambien puede cambiar la tuya.">
@endsection

@section('main')
    @livewire('blog.testimony')
@endsection

@section('footer')
    @include('components.footerT')
@endsection






