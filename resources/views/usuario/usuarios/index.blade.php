@extends('usuario.layouts.template')
@section('header')
    Listar Usuarios
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>nombre</th>
                                <th>apellido</th>
                                <th>ci</th>
                                <th>sexo</th>
                                <th>direccion</th>
                                <th>telefono</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    @if ($usuario->rol->r_tip != "administrador")
                                    <td>{{ $usuario->rol->r_tip }}</td>
                                    <td>{{ $usuario->u_nombre }}</td>
                                    <td>{{ $usuario->u_app }}</td>
                                    <td>{{ $usuario->u_ci }}</td>
                                    <td>{{ $usuario->u_sex }}</td>
                                    <td>{{ $usuario->u_dir }}</td>
                                    <td>{{ $usuario->u_tel }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    @endif
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
@endsection
