@extends('administrador.layouts.template')

@section('header')
    Gestionar Grupo
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grupos</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.grupo.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="text">Nuevo Grupo</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                                <tr>
                                    <td>{{ $grupo->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.grupo.edit', $grupo->id) }}"
                                            class="btn btn-primary btn-icon-split">
                                            <i class="bi bi-pencil-square"></i>
                                            <span class="text">Editar Grupo</span>
                                        </a>

                                        <form action="{{ route('admin.grupo.delete', $grupo->id) }}" method="POST"
                                            class="form-delete">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-icon-split"><i class="bi bi-trash"></i>
                                                <span class="text">Eliminar Grupo</span>
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
                <span>Contador de paginas: {{ $contador_grupo->count }}</span>
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Grupo eliminado con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este grupo se eliminara definitvamente!",
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
