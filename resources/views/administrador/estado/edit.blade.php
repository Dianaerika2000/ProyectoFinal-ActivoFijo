@extends('adminlte::page')

@section('title', 'Responsable')

@section('content')
    <div class="container pt-5">

        <div class="card o-hnameden border-0 shadow-lg">
            <div class="card-header py-3">
                <h4 class="m-0">Editar Estado</h4>
            </div>
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
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
                            <form class="g-3  needs-validation" novalidate action="{{ route('admin.estado.update',$estado->id) }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputNombre">Nombre
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="inputNombre" name="nombre"value = {{$estado->nombre}} class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo Nombre es obligatorio.
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputDescripcion">Descripción
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="inputDescripcion" name="descripcion" value = {{$estado->descripcion}} class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo Descripción es obligatorio.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a type="button" class="btn btn-secondary "
                                        href="{{ route('admin.estado') }}">Cancelar</a>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

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