@extends('administrador.layouts.template')

@section('header')
    Gestionar Reportes
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Resultado de Busqueda {{ $busqueda }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($result as $clave => $valor)
                                <tr>
                                    @if (strpos($clave, 'create') !== false)
                                        <td>{{ $clave }}</td>
                                        <td><a href="{{ route($valor) }}">{{ route($valor) }}</a></td>
                                    @else
                                        @if (strpos($clave, 'error') !== false)
                                            <td>{{ $clave }}</td>
                                            <td>{{ $valor }}</td>
                                        @else
                                            <td>{{ $clave }}</td>

                                            <td><a href="{{ url($valor) }}">{{ url($valor) }}</a></td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               {{--  <a href="{{ route('admin.reportes') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Costo</span>
                </a> --}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
  {{--   <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_costo->count }}</span>
            </div>
        </div>
    </footer> --}}

@endsection
