@extends('administrador.layouts.template')
@section('header')
    Registrar Nuevo Usuario
@endsection
@section('content')
    <div class="container">

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            {{-- <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Usuario</h1>
                            </div> --}}
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
                            <form class="row g-3" action="{{ route('admin.usuario.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">Nombre(s)</label>
                                    <input type="text" class="form-control" id="inputName" 
                                    name="nombre"
                                    required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastname" class="form-label">Apellido(s)</label>
                                    <input type="text" class="form-control" id="inputLastname"
                                    name="apellido" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCarnet" class="form-label">Carnet de Identidad</label>
                                    <input type="text" class="form-control" id="inputCarnet" 
                                    name="ci" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNacionalidad" class="form-label">Nacionalidad</label>
                                    <input type="text" class="form-control" id="inputNacionalidad"
                                    name="nacionalidad" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputGenero" class="form-label">Genero</label>
                                    <select id="inputGenero" class="form-select" name="genero" required>
                                        <option selected value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="X">No definido</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPhone" class="form-label">Celular</label>
                                    <input type="tel" class="form-control" id="inputPhone" name="celular" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="inputAddress" name="direccion" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                                  </div>
                                <div class="col-md-4">
                                    <label for="inputPassword" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputConfirmPassword" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword" name="password1" required>
                                </div>
                                <div class="col-12">
                                    <h2 class="h5">Listado de Roles</h2>
                                    <div class="form-group">
                                        @foreach ($roles as $role)
                                            <div>
                                                <label>
                                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <a type="button" class="btn btn-secondary" href="{{route('admin.usuarios')}}">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
