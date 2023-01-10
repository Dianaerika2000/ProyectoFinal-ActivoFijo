@extends('administrador.layouts.template')
@section('header')
Editar {{ $grupo->nombre }}
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Grupo</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="row g-3  needs-validation" novalidate action="{{ route('admin.grupo.update',$grupo->id) }}" method="POST">
                                {{ csrf_field() }}

                               <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="inputNombre">Nombre
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="inputNombre" name="nombre" value = {{$grupo->nombre}} class="form-control" required>
                                        <div class="invalid-feedback">
                                            El campo Nombre es obligatorio.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a type="button" class="btn btn-secondary "
                                        href="{{ route('admin.grupo') }}">Cancelar</a>
                                </div>

                                {{-- <input type="submit" class="btn btn-primary btn-user btn-block" value="Modificar grupo">
                                <hr> --}}
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
