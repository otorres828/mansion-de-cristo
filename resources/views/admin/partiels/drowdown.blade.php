<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" data-bs-toggle="modal"href="#"
            data-bs-target="#edit{{ $user->id }}" data-bs-whatever="@mdo">Editar
            Registro</a>
        <a class="dropdown-item" data-bs-toggle="modal" href="#"
            data-bs-target="#bloquear{{ $user->id }}" data-bs-whatever="@mdo">Editar
            Acceso</a>
        <a class="dropdown-item" href="{{ route('user.team', $user) }}">Ver Equipo</a>
        <a class="dropdown-item" href="#">Ver Crecimiento</a>
        <a class="dropdown-item" href="{{ route('celula_miembro',$user->id) }}">Ver Celulas</a>
        <a class="dropdown-item" href="#">Ver Detalles</a>
        
        <a class="dropdown-item" data-bs-toggle="modal"href="#"
        data-bs-target="#eliminar{{ $user->id }}" data-bs-whatever="@mdo">Eliminar
        Registro</a>
    </div>
</div>