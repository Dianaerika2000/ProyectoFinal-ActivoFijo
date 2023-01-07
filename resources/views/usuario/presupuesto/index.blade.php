@extends('usuario.layouts.template')

@section('header')
    Gestionar Presupuestos
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Presupuestos</h6>
                <div class="col-12 text-right">
                    <a href="javascript:window.print()">Imprimir</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        {{-- metodos auxiliares --}}
                        @php($sumador=0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>ID</th>
                                <th>Costo</th>
                                <th>ID</th>
                                <th>Formula</th>
                                <th>fecha</th>
                                <th>Cantidad Lote</th>
                                <th>Costo Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>ID</th>
                                <th>Costo</th>
                                <th>ID</th>
                                <th>Formula</th>
                                <th>fecha</th>
                                <th>Cantidad Lote</th>
                                <th>Costo Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($presupuestos as $presupuesto)

                                <tr>
                                    <td>{{ $presupuesto->id }}</td>
                                    <td>{{ $presupuesto->nombre }}</td>
                                    <td>{{ $presupuesto->id_usuario }}</td>
                                    <td>{{ $presupuesto->usuario->u_nombre}} {{ $presupuesto->usuario->u_app }}</td>
                                    <td>{{ $presupuesto->id_costo }}</td>
                                    <td>{{ $presupuesto->costo->concepto }}</td>
                                    <td>{{ $presupuesto->costo->costoformula->formula->id }}</td>
                                    <td>{{ $presupuesto->costo->costoformula->formula->nombre }}</td>
                                    <td>{{ $presupuesto->fecha }}</td>
                                    <td>{{ $presupuesto->cantidadlote }}</td>
                                    <td>{{ $presupuesto->montototal }}</td>
                                    <td>{{ $presupuesto->estado }}</td>
                                    <td>
                                        <a href="{{ route('reevaluo', $presupuesto->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Presupuesto</span>
                                        </a>

                                        <form action="{{ route('usuario.presupuesto.delete', $presupuesto->id) }}" method="POST"
                                            onclick="return alertDelete();">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Presupuesto</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('usuario.presupuestofacturar', $presupuesto->id) }}"
                                            class="btn btn-success btn-icon-split" target="_blank">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Facturar el Presupuesto</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('usuario.presupuesto.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Presupuesto</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_presupuesto->count }}</span>
            </div>
        </div>
    </footer>
@endsection
