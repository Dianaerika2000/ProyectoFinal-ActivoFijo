@extends('administrador.layouts.template')

@section('header')
    Gestionar Inmuebles
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inmuebles</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha Adquisición</th>
                                <th>Monto</th>
                                <th>Responsable</th>
                                <th>Grupo</th>
                                <th>Estado</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inmuebles as $inmueble)

                                <tr>
                                    <td>{{ $inmueble->codigo }}</td>
                                    <td>{{ $inmueble->descripcionGlosa }}</td>
                                    <td>{{ $inmueble->fechaAdquisicion }}</td>
                                    <td>{{ $inmueble->monto }}</td>
                                    <td>{{ $inmueble->responsable->nombre}} {{ $inmueble->responsable->Apellido}}</td>
                                    <td>{{ $inmueble->grupo->nombre}}</td>
                                    <td>{{ $inmueble->estado->nombre }}</td>
                                    @if($inmueble->direccion!=null)
                                        <td>{{ $inmueble->direccion->ubicacion}}</td>
                                        @else
                                        <td>Sin dirección asignada</td>
                                    @endif

                                    <td>
                                        <a href="{{ route('admin.inmueble.edit', $inmueble->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Inmueble</span>
                                        </a>

                                        <form action="{{ route('admin.inmueble.delete', $inmueble->id) }}" method="POST"
                                            onclick="return alertEliminar();">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Inmueble</span>
                                            </button>
                                        </form>
                                        {{--
                                        <a href="{{ route('admin.detalleinsumos', $inmueble->id) }}"
                                            class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Ver detalles del Inmueble</span>
                                        </a>
                                        --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.inmueble.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Registro de Inmueble</span>
                </a>
            </div>
        </div>

    </div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_inmueble->count }}</span>
            </div>
        </div>
    </footer>
    <!-- /.container-fluid -->
    <script>
        function alertEliminar(){
        return confirm(
            ["desea eliminar el registro?"],
       Swal.fire({
           confirmButtonText: 'registro eliminado'
         })

       )
    }
    </script>
@endsection
