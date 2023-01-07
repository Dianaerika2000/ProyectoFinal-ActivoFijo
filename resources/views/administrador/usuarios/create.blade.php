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
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Usuario</h1>
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
                            <form class="user" action="{{ route('admin.usuario.store') }}" method="POST">
                                {{ csrf_field() }}
                                {{--
                                <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol">
                                        <option selected>Seleccine la carrera del usuario</option>
                                        @foreach ($roles as $rol )
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                --}}

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nombre"
                                           placeholder="Nombre">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="apellido"
                                           placeholder="Apellido">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="ci"
                                           placeholder="Carnet de Identidad">
                                </div>

                                <div class="form-group">
                                    <select class="form-select" name="genero" aria-label="Seleccione un sexo">
                                        <option selected value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="X">No definido</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nacionalidad"
                                           placeholder="Nacionalidad">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="direccion"
                                           placeholder="Dirección">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="celular"
                                           placeholder="Celular">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                           placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="password"
                                           placeholder="Contraseña">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="password1"
                                           placeholder="Confirmar contraseña">
                                </div>

                                <h2 class="h5">Listado de Roles</h2>
                                <div class="form-group">
                                    @foreach($roles as $role)
                                        <div>
                                            <label>
                                                {!! Form::checkbox('roles[]',$role->id, null ,['class'=>'mr-1']) !!}
                                                {{$role->name}}
                                            </label>
                                        </div>
                                    @endforeach
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
