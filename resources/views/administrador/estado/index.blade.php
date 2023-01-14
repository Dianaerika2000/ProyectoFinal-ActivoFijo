@extends('adminlte::page')

@section('title', 'Estado')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-4">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Estados</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.estado.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="text">Nuevo Estado</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estados as $estado)
                                <tr>
                                    <td>{{ $estado->nombre }}</td>
                                    <td>{{ $estado->descripcion }}</td>
                                    <td>
                                        <a href="{{ route('admin.estado.edit', $estado->id) }}"
                                            class="btn btn-primary btn-icon-split">
                                            <i class="bi bi-pencil-square"></i>
                                            <span class="text">Editar Estado</span>
                                        </a>

                                        <form action="{{ route('admin.estado.delete', $estado->id) }}" method="POST"
                                            class="form-delete">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-icon-split">
                                                <i class="bi bi-trash"></i>
                                                <span class="text">Eliminar Estado</span>
                                            </button>
                                        </form>

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
                <span>Contador de paginas: {{ $contador_estado->count }}</span>
            </div>
        </div>
    </footer>
    <!-- /.container-fluid -->
    <script>
        function alertEliminar() {
            return confirm(
                ["desea eliminar el registro?"],
                Swal.fire({
                    confirmButtonText: 'registro eliminado'
                })

            )
        }
    </script>
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
                'Estado eliminado con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este estado se eliminara definitvamente!",
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
@endsection