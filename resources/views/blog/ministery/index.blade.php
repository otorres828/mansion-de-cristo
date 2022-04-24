@extends('layouts.blog')
@section('title','MDC-Ministerios')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    @livewire('blog.ministery')
@endsection

@section('footer')
    @include('components.footerT')
@endsection