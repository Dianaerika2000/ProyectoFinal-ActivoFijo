@extends('usuario.layouts.template')
@section('content')
<div style="">
    <div class="row">
        <div class="col-6">
            <div class="container2" id="container2"></div>
        </div>
    </div>
    <div class="container">
        <p class="ocultar">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptate debitis vitae officia nisi fugit iure eius nostrum 
            assumenda amet qui. Dolores eligendi, vel repudiandae eos ipsum ex 
            quos animi commodi.</p>
            <p class="ocultar">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Voluptate debitis vitae officia nisi fugit iure eius nostrum 
                assumenda amet qui. Dolores eligendi, vel repudiandae eos ipsum ex 
                quos animi commodi.</p>
                <p class="ocultar">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Voluptate debitis vitae officia nisi fugit iure eius nostrum 
                    assumenda amet qui. Dolores eligendi, vel repudiandae eos ipsum ex 
                    quos animi commodi.</p>
                    <p class="ocultar">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Voluptate debitis vitae officia nisi fugit iure eius nostrum 
                        assumenda amet qui. Dolores eligendi, vel repudiandae eos ipsum ex 
                        quos animi commodi.</p>
    </div>
</div>
   
    {{-- <img src="{{ asset('UsuarioTemplate/img/fondo.jpg') }}" alt="no hay foto"> --}}

    <div class="row"></div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_menu->count }}</span>
            </div>
        </div>
    </footer>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
         Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Detalles de los activos fijos en los inmuebles'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: 'bs'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:.1f}'
                }
            }
        },
        series: [{
            name: 'detallecosto',
            colorByPoint: true,
            data: <?= $costo_formulita?> //referenciamos el modelo traido desde el contralador
        }]
    });
    </script>
@endsection
