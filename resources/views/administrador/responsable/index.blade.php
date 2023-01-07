@extends('administrador.layouts.template')

@section('header')
    Gestionar Responsables
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Responsables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
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
                                    <a href="{{ route('admin.responsable.edit', $responsable->id) }}" class="btn btn-xs btn-info"
                                    ><i class="fas fa-pen"></i> </a>

                                    <form action="{{ route('admin.responsable.delete', $responsable->id) }}" method="POST"
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
                <a href="{{ route('admin.responsable.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Responsable</span>
                </a>
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
