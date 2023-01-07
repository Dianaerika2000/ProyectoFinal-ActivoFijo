@extends('usuario.layouts.template')

@section('header')
    Gestionar detalles del costo: <b>{{ $costo->concepto }}</b> sin incluir el costo de la formula
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @php($sumador=0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalles del costo {{ $costo->concepto }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Costo</th>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>fecha</th>
                                <th>monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Costo</th>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>fecha</th>
                                <th>monto</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($detallecostos as $detallecosto)

                                <tr>
                                    <td>{{ $detallecosto->costo->id }}</td>
                                    <td>{{ $detallecosto->costo->concepto }}</td>
                                    <td>{{ $detallecosto->id }}</td>
                                    <td>{{ $detallecosto->descripcion }}</td>
                                    <td>{{ $detallecosto->fecha }}</td>
                                    <td>{{ $detallecosto->monto }}</td>
                                    <td>
                                        <a href="#{{-- {{ route('usuario.detallecosto.edit', $detallecosto->id) }} --}}"
                                            class="btn btn-light btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar detallecosto</span>
                                        </a>

                                        <form action="#{{-- {{ route('usuario.detallecosto.delete', $detallecosto->id) }} --}}">
                                            {{ csrf_field() }}
                                           {{--   nesesito enviar el id_costo al controlador, por lo que le envio en un input --}}

                                            <input type="hidden"  name="id_costo" value="{{ $costo->id }}">

                                            <button  class="btn btn-light btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>

                                                <span class="text">Eliminar detallecosto</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @php($sumador=$sumador+($detallecosto->monto))
                            @endforeach
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h4><b>Total</b></h4></td>
                            <td><b>{{ $sumador }}</b></td>
                        </tbody>
                    </table>
                </div>
               {{--  <a href="{{ route('usuario.detallecosto.create',$costo->id) }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo detalle al costo</span>
                </a> --}}
            </div>
        </div>
            <a href="{{ route('usuario.costos',$costo->id) }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-600">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Volver atrás</span>
            </a>
    </div>
    <!-- /.container-fluid -->
@endsection
