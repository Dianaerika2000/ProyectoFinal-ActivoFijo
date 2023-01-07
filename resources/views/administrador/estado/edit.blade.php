@extends('administrador.layouts.template')
@section('header')
Editar Estado - {{ $estado->nombre }}
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Estado</h1>
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
                            <form class="user" action="{{ route('admin.estado.update',$estado->id) }}" method="POST">
                                {{ csrf_field() }}

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="nombre" name="nombre" required="required" value = {{$estado->nombre}} class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="descripcion">Descripción
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 ">
                                        <input type="text" id="descripcion" name="descripcion" required="required" value = {{$estado->descripcion}} class="form-control">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Modificar Estado">
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
