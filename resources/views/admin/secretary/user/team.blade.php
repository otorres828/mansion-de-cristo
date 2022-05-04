@extends('adminlte::page')

@section('title', 'Equipo')

@section('content_header')
    <h1>Padre/Red: {{$us->name}}  </h1>
@stop

@section('content')
    <x-aminblog.alert/>
   
    <div class="card">
        <div class="card-body">
            <table class="table table-striped " id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Jerarquia</th>
                        <th scope="col">Cobertura</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @isset ($user->parent_id)
                    <tr>

                        <td class="text-center">                            
                            <form action="{{route('user.team',$user->id)}}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" style="text-decoration:none">{{$user->id}}</button>
                            </form>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->hierarchy->name}}</td>
                        <td>{{$user->parent->name}}</td>
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
                    @endisset
                       
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