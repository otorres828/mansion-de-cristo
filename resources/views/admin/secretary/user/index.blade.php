@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Miembros</h1>
@stop

@section('content')
    <x-alert/>

    <div class="mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Registrar Usuario</a>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                        {!! Form::open(['route'=>'admin.secretary.user.store','autocomplete'=>'off','method'=>'post']) !!}
                            @include('admin.partiels.user')
                            
                        {!! Form::close() !!}   
                        </div>
                 
                    </div>        
                </div>
            </div>
        </div>
    </div>  
      
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Jerarquia</th>
                        <th scope="col">Cobertura</th>
                        <th scope="col">Red</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">
                            <form action="{{route('user.team',$user)}}" method="post">
                                @csrf
                                <button type="submit" >{{$user->id}}</button>
                            </form>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->hierarchy->name}}</td>
                        <td>{{$user->parent->name}}</td>
                        <td>{{$user->group->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}" data-bs-whatever="@mdo"><i class="far fa-edit"></i></a>
                        </td>

                        <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-labelledby="edit{{$user->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                {!! Form::model($user,['route'=>['admin.secretary.user.update',$user],'autocomplete'=>'off','method'=>'put']) !!}
                                                    @include('admin.partiels.user')
                                                {!! Form::close() !!}   
                                            </div>
                                     
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </tr>                           
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <x-scrip-table-blog/>
@stop