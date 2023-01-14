@extends('adminlte::page')

@section('title', 'Usuario')

@section('content')
    <div class="container pt-5">

        <div class="card o-hnameden border-0 shadow-lg">
            <div class="card-header py-3">
                <h4 class="m-0">Registrar Nuevo Usuario</h4>
            </div>
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
                            <form class="needs-validation row" novalidate action="{{ route('admin.usuario.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">Nombre(s)</label>
                                    <input type="text" class="form-control" id="inputName" 
                                    name="nombre"
                                    required>
                                    <div class="invalid-feedback">
                                        El campo Nombre es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastname" class="form-label">Apellido(s)</label>
                                    <input type="text" class="form-control" id="inputLastname"
                                    name="apellido" required>
                                    <div class="invalid-feedback">
                                        El campo Apellido es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCarnet" class="form-label">Carnet de Identidad</label>
                                    <input type="text" class="form-control" id="inputCarnet" 
                                    name="ci" required>
                                    <div class="invalid-feedback">
                                        El campo Carnet de Identidad es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputNacionalidad" class="form-label">Nacionalidad</label>
                                    <input type="text" class="form-control" id="inputNacionalidad"
                                    name="nacionalidad" required>
                                    <div class="invalid-feedback">
                                        El campo Nacionalidad es obligatorio.
                                    </div>
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
                                    <div class="invalid-feedback">
                                        El campo Celular es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="inputAddress" name="direccion" required>
                                    <div class="invalid-feedback">
                                        El campo Dirección es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputEmail" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                                    <div class="invalid-feedback">
                                        El campo Correo Electronico es obligatorio.
                                    </div>
                                  </div>
                                <div class="col-md-4">
                                    <label for="inputPassword" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password" required>
                                    <div class="invalid-feedback">
                                        El campo Contraseña es obligatorio.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputConfirmPassword" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword" name="password1" required>
                                    <div class="invalid-feedback">
                                        El campo Confirmar Contraseña es obligatorio.
                                    </div>  
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
@stop

@section('js')
    {{-- Validaciones form --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@stop


