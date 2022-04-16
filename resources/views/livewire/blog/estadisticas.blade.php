<div>
    <?php
    [$inicio, $fin] = fechaInicioYFinDeMes();
    if (isset($_GET['inicio'])) {
        $inicio = $_GET['inicio'];
    }
    if (isset($_GET['fin'])) {
        $fin = $_GET['fin'];
    }
    if (isset($_GET['hoy'])) {
        $hoy = $_GET['hoy'];
    }
    $visitasYVisitantes = obtenerConteoVisitasYVisitantesEnRango($hoy, $hoy);
    $visitantes = obtenerVisitantesEnRango($inicio, $fin);
    $visitas = obtenerVisitasEnRango($inicio, $fin);
    ?>

    <section class="section">
        <header class="card text-center">
            <div class="card-header-title px-4 ">
                Estadísticas de {{ $hoy }}
                </p>
        </header>
        <div class="mb-2">
            <input type="hidden" name="inicio" value="{{ $inicio }}">
            <input type="hidden" name="fin" value="{{ $fin }}">
            <div class="field is-grouped w-full">
                <p class="control is-expanded">
                    <label>Fecha: </label>
                    <input class="input" wire:model="hoy" type="date" name="hoy" value="{{ $hoy }}">
                </p>
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
        <div class="table-responsive py-4">
            <table id="example">
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
                            <td ><a href="{{ $pagina->url }}" class="text-dark">{{ $pagina->pagina }}</a></td>
                            <td>{{ $pagina->conteo_visitas }}</td>
                            <td>{{ $pagina->conteo_visitantes }}</td>
                            <td>
                                <a class="btn btn-info " href="visitas_url.php?url={{ $pagina->url}}">
                                    <i class="fa fa-chart-area"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
