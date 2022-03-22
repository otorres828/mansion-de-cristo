@extends('adminlte::page')

@section('title', 'Editar Testimonio')

@section('content_header')
    <h1>Editar Testimonio</h1>
    
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4><strong>{{session('info')}}</strong></h4>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($testimony,['route'=>['admin.blog.testimony.update',$testimony],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.testimony')
                {!! Form::submit('Actualizar Ministerio/Departamento', ['class'=>'btn btn-primary float-right']) !!}
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
    <script>
        console.log('Hi!');
    </script>

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
