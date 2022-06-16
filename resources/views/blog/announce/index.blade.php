@extends('layouts.blog')
@section('title','MDC-Noticias')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    @livewire('blog.announce')
@endsection

@section('footer')
    @include('components.footerT')
@endsection