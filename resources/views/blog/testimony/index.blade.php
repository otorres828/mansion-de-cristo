@extends('layouts.blog')
@section('title','MDC-Testimonios')

@section('header')
<div data-parallax="true" class=" bg-cover bg-center flex items-center relative h-64 py-48 dark-filter opacity-90" style="background-image: url(&quot;https://scontent-mia3-1.xx.fbcdn.net/v/t39.30808-6/260441721_6496051857133185_6705141970517452324_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=0debeb&_nc_ohc=Y7e0DsYnCLEAX9EObDd&_nc_ht=scontent-mia3-1.xx&oh=00_AT9Zghg5tjqPUh4hTej2JI8v6pJcOFEyZB3eInUm1rCyVw&oe=62650A90&quot;); transform: translate3d(0px, 0px, 0px);"></div>
@endsection

@section('main')
    @livewire('blog.testimony')
@endsection

@section('footer')
    @include('components.footerT')
@endsection






