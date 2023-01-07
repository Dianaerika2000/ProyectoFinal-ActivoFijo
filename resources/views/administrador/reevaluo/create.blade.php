@extends('administrador.layouts.template')
@section('header')
Crear Nuevo Reevaluo<br>
<span style="color: red"><h5>Solo se podrá crear un reevaluo con los inmuebles ya registrados en <b>Gestionar Inmuebles</b></h5></span>
@endsection
@section('content')
    <div class="container">

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Reevaluo</h1>
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
                            <div class="card shadow mb-4 {{-- border-bottom-success --}}">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-success">Usuario actual</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse hidden" id="collapseCardExample" style=""> {{-- show pa mostrar --}}
                                    <div class="card-body">
                                       {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                                    </div>
                                </div>
                            </div>

                            <form class="user" action="{{ route('admin.reevaluo.store') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="idInmueble">Inmueble
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <select name="idInmueble" class="form-control" id="idInmueble">
                                            <option value="">Seleccione un inmueble</option>
                                            @foreach ($inmuebles as $inmueble)
                                                <option value="{{ $inmueble->id }}">
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
                                        <input type="text" id="descripcion" name="descripcion" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="fechaRevaluo">Fecha de Revaluo
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="date" id="fechaRevaluo" name="fechaRevaluo"
                                               required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="costo">Costo (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="costo" name="costo" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="costoActualizado">Costo Actualizado (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="costoActualizado" name="costoActualizado" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="depreciacionAcumulada">Depreciación Acumulada (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="depreciacionAcumulada" name="depreciacionAcumulada" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="valorNeto">Valor Neto (Bs)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" step='0.01' id="valorNeto" name="valorNeto" required="required" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control " name="idUsuario"
                                    value="{{ Auth::user()->id }}" hidden>
                                </div>

                                {{--
                                <div class="form-group">
                                    <label>Elija un estado de la lista:</label><br>
                                    <select class="custom-select is-valid" name="estado" aria-label="Seleccione un usuario">
                                        <option >Pendiente</option>
                                        <option >Aprobado</option>
                                        <option >Vendido</option>
                                    </select>
                                </div>
                                --}}

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrar Reevaluo">
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
