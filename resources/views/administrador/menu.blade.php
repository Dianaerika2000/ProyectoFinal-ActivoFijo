{{-- @extends('administrador.layouts.template') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <style>
        #map-canvas {
            width: 850px;
            max-width: 100%;
            height: 670px;
            max-height: 100vh;
        }
    </style>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('inventario/images/favicon.png') }}">

    <div class="container-fluid body" style="text-align: center;padding-bottom:20px">
        <!-- formulario de busqueda -->
        <div class="search-bar">
            {{-- <div class="search-icon">
                <i class="material-icons">search</i>
            </div> --}}
            <form action="#" method='GET'>
                <input type="text" name="busqueda" placeholder="Ingrese su palabra a buscar..." class="input">
                <button type="button" class="btn btn-primary button" data-toggle="modal"
                    data-target="#exampleModalCenter">buscar</button>
                {{-- <div class="close-search">
                    <i class="material-icons">close</i>
                </div> --}}
            </form>
            @php
                global $ruta;
                $ruta = 'hola';
            @endphp
            <hr class="sidebar-divider d-none d-md-block">
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Buscador Global</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" class="div" id="div">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ $ruta }}</th>
                                        <th>Descripción</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td class="text" id="text"></td>
                                        <td>
                                            <a href="" class="link" id="link">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-8 col-sm-11 col-xs-12">
                <div class="form-group">
                    <div id="map-canvas" name="map"></div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-sm-11 col-xs-12">
                <div class="form-group">
                    <label for="ubicacion" id="label1" class="form-label">Código del inmueble: </label>
                    <input class="col-md-12 col-sm-12 " value="{{ old('ubicacion') }}" type="text" name="ubicacion" class="form-control"
                        id="searchmap">
                </div>

                <div class="form-group">
                    <label for="ubicacion" id="label1">Tipo del inmueble: </label>
                    <div class="col-md-12 col-sm-12 ">
                        <select name="idGrupo" class="form-control" id="idGrupo">
                            <option value="">Seleccione un grupo</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
            <div class="accordion__item">
                <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse"
                    data-target="#header-bg_collapseOne" aria-expanded="false">
                    <span class="accordion__header--icon"></span>
                    {{-- <span class="accordion__header--text">Usuario: {{ Auth::user()->rol->r_tip }}</span> --}}
                    <span class="accordion__header--indicator"></span>
                </div>
                <div id="header-bg_collapseOne" class="accordion__body collapse" data-parent="#accordion-seven"
                    style="">
                    <div class="accordion__body--text">
                        {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                    </div>
                </div>
            </div>
        </div>
        {{-- default tab de lsitar usuarios --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Listas</h4> --}}
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home">Listar usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile">Listar los roles de acceso</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="home" role="tabpanel">
                                <div class="pt-4">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr class="table-primary">
                                                    <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                                                    {{--
                                                    @if ($usuario->rol->r_tip == 'administrador')
                                                        <td><span
                                                                class="badge badge-success">{{ $usuario->rol->r_tip }}</span>
                                                        </td>
                                                    @else
                                                        <td><span
                                                                class="badge badge-warning">{{ $usuario->rol->r_tip }}</span>
                                                        </td>
                                                    @endif
                                                    --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="pt-4">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr class="table-primary">
                                                    <td>{{ $usuario->email }}</td>
                                                    {{-- @if ($usuario->rol->r_tip == 'administrador') --}}
                                                    <td><span class="badge badge-success">{{ $usuario->password }}</span>
                                                    </td>
                                                    {{-- @else
                                                        <td><span
                                                                class="badge badge-warning">{{ $usuario->password }}</span>
                                                        </td>
                                                    @endif
                                                    --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- en default tab --}}
        <hr>
        <div class="container" style="background-color: rgb(120,54,23,0.1);text-align:center;padding-left:300px">

            <div class="col-6">
                <div class="container3" id="container3"></div>
            </div>

        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
    </div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_menu->count }}</span>
            </div>
        </div>
    </footer>
@endsection

@section('js')
    {{-- cdn google maps --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places"
        type="text/javascript"></script>
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: -17.7762548,
                lng: -63.1950715
            },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: {
                lat: -17.7762548,
                lng: -63.1950715
            },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(17);
        });
        google.maps.event.addListener(marker, 'position_changed', function() {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
@stop
