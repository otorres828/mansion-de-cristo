@extends('layouts.blog')
@section('title','MDC-Ministerios')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('seo_principal')
    <meta name="description" content="Descubre cuales son los ministerios y departamentos pertenecientes a nuestra congregacion">
@endsection

@section('main')
    @livewire('blog.ministery')
@endsection

@section('footer')
    @include('components.footerT')
@endsection