@extends('administrador.layouts.template')

@section('header')
    Gestionar Costos
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Costos</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.costoformulas') }}"
                    class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Ver los costos X formulas</span>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        {{-- metodos auxiliares --}}
                        @php($sumador=0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Concepto</th>
                                <th>Costo total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Concepto</th>
                                <th>Costo total</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($costos as $costo)

                                <tr>
                                    <td>{{ $costo->id }}</td>
                                    <td>{{ $costo->concepto }}</td>
                                    <td>{{ $costo->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.costo.edit', $costo->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Costo</span>
                                        </a>

                                        <form action="{{ route('admin.costo.delete', $costo->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Costo</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.detallecostos', $costo->id) }}"
                                            class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Ver detalles del costo</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.costo.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Costo</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_costo->count }}</span>
            </div>
        </div>
    </footer>
@endsection
