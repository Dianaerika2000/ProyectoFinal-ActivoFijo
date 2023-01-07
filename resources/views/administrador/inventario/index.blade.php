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
                <div class="col-12 text-right">
                    <a href="javascript:window.print()"><button class="btn btn-success">Imprimir</button></a>
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

                                <div data-class="bg-primary">
                                    <a href="#" class="href"><i class="fa fa-move">
                                        </i>Parametrizar todos los presupuestos por una formula especifica
                                    </a>
                                </div>

                                <div data-class="bg-success">
                                    <a href="#" class="href2"><i class="fa fa-move">
                                        </i>Parametrizar todos los presupuestos por una fecha especifica
                                    </a>
                                </div>

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
            </div>

            <div hidden class="col-lg-9 form-input">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form class="user" action="{{ route('admin.inventario.parametrizarformula') }}" method="GET">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_formula" aria-label="Seleccione una formula">
                                        @foreach ($costoformulas as $costoformula)
                                            <option value="{{ $costoformula->id_formula }}">
                                                {{ $costoformula->formula->nombre }}</option>
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

            <div hidden class="col-lg-9 form-input2">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form class="user" action="{{ route('admin.inventario.parametrizarfecha') }}" method="GET">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <select class="form-select" name="id_presupuesto" aria-label="Seleccione una fecha">
                                        @foreach ($presupuestos as $presupuesto)
                                            <option value="{{ $presupuesto->id }}">
                                                {{ $presupuesto->fecha }}</option>
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

            <div hidden class="col-lg-9 form-input3">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form class="user" action="{{ route('admin.inventario.parametrizarestado') }}" method="GET">
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
            <p>para visualizar deberia de haber selecionado alguna opcion entre la lista de arriba!</p><br>
            <footer class="card border-left-success border-bottom-secondary">
                <div class="container my-auto">
                    <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        <span>Contador de paginas: {{ $contador_inventario->count }}</span>
                    </div>
                </div>
            </footer>
            {{-- codigo javascript creado por mi --}}
            <script>
                let href = document.querySelector(".href");
                let href2 = document.querySelector(".href2");
                let href3 = document.querySelector(".href3");

                let form_input = document.querySelector(".form-input");
                let form_input2 = document.querySelector(".form-input2");
                let form_input3 = document.querySelector(".form-input3");

                href.onclick = () => {
                    form_input.removeAttribute("hidden");
                    form_input2.setAttribute("hidden","true");
                    form_input3.setAttribute("hidden","true");
                }

                href2.onclick = () => {
                    form_input2.removeAttribute("hidden");
                    form_input.setAttribute("hidden","true");
                    form_input3.setAttribute("hidden","true");
                }
                href3.onclick = () => {
                    form_input3.removeAttribute("hidden");
                    form_input.setAttribute("hidden","true");
                    form_input2.setAttribute("hidden","true");
                    /* table_form.setAttribute("hidden","true"); */
                }
            </script>

            <!--**********************************
                Scripts
            ***********************************-->
        @endsection
