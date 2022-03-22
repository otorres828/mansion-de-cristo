@extends('adminlte::page')

@section('title', 'Jerarquias')

@section('content_header')
    <h1>Listado de Jerarquias</h1>
@stop

@section('content')
    <x-alert/>

    <div class="mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Agregar Jerarquia</button>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crea una nueva jerarquia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                                {!! Form::open(['route'=>'admin.secretary.hierarchy.store','autocomplete'=>'off']) !!}
                                    <div class="form-group">
                                        {!! Form::hidden('temple_id', auth()->user()->temple_id) !!} 
                                        {!! Form::label('name', 'NOMBRE DE LA JERARQUIA',) !!}
                                        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Jerarquia']) !!}           
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nivel', 'Nivel',) !!}
                                        <input type="number"  name="nivel" class="form-control">
                                        @error('number')
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
            <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <th scope="col">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nivel</th>
                        <th >Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($hierarchies as $hierarchy)
                            <tr>
                                <td>{{$hierarchy->id}}</td>
                                <td>{{$hierarchy->name}}</td>
                                <td>{{$hierarchy->nivel}}</td>
                                <td class="d-flex" >
                                    <a class="btn btn-primary mr-1"data-bs-toggle="modal" data-bs-target="#edit{{$hierarchy->id}}" data-bs-whatever="@mdo"><i class="far fa-edit"></i></a>
                                    <form class="destroy" action="{{route('admin.secretary.hierarchy.destroy',$hierarchy)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>     
                            </tr>
                            <div class="modal fade" id="edit{{$hierarchy->id}}" tabindex="-1" aria-labelledby="edit{{$hierarchy->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Actualizar Jerarquia</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    {!! Form::model($hierarchy,['route'=>['admin.secretary.hierarchy.update',$hierarchy],'autocomplete'=>'off','method'=>'put']) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'NOMBRE DE LA JERARQUIA',) !!}
                                                            {!! Form::text('name', $hierarchy->name, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Jerarquia']) !!}           
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror    
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            {!! Form::label('nivel', 'Nivel',) !!}
                                                            <input type="number"  name="nivel" class="form-control" value="{{$hierarchy->nivel}}">
                                                            @error('number')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="d-flex justify-content-end align-items-baseline">
                                                            {!! Form::submit('Actualizar', ['class'=>'btn btn-success']) !!}
                                                            <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
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
            text: "que quieres eliminar esta jerarquia!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'

            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Eliminado!',
                'La red se ha eliminado con exito',
                'success'
                )
                this.submit();
            }
        })
        });
    </script>
    <x-scrip-table-blog/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@stop