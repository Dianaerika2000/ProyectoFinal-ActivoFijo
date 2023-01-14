@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-4">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Informes</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.informe.create') }}" class="btn btn-primary">
                    <span class="text">Nuevo Informe</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Revaluo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informes as $informe)

                                <tr>
                                    <td>{{ $informe->descripcion }}</td>
                                    <td>{{ $informe->fechaRealizada }}</td>
                                    <td>{{ $informe->idRevaluo }}</td>
                                    <td>
                                        <a href="{{ route('informe.edit', $informe->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Informe</span>
                                        </a>

                                        <form action="{{ route('informe.destroy', $informe->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Informe</span>
                                            </button>
                                        </form>

                                        <a href="{{ route('admin.informe.show', $informe->id) }}"
                                            class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Ver detalles del Informe</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_informe->count }}</span>
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
                'Usuario eliminado con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este usuario se eliminara definitvamente!",
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
