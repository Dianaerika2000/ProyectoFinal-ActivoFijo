@extends('adminlte::page')

@section('title', 'Inmuebles')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-4">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Inmuebles</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.inmueble.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="text">Nuevo Usuario</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
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
                                    <td>{{ $inmueble->responsable->nombre }} {{ $inmueble->responsable->Apellido }}</td>
                                    <td>{{ $inmueble->grupo->nombre }}</td>
                                    <td>{{ $inmueble->estado->nombre }}</td>
                                    @if ($inmueble->direccion != null)
                                        <td>{{ $inmueble->direccion->ubicacion }}</td>
                                    @else
                                        <td>Sin dirección asignada</td>
                                    @endif

                                    <td>
                                        <a href="{{ route('admin.inmueble.edit', $inmueble->id) }}"
                                            class="btn btn-primary btn-icon-split">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.inmueble.delete', $inmueble->id) }}" method="POST" class="form-delete">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
@endsection

@section('css')
    {{-- Boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@stop

@section('js')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Inmueble eliminado con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este Inmueble se eliminara definitvamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
