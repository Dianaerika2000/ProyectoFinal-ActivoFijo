@extends('usuario.layouts.template')
@section('header')
Editar presupuesto <b>{{ $presupuesto->nombre }}</b>
@endsection
@section('content')
    <div class="container">

        <div class="card o-hnameden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar presupuesto</h1>
                            </div>
                            @if ($errors->any())
                            {{-- en caso de no eingresar las credenciales de acceso del administrador(muestra un error) --}}
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" action="{{ route('reevaluo',$presupuesto->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{-- <div class="form-group">
                                    <select class="form-select" name="id_rol" aria-label="Seleccione un rol"> --}}
                                        {{-- <option selected>Seleccine la carrera del presupuesto</option> --}}
                                       {{--  @foreach ($roles as $rol )
                                        @if ($presupuesto->id_rol==$rol->id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->r_tip }}</option>
                                        @endif
                                        <option value="{{ $rol->id }}">{{ $rol->r_tip }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                 <div class="card shadow mb-4 {{-- border-bottom-success --}}">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-warning">Usuario actual</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse hidden" id="collapseCardExample"> {{-- show pa mostrar --}}
                                    <div class="card-body">
                                       {{ Auth::user()->u_nombre }} {{ Auth::user()->u_app }}
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                    <input type="text" class="form-control " name="id_usuario"
                                    value="{{ Auth::user()->id }}" hidden>
                                </div>

                                <div class="form-group">
                                 <label class="text-secondary">nombre del presupuesto:</label>
                                    <input type="text" class="form-control form-control-user" name="nombre"
                                    value="{{ $presupuesto->nombre }}">
                                </div>

                                 <div class="form-group">
                                    <label class="text-secondary">costo :<b class="text-primary">{{ $presupuesto->costo->concepto }}</b></label>
                                     <input type="text" class="form-control form-control-user" name="id_costo"
                                    value="{{ $presupuesto->costo->id }}" readonly hidden>
                                </div>

                                <div class="form-group">
                                  <label>formula:</label>
                                    <input type="text" class="form-control form-control-user" name="id_formula"
                                    readonly placeholder="{{ $presupuesto->costo->costoformula->formula->nombre }}">
                                </div>

                                  <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="fecha"
                                    value="{{ $presupuesto->fecha }}">
                                </div>
                                
                                <div class="form-group">
                                <label>cantidad de lote:</label>
                                    <input type="number" class="form-control form-control-user" name="cantidadlote"
                                    value="{{ $presupuesto->cantidadlote }}">
                                </div>

                                <div class="form-group">
                                    <label>elija un estado de la lista:</label>
                                    <select class="custom-select is-valid" name="estado" aria-label="Seleccione un usuario">                    
                                        
                                        <option value="{{$presupuesto->estado}}" selected>{{$presupuesto->estado}}</option>   
                                        
                                            @if($presupuesto->estado != "pendiente")
                                             <option value="pendiente">pendiente</option>
                                            @endif
                                            @if($presupuesto->estado != "aprobado")
                                             <option value="aprobado">aprobado</option>
                                            @endif
                                            @if($presupuesto->estado != "vendido")
                                             <option value="vendido">vendido</option>
                                            @endif                                                                                                                                               
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="modificar">
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
