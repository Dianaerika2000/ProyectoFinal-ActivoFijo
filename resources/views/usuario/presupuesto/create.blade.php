@extends('usuario.layouts.template')
@section('header')
Crear Nuevo Presupuesto<br>
<span style="color: red"><h5>solo se podra crear presupuestos de formulas y costos ya creadas en <b>Gestionar Formulas</b>y <b>Gestionar Costos</b></h5></span>
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
                                <h1 class="h4 text-gray-900 mb-4">Crear Presupuesto</h1>
                            </div>
                            @if ($errors->any())
                            {{-- en caso de no eingresar las credenciales de acceso del usuarioistrador(muestra un error) --}}
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
                                       {{ Auth::user()->u_nombre }} {{ Auth::user()->u_app }}
                                    </div>
                                </div>
                            </div>

                            <form class="user" action="{{ route('reevaluo') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nombre"
                                    placeholder="nombre del presupuesto" aria-describedby="nombre">
                                    {{-- <small id="emailHelp" class="form-text text-muted">elija un costo de la lista</small> --}}
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control " name="id_usuario"
                                    value="{{ Auth::user()->id }}" hidden>
                                </div>

                                <div class="form-group">
                                    <label>elija un costo de la lista:</label><br>
                                    <select class="form-select my-1 mr-sm-2" name="id_costo" aria-label="Seleccione un costo">
                                        @foreach ($costos as $costo )
                                        <option value="{{ $costo->id }}">{{ $costo->concepto }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="cantidadlote"
                                    placeholder="cantidad del lote a presupuestar">
                                </div>

                               {{--  <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="montototal"
                                    value="{{ $costo->costototal }}">
                                </div> --}}

                                <div class="form-group">
                                    <label>elija un estado de la lista:</label><br>
                                    <select class="custom-select is-valid" name="estado" aria-label="Seleccione un usuario">
                                        <option >pendiente</option>
                                        <option >aprobado</option>
                                        <option >vendido</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fecha"
                                    placeholder="estado del presupuesto">
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
@endsection
