@extends('administrador.layouts.template')
@section('header')
Editar Formula <b>{{ $formula->nombre }}</b>
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Formula</h1>
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
                            <form class="user" action="{{ route('admin.formula.update',$formula->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{-- <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol"> --}}
                                        {{-- <option selected>Seleccine la carrera del formula</option> --}}
                                       {{--  @foreach ($roles as $rol )
                                        @if ($formula->id_rol==$rol->id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->r_tip }}</option>
                                        @endif
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nombre"
                                    value="{{ $formula->nombre }}">
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fecha"
                                        value="{{ $formula->fecha }}">
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
