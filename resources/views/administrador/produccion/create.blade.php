@extends('administrador.layouts.template')
@section('header')
Crear Nuevo Produccion
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
                                <h1 class="h4 text-gray-900 mb-4">Crear Produccion</h1>
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
                            <form class="user" action="{{ route('admin.produccion.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_formula" aria-label="Seleccione una formula">
                                        @foreach ($formulas as $formula )
                                        <option value="{{ $formula->id }}">{{ $formula->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fecha" placeholder="fecha">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="tacho"
                                         value="120" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="tachodiario"
                                    placeholder="tacho producido por dia">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="diaslaboral"
                                    value="20" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="aportepatronal"
                                    placeholder="aporte patronal por produccion">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="beneficiosocial"
                                    placeholder="beneficio social por produccion">
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
