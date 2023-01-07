@extends('usuario.layouts.template')
@section('header')
Editar los insumos de la formula: <b>{{ $formula->nombre }}</b>
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
                                <h2 class="h4 text-gray-900 mb-4">Editar los insumos de la formula: <b>{{ $formula->nombre }}</b></h2>
                                <span class="text" style="color: red"><h5>solo se podrá cambiar la <b>cantidad</b> del insumo de dicha formula</h5></span>
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
                            <form class="user" action="{{ route('usuario.detalleformula.update',$detalleformula->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{-- <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol"> --}}
                                        {{-- <option selected>Seleccine la carrera del detalleformula</option> --}}
                                       {{--  @foreach ($roles as $rol )
                                        @if ($detalleformula->id_rol==$rol->id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->r_tip }}</option>
                                        @endif
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label style="color: rgb(99, 151, 211)">id insumo:</label>
                                    <input type="text" class="form-control form-control-user" name="id_insumo"
                                    value="{{ $detalleformula->id_insumo }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label style="color: rgb(99, 151, 211)">id formula:</label>
                                    <input type="text" class="form-control form-control-user" name="id_formula"
                                    value="{{ $detalleformula->id_formula }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label style="color: rgb(99, 151, 211)">insumo:</label>
                                    <input type="nombre" class="form-control form-control-user" name="nombre"
                                    value="{{ $detalleformula->insumo->nombre }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label style="color: rgb(99, 151, 211)">cantidad del insumo:</label>
                                    <input type="text" class="form-control form-control-user" name="cantidad"
                                        value="{{ $detalleformula->cantidad }}">
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
