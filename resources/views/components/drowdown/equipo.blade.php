<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if (count($user->descendants) > 0)
            <a class="dropdown-item" href="{{ route('user.team', $user) }}">Ver Equipo</a>
        @endif
        <a class="dropdown-item" href="{{ route('crecimiento_usuario', $user->id) }}">Ver Crecimiento</a>
        <a class="dropdown-item" href="{{ route('celula_miembro', $user->id) }}">Ver Celulas</a>
        <a class="dropdown-item border-bottom" style="cursor: pointer;">Ver Detalles</a>
        <a class="dropdown-item" data-bs-toggle="modal" style="cursor: pointer;"
            data-bs-target="#edit{{ $user->id }}" data-bs-whatever="@mdo">Editar
            Registro</a>
        <a class="dropdown-item" data-bs-toggle="modal" style="cursor: pointer;"
            data-bs-target="#bloquear{{ $user->id }}" data-bs-whatever="@mdo">Editar
            Acceso</a>
        {{--           
        <a class="dropdown-item" data-bs-toggle="modal" style="cursor: pointer;"
        data-bs-target="#cambiar{{ $user->id }}" data-bs-whatever="@mdo">Cambiar Cobertura</a> --}}
        <a class="dropdown-item" data-bs-toggle="modal" style="cursor: pointer;"
            data-bs-target="#eliminar{{ $user->id }}" data-bs-whatever="@mdo">Eliminar
            Registro</a>
    </div>
</div>
