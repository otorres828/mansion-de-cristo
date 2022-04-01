@extends('adminlte::page')

@section('title', 'Lista de Anuncios')

@section('content_header')
    <h1>Lista de Anuncios</h1>
@stop


@section('content')
    <x-aminblog.alert/>
    <div class="mb-3">
        <a class="btn btn-primary " href="{{route('admin.blog.announce.create')}}">Crear Anuncio</a>
    </div>
    <div >
        <div class=" p-3">
			<div class="table-responsive py-4">
				<table class="table table-flush" id="example">
					<thead>
						<tr>
							<th scope="col" class="text-center">#id</th>
							<th scope="col" class="text-sm">Titulo del Anuncio</th>
                            @can('topost')
                                <th scope="col">Autor</th>
                            @endcan
                            <th scope="col" class="text-right">Estado</th>
							<th scope="col" class="text-center">Acciones</th>

						</tr>
					</thead>
					<tbody>
						@foreach ($anuncios as $anuncio)
						<tr>    
							<td class="text-center">{{$anuncio->id}}</td>
							<td >{{$anuncio->name}}</td>
                            @can('topost')
                                <td>{{$anuncio->user->name}}</td>                                
                            @endcan
							<td class="text-center">@if ($anuncio->status==1) <button class="btn btn-danger">X</button> @else <button class="btn btn-success"><i class="far fa-check-circle"></i></button> @endif</td>
							<td class="d-flex">
                                <a class=" btn btn-secondary text-center mr-1"data-turbolinks="false" href="{{route('blog.show_announces',$anuncio->slug)}}"><i class="fas fa-eye"></i></a>
								<a class="btn btn-primary mr-1" href="{{route('admin.blog.announce.edit',$anuncio)}}"><i class="far fa-edit"></i></a>				
								<form class="destroy mr-1"action="{{route('admin.blog.announce.destroy',$anuncio)}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>                           
						@endforeach
					</tbody>
            	</table>
			</div>
        </div>
    </div>
    
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            text: "que quieres eliminar el anuncio!",
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
    <x-scrip-table-blog/>


@stop