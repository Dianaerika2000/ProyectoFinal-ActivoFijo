@extends('administrador.layouts.template')
@section('header')
Editar Reevaluo del Inmueble: <b>{{ $reevaluo->inmueble->codigo }}</b>
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Reevaluo</h1>
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
                            <form class="user" action="{{ route('admin.reevaluo.update',$reevaluo->id) }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idInmueble">Inmueble
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idInmueble" class="form-control" id="idInmueble" disabled>
                                            <option value="">Seleccione un inmueble</option>
                                            @foreach ($inmuebles as $inmueble)
                                                <option value="{{ $inmueble->id }}"
                                                        {{old('idInmueble',$inmueble->id)== $reevaluo->idInmueble ? 'selected':''}}>
                                                    {{ $inmueble->codigo}} - {{ $inmueble->descripcionGlosa}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="descripcion">Descripción
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="descripcion" name="descripcion" required="required" value="{{$reevaluo->descripcion}}" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaRevaluo">Fecha de Revaluo
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaRevaluo" name="fechaRevaluo" value="{{$reevaluo->fechaRevaluo}}"
                                               required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="costo">Costo (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="costo" name="costo" value="{{$reevaluo->costo}}" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="costoActualizado">Costo Actualizado (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="costoActualizado" name="costoActualizado" value="{{$reevaluo->costoActualizado}}" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="depreciacionAcumulada">Depreciación Acumulada (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="depreciacionAcumulada" name="depreciacionAcumulada" value="{{$reevaluo->depreciacionAcumulada}}"  required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="valorNeto">Valor Neto (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="valorNeto" name="valorNeto" value="{{$reevaluo->valorNeto}}" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control " name="idUsuario"
                                           value="{{ Auth::user()->id }}" hidden>
                                </div>


                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Modificar Registro">
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
