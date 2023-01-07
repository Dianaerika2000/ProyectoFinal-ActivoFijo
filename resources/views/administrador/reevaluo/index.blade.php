@extends('administrador.layouts.template')

@section('header')
    Gestionar Reevaluo
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reevaluo</h6>
                <div class="col-12 text-right">
                    <a href="javascript:window.print()"><button class="btn btn-success">Imprimir</button></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        {{-- metodos auxiliares --}}
                        @php($sumador=0)
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha Revaluo</th>
                                <th>Costo</th>
                                <th>Costo Actualizado</th>
                                <th>Depreciación</th>
                                <th>Valor Neto</th>
                                <th>Inmueble</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reevaluos as $reevaluo)

                                <tr>
                                    <td>{{ $reevaluo->descripcion }}</td>
                                    <td>{{ $reevaluo->fechaRevaluo }}</td>
                                    <td>{{ $reevaluo->costo }} Bs.</td>
                                    <td>{{ $reevaluo->costoActualizado }} Bs.</td>
                                    <td>{{ $reevaluo->depreciacionAcumulada }} Bs.</td>
                                    <td>{{ $reevaluo->valorNeto }} Bs.</td>
                                    <td>{{ $reevaluo->inmueble->codigo }} - {{ $reevaluo->inmueble->descripcionGlosa }}</td>
                                    <td>
                                        <a href="{{ route('admin.reevaluo.edit', $reevaluo->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Presupuesto</span>
                                        </a>

                                        <form action="{{ route('admin.reevaluo.delete', $reevaluo->id) }}" method="POST"
                                        onclick="return alertEliminar();">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Presupuesto</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.reevaluofacturar', $reevaluo->id) }}"
                                            class="btn btn-success btn-icon-split" target="_blank">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Facturar</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.reevaluo.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Reevaluo</span>
                </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_reevaluo->count }}</span>
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
