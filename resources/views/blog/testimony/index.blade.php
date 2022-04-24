@extends('layouts.blog')
@section('title','MDC-Testimonios')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    @livewire('blog.testimony')
@endsection

@section('footer')
    @include('components.footerT')
@endsection






