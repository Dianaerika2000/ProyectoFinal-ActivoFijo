@extends('adminlte::page')

@section('title', 'Responsable')

@section('content_header')
    <h1>Registrar Nuevo Responsable</h1>
@stop

@section('content')
    <div class="container">
        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrar Responsable</h1>
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
                            <form class="needs-validation" novalidate 
                                action="{{ route('admin.responsable.store') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="inputCodigoAsignado">Código Administrativo
                                    </label>
                                    <input type="number" id="inputCodigoAsignado" name="codigoAsignado"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        El campo Código Administrativo es obligatorio.
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputNombre">Nombre
                                    </label>
                                    <input type="text" id="inputNombre" name="nombre" class="form-control" required>
                                    <div class="invalid-feedback">
                                        El campo Nombre es obligatorio.
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputApellido">Apellido
                                    </label>
                                    <input type="text" id="inputApellido" name="Apellido" class="form-control" required>
                                    <div class="invalid-feedback">
                                        El campo Apellido es obligatorio.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    <a type="button" class="btn btn-secondary "
                                        href="{{ route('admin.responsable') }}">Cancelar</a>
                                </div>
                            </form>
                            <hr>
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
