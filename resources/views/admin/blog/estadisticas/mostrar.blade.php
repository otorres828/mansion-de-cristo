@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1>Estadistica de: <span class="text-bold font-extralight">{{ $pagina }}</span></h1>
@stop

@section('content')

    <div class="grid grid-cols-2 m-3">
        <div class="col-span-2">
            <canvas id="myChart" width="800" height="400"></canvas>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const cdata = JSON.parse(`<?php echo $data; ?>`)
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cdata.label,
                datasets: [{
                    label: 'Cantidad de Visitas',
                    data: cdata.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
