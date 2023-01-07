@extends('administrador.layouts.template')
@section('header')
Editar Produccion {{ $produccion->formula->nombre }}
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Produccion</h1>
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
                            <form class="user" action="{{ route('admin.produccion.update',$produccion->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_formula" aria-label="Seleccione una formula">
                                        {{-- <option selected>Seleccine la carrera del produccion</option> --}}
                                     @foreach ($formulas as $formula )
                                        @if ($produccion->id_formula==$formula->id)
                                        <option value="{{ $formula->id }}" selected>{{ $formula->nombre }}</option>
                                        @endif
                                        <option value="{{ $formula->id }}">{{ $formula->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <span>fecha</span>
                                    <input type="date" class="form-control form-control-user" name="fecha" value="{{ $produccion->fecha }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="tacho"
                                         value="120" readonly>
                                </div>

                                <div class="form-group">
                                    <span>tacho diario</span>
                                    <input type="number" class="form-control form-control-user" name="tachodiario"
                                    value="{{ $produccion->tachodiario }}">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="diaslaboral"
                                    value="20" readonly>
                                </div>

                                <div class="form-group">
                                    <span>aporte patronal</span>
                                    <input type="text" class="form-control form-control-user" name="aportepatronal"
                                    value="{{ $produccion->aportepatronal }}">
                                </div>

                                <div class="form-group">
                                    <span>beneficio social</span>
                                    <input type="text" class="form-control form-control-user" name="beneficiosocial"
                                    value="{{ $produccion->beneficiosocial }}">
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="modificar">
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
