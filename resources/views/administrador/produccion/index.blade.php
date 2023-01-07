@extends('administrador.layouts.template')

@section('header')
    Gestionar producciones
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">producciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                               <th>Id</th>
                                <th>Fecha</th>
                                <th>Capacidad X Tacho(kg)</th>
                                <th>Tacho X dia</th>
                                <th>Dias laboral</th>
                                <th>Aporte Patronal</th>
                                <th>beneficio Social</th>
                                <th>Formula</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Capacidad X Tacho</th>
                                <th>Tacho X dia</th>
                                <th>Dias laboral</th>
                                <th>Aporte Patronal</th>
                                <th>beneficio Social</th>
                                <th>Formula</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($producciones as $produccion)

                                <tr>
                                    <td>{{ $produccion->id }}</td>
                                    <td>{{ $produccion->fecha }}</td>
                                    <td>{{ $produccion->tacho }}</td>
                                    <td>{{ $produccion->tachodiario }}</td>
                                    <td>{{ $produccion->diaslaboral }}</td>
                                    <td>{{ $produccion->aportepatronal }}</td>
                                    <td>{{ $produccion->beneficiosocial }}</td>
                                    <td>{{ $produccion->formula->nombre }}</td>
                                    <td>
                                        <a href="{{ route('admin.produccion.edit', $produccion->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar produccion</span>
                                        </a>

                                        <form action="{{ route('admin.produccion.delete', $produccion->id) }}" method="POST"
                                            id="form" class="form" onclick=" return alertEliminar();">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar produccion</span>
                                            </button>
                                        </form>

                                       {{--  <a href="{{ route('admin.detalleinsumos', $produccion->id) }}"
                                            class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Ver detalles de la  produccion</span>
                                        </a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.produccion.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nueva Produccion</span>
                </a>
            </div>
        </div>

    </div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_produccion->count }}</span>
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
