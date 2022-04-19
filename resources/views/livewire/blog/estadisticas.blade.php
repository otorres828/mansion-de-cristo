<div>
    <div class="container p-2 ">
        <div class="form-group mt-4">
            <header class="form-control">
                <div class="text-bold">
                    @if ($inicio == $fin)
                        Estadísticas de {{ $inicio }}
                    @else
                        Estadísticas de {{ $inicio }} hasta {{ $fin }}
                    @endif
                </div>
            </header>
        </div>
        {{-- RANGO DE FECHAS --}}
        <div class="form-group">
            <div>
                <div class="row align-items-start">
                    <div class="col">
                        <label>Desde: </label>
                        <input class="input form-control" wire:model="inicio" type="date" name="hoy"
                            value="{{ $inicio }}">
                    </div>
                    <div class="col">
                        <label>Hasta: </label>
                        <input class="input form-control" wire:model="fin" type="date" name="hoy"
                            value="{{ $fin }}">
                    </div>
                </div>
            </div>
        </div>
        {{-- tarjetas --}}
        <div class="row pl-3 pb-2">
            <div class="row mr-3 ">
                <span class="bg-primary p-2 rounded-left">Visitas</span>
                <span class="bg-warning p-2 rounded-right">{{ $visitasYVisitantes->visitas }} </span>
            </div>
            <div class="row ">
                <span class="bg-success p-2 rounded-left">Visitantes</span>
                <span class="bg-warning p-2 rounded-right"> {{ $visitasYVisitantes->visitantes }}</span>
            </div>
        </div>

        {{-- BUSCADOR --}}
        <div class="pt-2 sm:px-6 lg:px-8">
            <input wire:model="buscar"
                class="mt-10 shadow appearance-none border rounded py-2 form-control text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" placeholder="ESCRIBE EL NOMBRE DE LA PAGINA QUE BUSCAS">
        </div>

        {{-- TABLA --}}
        <div class="table-responsive py-4">
            <table class="table">
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
                                <a href="{{ route('admin.blog.estadisticas.mostrar', $pagina->pagina) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-chart-area"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $paginas->links() }}
        </div>
    </div>
</div>
