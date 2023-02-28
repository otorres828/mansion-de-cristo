<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <button class="dropdown-item cursor-pointer" 
            data-toggle="modal" data-target="#editar{{ $category->id }}"
            >Editar
        </button>

        @can('eliminarpublicaciones')
            <form class="destroy" action="{{ route('admin.blog.category.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="dropdown-item">Eliminar</button>
            </form>
        @endcan
    </div>
</div>