@extends('administrador.layouts.template')
@section('header')
Registrar fotografias
@endsection
@section('content')
    <div class="container">

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Subir fotografía del inmueble</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('admin.fotografia.store') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idInmueble" class="form-control" id="idInmueble" required>
                                            <option value="">Seleccione un inmueble</option>
                                            @foreach ($inmuebles as $inmueble)
                                                <option value="{{ $inmueble->id }}">
                                                    GRUPO: ({{ $inmueble->grupo->nombre}})&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INMUEBLE: {{ $inmueble->descripcionGlosa}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="detalle">Detalle
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="detalle" name="detalle" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="url">Foto del inmueble/activo:
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="file" id="url" name="url" value="{{$fotografia->url}}" class="form-control ">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaSubida">Fecha de Subida
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaSubida" name="fechaSubida" class="form-control ">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Guardar progreso">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
