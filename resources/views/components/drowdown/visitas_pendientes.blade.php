@props(['visita'])
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal"
            data-target="#edit{{ $visita->id }}">Finalizar</a>
            <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal"
            data-target="#edit{{ $visita->id }}">Editar</a>
        <form class="destroy" action="{{ route('visitas_pendientes.destroy', $visita) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="dropdown-item text-danger">Eliminar</button>
        </form>
    </div>
</div>
