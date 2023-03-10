@extends('adminlte::page')

@section('title', 'Secretaria')

@section('content_header')
    <h1>PANEL DE SECRETARIA</h1>
@stop

@section('content')
    <div class="div">
        <div class="container-fluid">
            {{-- INDICADORES DE TARJETAS --}}
            <div class="row" id="tarjetas">
                {{--  CELULAS OFICIALES --}}
                <div class="col-lg-4 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $celulas_oficiales }}</h3>
                            <p>Celulas Oficiales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- DISCIPULOS --}}
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $discipulos_totales }}<sup style="font-size: 20px"></sup></h3>
                            <p>Equipo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- CELULAS EVANGELISTICAS --}}
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $celulas_evangelisticas }}<sup style="font-size: 20px"></sup></h3>
                            <p>Celulas Evangelisticas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.secretary.equipo.index') }}" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Celulas Evangelisticas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas informacion <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> --}}
            </div>

            <div class="row" id="wrapper">
                {{-- REDES --}}
                <div class="col-lg-7 connectedSortable ui-sortable" id="col1">
                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                REDES
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table class="table table-flush" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-sm">Nombre</th>
                                                <th scope="col">Celulas Oficiales</th>
                                                <th scope="col">Celulas Evangelisticas</th>
                                                <th scope="col">Miembros</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\Models\Red::all() as $red)
                                                <tr>
                                                    <td>{{ $red->name }}</td>
                                                    <td>{{ $red->celulasOficiales }}</td>
                                                    <td>{{ $red->celulasEvangelisticas }}</td>
                                                    <td>{{ $red->miembros() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 connectedSortable ui-sortable" id="col2">
                    <div class="card bg-gradient-info">
                      @livewire('panel.todolist')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <x-scrip-table-blog />
@stop
