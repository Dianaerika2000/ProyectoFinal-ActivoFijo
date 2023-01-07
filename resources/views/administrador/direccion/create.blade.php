@extends('administrador.layouts.template')
@section('header')
Registrar Nueva Dirección
@endsection
@section('content')
    <!-- Google Font
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>
    -->
    <style>
        #map-canvas {
            width: 500px;
            max-width: 100%;
            height: 370px;
            max-height: 100vh;
        }
    </style>

    <div class="container">

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Dirección</h1>
                            </div>
                            @if ($errors->any())
                            {{-- en caso de no eingresar las credenciales de acceso del administrador(muestra un error) --}}
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('admin.direccion.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-sm-11 col-xs-12">
                                        <div class="form-group">
                                            <div id="map-canvas" name="map"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-sm-11 col-xs-12">
                                        <div class="form-group">
                                            <label for="ubicacion">Ubicación: </label>
                                            <input class="col-md-12" value="{{old('ubicacion')}}" type="text"
                                                   name="ubicacion" id="searchmap" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="lat">Latitud: </label>
                                            <input value="{{old('lat')}}" type="text"
                                                   class="form-control input-sm"
                                                   name="lat" id="lat">
                                        </div>
                                        <div class="form-group">
                                            <label for="lng">Longitud: </label>
                                            <input value="{{old('lng')}}" type="text"
                                                   class="form-control input-sm"
                                                   name="lng" id="lng">
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion">Descripción: </label>
                                            <input value="{{old('descripcion')}}" type="textarea"
                                                   class="form-control input-sm"
                                                   name="descripcion" id="descripcion">
                                        </div>

                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Agregar">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: -17.789083749160955,
                lng: -63.14878138357545
            },
            zoom: 17
        });

        var marker = new google.maps.Marker({
            position: {
                lat: -17.789083749160955,
                lng: -63.14878138357545
            },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
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
        google.maps.event.addListener(marker, 'position_changed', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    </script>
@endsection
