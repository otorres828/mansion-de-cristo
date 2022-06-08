<div>
    <div class="container p-2 ">
        <input type="hidden" id="inicio " value="{{ $inicio }}">
        <input type="hidden" id="fin " value="{{ $fin }}">

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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginas as $pagina)
                        <tr>
                            <td><a href="{{ $pagina->url }}" class="text-dark">{{ $pagina->pagina }}</a></td>
                            <td>{{ $pagina->conteo_visitas }}</td>
                            <td>{{ $pagina->conteo_visitantes }}</td>
                            <td>
                                <a href="{{ route('admin.blog.estadisticas.mostrar', [$pagina->pagina,$inicio,$fin]) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-chart-area"></i>
                                </a>
                                <button wire:click="eliminar('{{ $pagina->pagina }}')"
                                    class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $paginas->links() }}
        </div>
    </div>
    {{-- MODAL
    <div class="modal fade" id="pagina{{ $pagina->url }}" tabindex="-1"
        aria-labelledby="pagina{{ $pagina->url }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Estadistica de Pagina</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <canvas id="myChart" width="800" height="400"></canvas>

            </div>
        </div>
    </div> --}}
    {{-- @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script>
            Livewire.on('mostrarEstadistica', categoriaId => {

                $(document).ready(function() {
                    $.ajax({
                        url: "{{ route('admin.blog.estadisticas.mostrar') }}",
                        dataType: "POST",
                        data: {
                            pagina: document.getElementById(`<?php echo $pagina->pagina; ?>`).value,
                            inicio: document.getElementById("inicio").value,
                            fin: document.getElementById("fin").value,
                        },

                    })
                })

                // const ctx = document.getElementById('myChart');
                // const cdata = JSON.parse(`<?php echo $data; ?>`)
                // const myChart = new Chart(ctx, {
                //     type: 'bar',
                //     data: {
                //         labels: cdata.label,
                //         datasets: [{
                //             label: 'Cantidad de Visitas',
                //             data: cdata.data,
                //             backgroundColor: [
                //                 'rgba(255, 99, 132, 0.2)',
                //                 'rgba(54, 162, 235, 0.2)',
                //                 'rgba(255, 206, 86, 0.2)',
                //                 'rgba(75, 192, 192, 0.2)',
                //                 'rgba(255, 159, 64, 0.2)'
                //             ],
                //             borderColor: [
                //                 'rgba(255, 99, 132, 1)',
                //                 'rgba(54, 162, 235, 1)',
                //                 'rgba(255, 206, 86, 1)',
                //                 'rgba(75, 192, 192, 1)',
                //                 'rgba(153, 102, 255, 1)',
                //                 'rgba(255, 159, 64, 1)'
                //             ],
                //             borderWidth: 1
                //         }]
                //     },
                //     options: {
                //         scales: {
                //             y: {
                //                 beginAtZero: true
                //             }
                //         }
                //     }
                // });

            })
        </script>
    {{-- @endpush --}}


</div>
