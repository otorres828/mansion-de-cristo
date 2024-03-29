@props(['celula'])
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" style="cursor: pointer;" data-toggle="modal"
            data-target="#edit{{ $celula->id }}">Editar</a>
        <form class="destroy" action="{{ route('celulas_evangelisticas.destroy', $celula) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="dropdown-item text-danger">Eliminar</button>

        </form>
        <a class="dropdown-item text-success" href="{{route('celulas_evangelisticas.visitas',$celula->id)}}" style="cursor: pointer;">Ver Visitas</a>
        <a class="dropdown-item text-success" style="cursor: pointer;" data-toggle="modal"
        data-target="#convertir{{ $celula->id }}">Convertir</a>    </div>
</div>
