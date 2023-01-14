@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-4">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Usuarios</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.usuario.create') }}" class="btn btn-primary">
                    <span class="text">Nuevo Usuario</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                {{-- <th>Foto</th> --}}
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Género</th>
                                <th>Nacionalidad</th>
                                <th>Cédula de Identidad</th>
                                <th>Nro. Celular</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    {{-- <td>{{ $usuario->foto }}</td> --}}
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->genero }}</td>
                                    <td>{{ $usuario->nacionalidad }}</td>
                                    <td>{{ $usuario->ci }}</td>
                                    <td>{{ $usuario->celular }}</td>
                                    <td>{{ $usuario->direccion }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.usuario.edit', $usuario) }}" type="button"
                                            class="btn btn-primary py-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.usuario.delete', $usuario->id) }}" method="POST"
                                            class="form-delete">
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
    <!-- /.container-fluid -->
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_usuario->count }}</span>
            </div>
        </div>
    </footer>
@stop

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
