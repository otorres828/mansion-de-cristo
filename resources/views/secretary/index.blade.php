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

                    {{-- 
                    <!-- TO DO List -->
                    @livewire('panel.todolist') --}}
                </div>

                <div class="col-lg-5 connectedSortable ui-sortable" id="col2">
                    <div class="card bg-gradient-info">
                        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                                <i class="fas fa-th mr-1"></i>
                                Sales Graph
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="chart chartjs-render-monitor" id="line-chart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 488px;"
                                width="976" height="500"></canvas>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                            height="60"></canvas><input type="text" class="knob"
                                            data-readonly="true" value="20" data-width="60" data-height="60"
                                            data-fgcolor="#39CCCC" readonly="readonly"
                                            style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                    </div>

                                    <div class="text-white">Mail-Orders</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                            height="60"></canvas><input type="text" class="knob"
                                            data-readonly="true" value="50" data-width="60" data-height="60"
                                            data-fgcolor="#39CCCC" readonly="readonly"
                                            style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                    </div>

                                    <div class="text-white">Online</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                            height="60"></canvas><input type="text" class="knob"
                                            data-readonly="true" value="30" data-width="60" data-height="60"
                                            data-fgcolor="#39CCCC" readonly="readonly"
                                            style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                    </div>

                                    <div class="text-white">In-Store</div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-footer -->
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
