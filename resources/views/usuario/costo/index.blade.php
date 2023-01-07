@extends('usuario.layouts.template')

@section('header')
    Gestionar los costo de las formulas
    <span class="text" style="color: red">
        <h5>solo se gestionará los costo y las formulas ya agregados, en el apartado de <b>Gestionar Costos</b> y
            <b>Gestionar formulas</b></h5>
    </span>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

@php( $sumador=0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Costos de las Formulas X tambor de 120kg

                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Id</th>
                                <th>Formula</th>
                                <th>Costo de Formula</th>
                                <th>CostoTotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Id</th>
                                <th>Formula</th>
                                <th>Costo de Formula</th>
                                <th>CostoTotal</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($costoformulas as $costoformula)
                                <tr>
                                    <td>{{ $costoformula->id_costo }}</td>
                                    <td>{{ $costoformula->costo->concepto }}</td>
                                    <td>{{ $costoformula->costo->total }}</td>
                                    <td>{{ $costoformula->id_formula }}</td>
                                    <td>{{ $costoformula->formula->nombre }}</td>
                                    <td>{{ $costoformula->formula->montolote }}</td>
                                   {{--  @foreach ($detalleformulas as $detalleformula )
                                        @if ($costoformula->id_formula == $detalleformula->id_formula)
                                        @php(
                                            $sumador=$sumador+$detalleformula->cantidad * $detalleformula->insumo->detalleinsumo->precio)
                                        @endif
                                    @endforeach
                                    <td>{{ $sumador}}</td>
                                    @php($sumador=0) --}}
                                    <td>{{ $costoformula->costototal }}</td>
                                    <td>
                                        {{-- <span href="{{ route('admin.costoformula.edit', $costoformula->id) }}"
                                            class="btn btn-light btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar costoformulas</span>
                                        </span> --}}

                                        <form action="{{ route('usuario.detalleformulasVistas',$costoformula->formula->id) }}" method="GET">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Ver detalles del costo de la formula</span>
                                            </button>
                                        </form>

                                        <form action="{{ route('usuario.detallecostos',$costoformula->id_costo) }}" method="get">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-right"></i>
                                                </span>
                                                <span class="text">Ver detalles del costo de producción</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-light btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Agregar nuevo costo</span>
                </a>
            </div>
        </div>
       {{--  <a href="#" class="btn btn-light btn-icon-split">
            <span class="icon text-white-600">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Volver atrás</span>
        </a> --}}
    </div>
    <div class="row"></div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_costo->count }}</span>
            </div>
        </div>
    </footer>
@endsection
