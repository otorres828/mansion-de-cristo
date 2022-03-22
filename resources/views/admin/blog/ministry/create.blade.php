@extends('adminlte::page')

@section('title', 'Crear Ministerio')

@section('content_header')
    <h1>Publicar un Ministerio o Departamento</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.ministry.store','autocomplete'=>'off','files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('admin.partiels.form')
                {!! Form::submit('Publicar Ministerio/Departamento', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
   <style>
       .image-wraper{
           position: relative;
           padding-bottom: 70%;
       }

       .image-wraper img{
           position: absolute;
           object-fit: cover;
           width: 100%;
           height: 100%;
       }
   </style>
@stop


@section('js')
    <script src="{{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <script>
        //cambiar imagen
        document.getElementById('file').addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event)=>{
                document.getElementById('picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

@stop
