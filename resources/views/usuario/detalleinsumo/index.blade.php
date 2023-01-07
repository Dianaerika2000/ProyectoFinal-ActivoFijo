@extends('usuario.layouts.template')

@section('header')
    Gestionar detalles de compra del insumo: <b>{{ $insumo->nombre }}</b>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalle del insumo {{ $insumo->nombre }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Insumo</th>
                                <th>Id</th>
                                <th>fecha</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Insumo</th>
                                <th>Id</th>
                                <th>fecha</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($detalleinsumos as $detalleinsumo)

                                <tr>
                                    <td>{{ $insumo->id }}</td>
                                    <td>{{ $insumo->nombre }}</td>
                                    <td>{{ $detalleinsumo->id }}</td>
                                    <td>{{ $detalleinsumo->fecha }}</td>
                                    <td>{{ $detalleinsumo->precio }}</td>
                                    <td>
                                        <a href="{{ route('usuario.detalleinsumo.edit', $detalleinsumo->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar detalleinsumo</span>
                                        </a>

                                        <form action="{{ route('usuario.detalleinsumo.delete', $detalleinsumo->id) }}" method="POST"
                                            onclick=" return alertDelete();">
                                            {{ csrf_field() }}
                                            {{-- nesesito enviar el id_insumo al controlador, por lo que le envio en un input --}}

                                            <input type="hidden"  name="id_insumo" value="{{ $insumo->id }}">

                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar detalleinsumo</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('usuario.detalleinsumo.create',$insumo->id) }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo detalleinsumo</span>
                </a>
            </div>
        </div>
            <a href="{{ route('usuario.insumos') }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-600">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Volver atrás</span>
            </a>
    </div>
    <!-- /.container-fluid -->
@endsection
