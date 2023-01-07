@extends('administrador.layouts.template')
@section('header')
Editar Usuario {{ $usuario->nombre }}{{ $usuario->apellido}}
@endsection
@section('content')
    <div class="container">
        @if(session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Usuario</h1>
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
                            <form class="user" action="{{ route('admin.usuario.update',$usuario->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{-- yo no deberia de poder cambiar mi rol --}}
                                {{--
                                @if (auth()->user()->rol->r_tip =="administrador" && $usuario->rol->r_tip=="administrador")
                                <div class="form-group">
                                    <input style="background-color:rgb(0,255,0,0.3);border:none" type="text" class="form-control form-control-user" name="id_rol"
                                    readonly value="{{ auth()->user()->rol->r_tip }}">
                                </div>
                                @else
                                <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol">
                                        <option selected>Seleccine la carrera del usuario</option>
                                        @foreach ($roles as $rol )
                                        @if ($usuario->id_rol==$rol->id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->r_tip }}</option>
                                        @endif
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                --}}


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nombre"
                                    value="{{ $usuario->nombre }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="apellido"
                                        value="{{ $usuario->apellido}}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="ci"
                                        value="{{ $usuario->ci }}">
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
                                           value="{{ $usuario->nacionalidad}}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="direccion"
                                    value="{{ $usuario->direccion}}">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="celular"
                                    value="{{ $usuario->celular }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                    value="{{ $usuario->email }}">
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

                                {{--
                                {!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
                                {!! Form::open(['url' => 'foo/bar']) !!}
                                {!! Form::close() !!}
                                --}}

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Modificar registro">
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
