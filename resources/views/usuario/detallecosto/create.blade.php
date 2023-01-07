@extends('administrador.layouts.template')
@section('header')
Añadir nuevo costo al: <b>{{ $costo->concepto }}</b>
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
                                <h1 class="h4 text-gray-900 mb-4">Añadir nuevo costo al: <b>{{ $costo->concepto }}</b></h1>
                            </div>
                            @if ($errors->any())
                            {{-- en caso de no ingresar las credenciales de acceso del administrador(muestra un error) --}}
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('admin.detallecosto.store',$costo->id)}}" method="POST">
                                {{ csrf_field() }}

                                <span style="color: rgb(99, 151, 211)">id_costo</span>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="id_costo" value="{{ $costo->id }}"
                                    readonly>
                                </div>

                                @foreach ($detallecostos as $detallecosto )
                                  <div class="form-group">
                                    <select class="form-select" name="id_detallecostos" aria-label="Seleccione un costo">
                                        <option value="{{ $detallecosto->id }}">{{ $detallecosto->descripcion }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="descripcions[]"
                                        placeholder="descripcion del costo" value="{{ $detallecosto->descripcion }}">
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fechas[]"
                                        placeholder="fecha" value="{{ $detallecosto->fecha }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="montos[]"
                                        placeholder="monto" value="{{ $detallecosto->monto }}">
                                </div>
                                @endforeach
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
