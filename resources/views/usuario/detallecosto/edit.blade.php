@extends('administrador.layouts.template')
@section('header')
Editar el costo:<b>{{ $detallecosto->descripcion }}</b>
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
                                <h1 class="h4 text-gray-900 mb-4">Editar el costo:<b>{{ $detallecosto->descripcion }}</b></h1>
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
                            <form class="user" action="{{ route('admin.detallecosto.update',$detallecosto->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{-- <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol"> --}}
                                        {{-- <option selected>Seleccine la carrera del detallecosto</option> --}}
                                       {{--  @foreach ($roles as $rol )
                                        @if ($detallecosto->id_rol==$rol->id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->r_tip }}</option>
                                        @endif
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <span style="color: rgb(99, 151, 211)">id_detallecosto</span>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="id_costo"
                                    value="{{ $detallecosto->id }}" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="descripcion"
                                    value="{{ $detallecosto->descripcion }}">
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fecha"
                                        value="{{ $detallecosto->fecha }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="monto"
                                        value="{{ $detallecosto->monto }}">
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
