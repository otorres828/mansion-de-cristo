<div>
    <section class="section">
        <header class="card text-center">
            <div class="card-header-title px-4 ">
                @if ($inicio==$fin)
                    Estadísticas de  {{ $inicio }}
                @else
                    Estadísticas de {{ $inicio }} hasta {{ $fin }}
                @endif
            </div>
        </header>

        {{-- RANGO DE FECHAS --}}
        <div class="mb-2">
            <div class="row align-items-start">
                <div class="col">
                    <label>Desde: </label>
                    <input class="input" wire:model="inicio" type="date" name="hoy" value="{{ $inicio }}">
                </div>
                <div class="col">
                    <label>Hasta: </label>
                    <input class="input" wire:model="fin" type="date" name="hoy" value="{{ $fin }}">
                </div>
            </div>
        </div>
        
        <div class="field is-grouped is-grouped-multiline">
            
            <div class="control">
                <div class="tags has-addons">
                    <span class="tag is-success is-large">Visitas</span>
                    <span class="tag is-info is-large">{{ $visitasYVisitantes->visitas }} </span>
                </div>
            </div>
            <div class="control">
                <div class="tags has-addons">
                    <span class="tag is-warning is-large">Visitantes</span>
                    <span class="tag is-info is-large">
                        {{ $visitasYVisitantes->visitantes }}</span>
                </div>
            </div>
        </div>

        {{-- BUSCADOR --}}
        <div class="mx-auto sm:px-6 lg:px-8">
            <input wire:model="buscar"
            class="mt-10 shadow appearance-none border rounded py-2 form-control text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" placeholder="ESCRIBE EL NOMBRE DE LA PAGINA QUE BUSCAS">
        </div>

        {{-- TABLA --}}
        <div class="table-responsive py-4">
            <table >
                <thead>
                    <tr>
                        <th>Página</th>
                        <th>Visitas</th>
                        <th>Visitantes</th>
                        <th>Estadísticas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginas as $pagina)
                        <tr>
                            <td><a href="{{ $pagina->url }}" class="text-dark">{{ $pagina->pagina }}</a></td>
                            <td>{{ $pagina->conteo_visitas }}</td>
                            <td>{{ $pagina->conteo_visitantes }}</td>
                            <td>
                                <a class="btn btn-info " href="visitas_url.php?url={{ $pagina->url }}">
                                    <i class="fa fa-chart-area"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $paginas->links() }}
        </div>
    </section>
</div>
