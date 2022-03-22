@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Listado de Categoria</h1>
@stop

@section('content')
    <x-alert/>
    <div class="mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Agregar Categoria</button>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar una nueva categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route'=>'admin.blog.category.store','autocomplete'=>'off']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'NOMBRE DE LA CATEGORIA',) !!}
                                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Categoria']) !!}           
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-end align-items-baseline">
                                    {!! Form::submit('Crear', ['class'=>'btn btn-success']) !!}
                                <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>                        
                           {!! Form::close() !!}                       
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>  

    <div class="card">
        <div class="card-body">

            <table>
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <th scope="col">#Id</th>
                        <th scope="col">Nombre</th>
                        <th >Editar</th>
                        <th >Eliminar</th>
                    </thead>
    
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}" data-bs-whatever="@mdo"><i class="far fa-edit"></i></button>

                                </td>
                                
                                <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" aria-labelledby="edit{{$category->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Editar Categoria</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        {!! Form::model($category,['route'=>['admin.blog.category.update',$category],'autocomplete'=>'off','method'=>'put']) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'NOMBRE DE LA CATEGORIA',) !!}
                                                            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Categoria']) !!}           
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror    
                                                        </div>
                                                        <div class="d-flex justify-content-end align-items-baseline">
                                                                {!! Form::submit('Actualizar', ['class'=>'btn btn-success']) !!}
                                                            <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>                        
                                                    {!! Form::close() !!}                       
                                                    </div>
                                                </div>        
                                            </div>
                                        </div>
                                    </div>
                                </div>    

                                <td width="10px">
                                    <form class="destroy" action="{{route('admin.blog.category.destroy',$category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.destroy').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '¿Estas Seguro?',
        text: "que quieres eliminar la categoria!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'

        }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            // 'Eliminado!',
            // 'La red se ha eliminado con exito',
            // 'success'
            // )
            this.submit();
        }
    })
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <x-scrip-table-blog/>

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
@stop