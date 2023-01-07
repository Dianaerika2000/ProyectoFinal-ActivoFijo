
@extends('administrador.layouts.template')
@section('header')
    {{-- Gestion de Inventario de MarkaBolivia --}}
@endsection
@section('content')
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('inventario/images/favicon.png') }}">
    <link href="{{ asset('inventario/vendor/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inventario/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/css/bootstrap.min.css" title="main">

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Gestion de inventario</h4>
                    <p class="mb-0">gestión de inventarios, tanto de insumos como de formulas y costos</p>
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Calerdar</a></li>
                        </ol>
                    </div> --}}
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">Inventario</h4>

                        <div class="">
                            <div id="external-events" class="my-3">
                                <p>Invetarios disponibles</p>

                               {{--  <div data-class="bg-primary">
                                    <a href="{{ route('admin.inventarios') }}" class="href"><i
                                            class="fa fa-move">
                                        </i>Parametrizar todos los presupuestos por una formula especifica
                                    </a>
                                </div> --}}

                               {{--  <div data-class="bg-success">
                                    <a href="{{ route('admin.inventarios') }}" class="href2"><i
                                            class="fa fa-move">
                                        </i>Parametrizar todos los presupuestos por una fecha especifica
                                    </a>
                                </div> --}}

                                <div data-class="bg-warning">
                                    <a href="#" class="href3"><i class="fa fa-move">
                                        </i>Parametrizar todos los presupuestos por su estado
                                    </a>
                                </div>

                            </div>

                            {{-- <a href="javascript:void()" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-event w-100">
                                        <span class="align-middle"><i class="ti-plus"></i></span> Create New
                                    </a> --}}
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.inventarios') }}" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Volver atrás</span>
                </a>
            </div>

            <div class="col-lg-9 table-form3">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">

                                        @php($sumador = 0)
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Costo Total</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Costo Total</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>


                                            <tr>
                                                <td>{{ $presupuesto_estado->id }}</td>
                                                <td>{{ $presupuesto_estado->nombre }}</td>
                                                <td>
                                                    @if ($presupuesto_estado->estado=="vendido")
                                                    <span class="badge badge-success">
                                                        {{ $presupuesto_estado->estado }}</span>
                                                    @endif
                                                    @if ($presupuesto_estado->estado=="aprobado")
                                                    <span class="badge badge-primary">
                                                        {{ $presupuesto_estado->estado }}</span>
                                                    @endif
                                                    @if ($presupuesto_estado->estado=="pendiente")
                                                    <span class="badge badge-danger">
                                                        {{ $presupuesto_estado->estado }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $presupuesto_estado->montototal }}</td>
                                                <td>

                                                    <a href="{{ route('admin.presupuestofacturar', $presupuesto_estado->id) }}"
                                                        class="btn btn-success btn-icon-split" target="_blank">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Facturar el Presupuesto</span>
                                                    </a>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div hidden class="col-lg-9 form-input3">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form class="user" action="{{ route('admin.inventario.parametrizarestado') }}"
                                method="GET">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_presupuesto" aria-label="Seleccione un estado">
                                        @foreach ($presupuestos as $presupuesto)
                                            <option value="{{ $presupuesto->id }}">
                                                {{ $presupuesto->estado }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Buscar">
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                let href3 = document.querySelector(".href3");
                let form_input3 = document.querySelector(".form-input3");
                let table_form3 = document.querySelector(".table-form3");
                href3.onclick = () => {
                    form_input3.removeAttribute("hidden");
                    table_form3.setAttribute("hidden","true");
                }
            </script>
        @endsection
