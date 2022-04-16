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
    $paginas = obtenerPaginasVisitadasEnFecha($hoy);
    $visitantes = obtenerVisitantesEnRango($inicio, $fin);
    $visitas = obtenerVisitasEnRango($inicio, $fin);
    ?>

    <section class="section">
        <header class="card text-center">
            <div class="card-header-title px-4 ">
                Estadísticas de {{ $hoy }}
                </p>
        </header>
        <form action="{{ route('admin.blog.estadisticas') }}" class="mb-2">
            <input type="hidden" name="inicio" value="{{ $inicio }}">
            <input type="hidden" name="fin" value="{{ $fin }}">
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <label>Fecha: </label>
                    <input class="input" wire:model="hoy" type="date" name="hoy" value="{{ $hoy }}">
                </p>
                <p class="control">
                    <!--La etiqueta es invisible a propósito para que tome el espacio y alinee el botón-->
                    <label style="color: white;">ª</label>
                    <input type="submit" value="OK" class="button is-success input">
                </p>
            </div>
        </form>
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

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Estadísticas entre {{ $inicio }} y {{ $fin }}
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form action="{{ route('admin.blog.estadisticas') }}">
                        <input type="hidden" name="hoy" value="{{ $hoy }}">
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <label>Desde: </label>
                                <input class="input" type="date" name="inicio" value="{{ $inicio }}">
                            </p>
                            <p class="control is-expanded">
                                <label>Hasta: </label>
                                <input class="input" type="date" name="fin" value="{{ $fin }}">
                            </p>
                            <p class="control">
                                <!--La etiqueta es invisible a propósito para que tome el espacio y alinee el botón-->
                                <label style="color: white;">ª</label>
                                <input type="submit" value="OK" class="button is-success input">
                            </p>
                        </div>
                    </form>
                    <canvas id="grafica"></canvas>
                </div>
            </div>
            <footer class="card-footer">
                <small class="mx-2 my-2">Por Oliver Torres</small>
            </footer>
        </div>

    </section>

</div>
