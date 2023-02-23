{{-- EDITAR --}}
<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="edit{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Registro</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>            </div>
            <div class="modal-body">
                <form action="{{ route('admin.secretary.user.update', $user) }}" method="post" autocomplete="off">
                    @csrf
                    @method('put')
                    @include('admin.partiels.team')
                </form>
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
                <button type="button" class="close" data-bs-dismiss="modal">
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
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Debe de Seleccionar un reemplazo y añadir su clave para confirmar</h5>
                <form action="{{ route('eliminar.usuario') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_usuario_eliminar"value="{{ $user->id }}">
                    <div class="form-group mb-3">
                        <label class="mb-2">Seleccione el reemplazo</label>
                        <select name="parent_id" class="form-control select2 mb-3">
                            <option class="form-control"value="{{ auth()->user()->id }}">
                                {{ auth()->user()->name }} - {{ $user->jerarquia->name }}
                            </option>
                            @foreach ($users as $item)
                                @if ($item->jerarquia->nivel <= $user->jerarquia->nivel && $item->id != $user->id)
                                    <option class="form-control"value="{{ $item->id }}">
                                        {{ $item->name }} - {{ $item->jerarquia->name }}
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
{{-- CAMBIAR COBERTURA --}}
<div class="modal fade" id="cambiar{{ $user->id }}" tabindex="-1" aria-labelledby="edit{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cambiar Cobertura</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Debe de Seleccionar un reemplazo y añadir su clave para confirmar</h5>
                <form action="{{ route('cambiar.cobertura') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_usuario_eliminar"value="{{ $user->id }}">
                    <div class="form-group mb-3">
                        <label class="mb-2">Seleccione el reemplazo</label>
                        <select name="parent_id" class="form-control select2 mb-3">
                            <option class="form-control"value="{{ auth()->user()->id }}">
                                {{ auth()->user()->name }} - {{ auth()->user()->jerarquia->name }}
                            </option>
                            @foreach ($users as $item)
                                @if ($item->jerarquia->nivel <= $user->jerarquia->nivel && $item->id != $user->id)
                                    <option class="form-control"value="{{ $item->id }}">
                                        {{ $item->name }} - {{ $item->jerarquia->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Introduzca su clave</label>
                        <input name="password" class="form-control" type="password" placeholder="****" required>
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