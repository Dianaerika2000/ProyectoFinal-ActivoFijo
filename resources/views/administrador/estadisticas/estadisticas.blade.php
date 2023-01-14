@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Estadisticas</h1>
@stop

@section('content')
    {{-- {{$grupos}} --}}
    {{-- {{dd($label)}} --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Inmuebles
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        Revaluos
                    </div>
                    <div class="card-body">
                        <canvas id="estadisticasInmuebles"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    {{-- Estadisticas en barras --}}
    <script>
        const grupos = JSON.parse('{!! json_encode($label) !!}');
        const valores = JSON.parse('{!! json_encode($data) !!}');
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: grupos,
                datasets: [{
                    label: '# of Votes',
                    data: valores,
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

    {{-- Estadisticas en torta --}}
    <script>
        const donut = document.getElementById('estadisticasInmuebles');
        const data = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        new Chart(donut, {
            type: 'doughnut',
            data: data
        });
    </script>
    
@stop
