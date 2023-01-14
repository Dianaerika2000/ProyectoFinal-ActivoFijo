@extends('adminlte::page')

@section('title', 'Inmueble')

@section('content')
    <?php
    $latitud="";
    $longitud="";
    $codigoInmueble=""
    ?>
    <style>
        #map-canvas {
            width: 500px;
            max-width: 100%;
            height: 370px;
            max-height: 100vh;
        }
    </style>
    <div class="container pt-5">

        <div class="card o-hnameden border-0 shadow-lg">
            <div class="card-header py-3">
                <h4 class="m-0">Editar Inmueble</h4>
            </div>
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                        <div class="p-5">
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
                            <form class="user" action="{{ route('admin.inmueble.update',$inmueble->id) }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idGrupo">Grupo
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idGrupo" class="form-control" id="idGrupo" disabled>
                                            <option value="">Seleccione un grupo</option>
                                            @foreach ($grupos as $grupo )
                                                <option value="{{ $grupo->id }}"
                                                        {{old('idGrupo',$grupo->id)== $inmueble->idGrupo ? 'selected':''}}
                                                >{{ $grupo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="codigo">Código
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="codigo" name="codigo" required="required" value = {{$inmueble->codigo}} class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="descripcionGlosa">Descripción
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="descripcionGlosa" name="descripcionGlosa"  value = {{$inmueble->descripcionGlosa}} class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaAdquisicion">Fecha de Adquisición
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaAdquisicion" name="fechaAdquisicion" value = {{$inmueble->fechaAdquisicion}}
                                               required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="monto">Monto (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="monto" value = {{$inmueble->monto}} name="monto" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idResponsable">Responsable
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idResponsable" class="form-control" id="idResponsable" required>
                                            <option value="">Seleccione responsable</option>
                                            @foreach($responsables as $responsable)
                                                <option value="{{$responsable->id}}"
                                                        {{old('idResponsable',$responsable->id)== $inmueble->idResponsable ? 'selected':''}}
                                                >{{$responsable->nombre}} {{$responsable->Apellido}} - {{$responsable->codigoAsignado}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idEstado">Estado
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idEstado" class="form-control" id="idEstado" required>
                                            <option value="">Seleccione estado</option>
                                            @foreach ($estados as $estado )
                                                <option value="{{ $estado->id }}"
                                                        {{old('idEstado',$estado->id)== $inmueble->idEstado ? 'selected':''}}
                                                >{{ $estado->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idDireccion">Dirección
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idDireccion" class="form-control" id="idDireccion" required>
                                            <option value="">Seleccione una dirección</option>
                                            @foreach ($direcciones as $direccion )
                                                <option value="{{ $direccion->id }}"
                                                        {{old('idDireccion',$direccion->id)== $inmueble->idDireccion ? 'selected':''}}
                                                >{{ $direccion->ubicacion }}</option>
                                                {{--<input type="text" id="latitud" name="latitud" class="form-control" value="{{$direccion->latitud}}">--}}
                                                <?php $latitud=$direccion->latitud;
                                                $longitud=$direccion->longitud;?>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a type="button" class="btn btn-secondary"
                                        href="{{ route('admin.inmueble') }}">Cancelar</a>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(function () {
            $('#idInmueble').hide();
            $('#idGrupo').change(function () {
                if($('#idGrupo').val()!=2){
                    $('#idInmueble').show();
                }else{
                    $('#idInmueble').hide();
                }
            });
        })


        var map = new google.maps.Map(document.getElementById('map-canvas'), {


            center: {
                lat: {{$latitud}},
                lng: {{$longitud }}
            },
            zoom: 17
        });

        var marker = new google.maps.Marker({
            position: {
                lat: {{$latitud}},
                lng: {{$longitud }}
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

@section('js')
    {{-- cdn google maps --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places"
        type="text/javascript"></script>
    <script>
        $(function() {
            $('#idInmueble').hide();
            $('#idGrupo').change(function() {
                if ($('#idGrupo').val() != 2) {
                    $('#idInmueble').show();
                } else {
                    $('#idInmueble').hide();
                }
            });
        });

        $(function() {
            $('#idDireccion').change(function() {
                if ($('#idDireccion').val() > 0) {

                    $('#label0').hide();
                    $('#label1').hide();
                    $('#label2').hide();
                    $('#label3').hide();
                    $('#label4').hide();

                    $('#map-canvas').hide();
                    $('#searchmap').hide();
                    $('#lat').hide();
                    $('#lng').hide();
                    $('#descripcion').hide();
                } else {
                    $('#label0').show();
                    $('#label1').show();
                    $('#label2').show();
                    $('#label3').show();
                    $('#label4').show();

                    $('#map-canvas').show();
                    $('#searchmap').show();
                    $('#lat').show();
                    $('#lng').show();
                    $('#descripcion').show();
                }
            });
        });

        var map = new google.maps.Map(document.getElementById('map-canvas'), {


            center: {
                lat: {{ $latitud }},
                lng: {{ $longitud }}
            },
            zoom: 17
        });

        var marker = new google.maps.Marker({
            position: {
                lat: {{ $latitud }},
                lng: {{ $longitud }}
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

    {{-- Validaciones form --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@stop