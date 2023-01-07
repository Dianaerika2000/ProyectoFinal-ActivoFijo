@extends('usuario.layouts.template')

@section('header')
    Gestionar detalles de los insumo de la formula: <b>{{ $formula->nombre }}</b><br><br>
    <span class="text" style="color: red"><h5>solo se gestionará los insumos ya agregados, en el apartado de <b>Gestionar insumos</b></h5></span>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalle de la formula <b>{{ $formula->nombre }}</b></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID</th>
                                <th>formula</th>
                                <th>ID</th>
                                <th>insumo</th>
                                <th>Precio x Kg</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>ID</th>
                                <th>formula</th>
                                <th>ID</th>
                                <th>insumo</th>
                                <th>Precio x Kg</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($detalleformulas as $detalleformula)

                                <tr>
                                    <td>{{ $detalleformula->id }}</td>
                                    <td>{{ $detalleformula->formula->id }}</td>
                                    <td>{{ $detalleformula->formula->nombre }}</td>
                                    <td>{{ $detalleformula->insumo->id }}</td>
                                    <td>{{ $detalleformula->insumo->nombre}}</td>
                                    <td>{{ $detalleformula->insumo->detalleinsumo->precio}}</td>
                                    <td>{{ $detalleformula->cantidad }}</td>
                                    <td>{{ $detalleformula->cantidad*$detalleformula->insumo->detalleinsumo->precio }}</td>
                                    <td>
                                        <a href="{{ route('usuario.detalleformula.edit', $detalleformula->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar detalleformula</span>
                                        </a>

                                        <form action="{{ route('usuario.detalleformula.delete', $detalleformula->id) }}" method="POST"
                                            onclick="alertDelete();">
                                            {{ csrf_field() }}
                                            {{-- nesesito enviar el id_insumo al controlador, por lo que le envio en un input --}}

                                            <input type="hidden"  name="id_formula" value="{{ $formula->id }}">

                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar detalleformula</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Costo total</b></td>
                        <td>{{ $formula->montolote }} bs</td>
                    </table>
                </div>
                <a href="{{ route('usuario.detalleformula.create',$formula->id) }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Agregar insumo</span>
                </a>
            </div>
        </div>
            <a href="{{ route('usuario.formulas') }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-600">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Volver atrás</span>
            </a>
    </div>
    <!-- /.container-fluid -->
@endsection
