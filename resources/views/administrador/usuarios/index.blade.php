@extends('administrador.layouts.template')
@section('header')
    Gestionar Usuarios
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

                    <a href="{{ route('admin.usuario.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600"><i class="fas fa-arrow-right"></i></span>
                        <span class="text">Registrar Nuevo Usuario</span>
                    </a>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                {{--<th>Foto</th>--}}
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
                                    {{--<td>{{ $usuario->foto }}</td>--}}
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->genero }}</td>
                                    <td>{{ $usuario->nacionalidad }}</td>
                                    <td>{{ $usuario->ci }}</td>
                                    <td>{{ $usuario->celular }}</td>
                                    <td>{{ $usuario->direccion }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>

                                        <a href="{{route('admin.usuario.edit',$usuario)}}" class="btn btn-xs btn-info"
                                        ><i class="fas fa-pen"></i> </a>

                                        <form action="{{ route('admin.usuario.delete', $usuario->id) }}" method="POST"
                                              onclick="return alertEliminar();">
                                            {{ csrf_field() }}
                                                <button class="btn btn-xs btn-danger"
                                                        onclick="return confirm('¿Estás seguro de querer eliminar éste usuario?')"
                                                ><i class="fas fa-trash"></i> </button>
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
