@extends('usuario.layouts.template')
@section('header')
    Adicionar nuevo insumo a la formula <b>{{ $formula->nombre }}</b>
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
                                <h1 class="h4 text-gray-900 mb-4">Adicionar nuevo insumo a la formula
                                    <b>{{ $formula->nombre }}</b></h1>
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
                            <form class="user" action="{{ route('usuario.detalleformula.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_insumo" aria-label="Seleccione un insumo">
                                        @foreach ($insumos as $insumo)
                                            <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="id_formula"
                                        value="{{ $formula->id }}" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="cantidad"
                                        placeholder="cantidad del insumo">
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
