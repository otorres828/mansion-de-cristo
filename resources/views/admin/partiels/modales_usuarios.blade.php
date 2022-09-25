{{-- EDITAR --}}
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="edit{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Acceso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.secretary.user.update', $user) }}" method="post"
                            autocomplete="off">
                            @csrf
                            @method('put')
                            @include('admin.partiels.team')
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- BLOQUEAR USUARIO --}}
<div class="modal fade" id="bloquear{{ $user->id }}" tabindex="-1" aria-labelledby="bloquear{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Acceso de Usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @livewire('admin.banned', ['user' => $user])
            </div>
        </div>
    </div>
</div>
{{-- ELIMINAR --}}
<div class="modal fade" id="eliminar{{ $user->id }}" tabindex="-1" aria-labelledby="edit{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Debe de Seleccionar un reemplazo y añadir su clave para confirmar</h5>
                <form action="{{ route('eliminar.usuario') }}" method="post">
                    @csrf
                    <input type="hidden" id="id_usuario_eliminar"value="{{ $user->id }}">
                    <div class="form-group mb-3">
                        <label class="mb-2">Seleccione el reemplazo</label>
                        <select name="parent_id" class="form-control select2 mb-3">
                            <option class="form-control"value="{{ auth()->user()->id }}">
                                {{ auth()->user()->name }} - {{ $user->hierarchy->name }}
                            </option>
                            @foreach ($users as $item)
                                @if ($item->hierarchy->nivel <= $user->hierarchy->nivel && $item->id != $user->id)
                                    <option class="form-control"value="{{ $item->id }}">
                                        {{ $item->name }} - {{ $item->hierarchy->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Introduzca su clave</label>
                        <input name="password" class="form-control" type="password" placeholder="************" required>
                    </div>
                    <center class="form-group">
                        <button class="w-full btn btn-primary">Confirmar</button>
                        <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>

                    </center>
                </form>

            </div>
        </div>
    </div>
</div>
