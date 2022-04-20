@extends('layouts.blog')
@section('title','MDC-Anuncios')

@section('main')
    @livewire('blog.announce')
@endsection

@section('footer')
    @include('components.footerT')
@endsection