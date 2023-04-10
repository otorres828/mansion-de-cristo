@props(['anuncio','anuncio_id'])
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item " data-turbolinks="false"
            href="{{ route('blog.show_announces', $anuncio) }}">Ver</a>
        <a class="dropdown-item"
            href="{{ route('admin.blog.announce.edit', $anuncio_id) }}">Editar</a>
        @can('eliminarpublicaciones')
            <form class="destroy"
                action="{{ route('admin.blog.announce.destroy', $anuncio_id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="dropdown-item">Eliminar</button>
            </form>
        @endcan

    </div>
</div>