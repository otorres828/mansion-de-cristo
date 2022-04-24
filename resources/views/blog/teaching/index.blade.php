@extends('layouts.blog')
@section('title','MDC-Enseñanzas')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    @livewire('blog.teaching')
@endsection

@section('footer')
    @include('components.footerT')
@endsection



