@extends('adminlte::page')

@section('title', 'Responsable')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-3">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Responsables</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.responsable.create') }}" class="btn btn-primary">
                    <span class="text">Nuevo Responsable</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Código administrativo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responsables as $responsable)
                                <tr>
                                    <td>{{ $responsable->codigoAsignado }}</td>
                                    <td>{{ $responsable->nombre }}</td>
                                    <td>{{ $responsable->Apellido }}</td>
                                    <td>
                                        <a href="{{ route('admin.responsable.edit', $responsable->id) }}"
                                            class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                                        <form action="{{ route('admin.responsable.delete', $responsable->id) }}"
                                            method="POST" class="form-delete">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
                <span>Contador de paginas: {{ $contador_responsable->count }}</span>
            </div>
        </div>
    </footer>
    <!-- /.container-fluid -->
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
                'Responsable eliminado con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este responsable se eliminara definitivamente!",
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
