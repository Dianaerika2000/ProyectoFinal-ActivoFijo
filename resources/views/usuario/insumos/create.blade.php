@extends('usuario.layouts.template')
@section('header')
Crear Nuevo Insumo
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
                                <h1 class="h4 text-gray-900 mb-4">Crear Insumo</h1>
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
                            <form class="user" action="{{ route('usuario.insumo.store') }}" method="POST">
                                {{ csrf_field() }}
                               {{--  <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol">
                                        @foreach ($roles as $rol )
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nombre" placeholder="nombre">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="um"
                                        placeholder="unidad medida">
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
