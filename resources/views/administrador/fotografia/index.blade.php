@extends('administrador.layouts.template')

@section('header')
    Gestionar Fotografía
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Fotografías</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fotografía</th>
                                <th>Fecha</th>
                                <th>Inmueble</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fotografias as $fotografia)

                                <tr>
                                    <td>{{ $fotografia->detalle }}</td>
                                    <td>
                                        <center>
                                            {{--<img height="300px" width="300px" class="img-thumbnail" src="{{asset('UsuarioTemplate/img/'.$fotografia->url)}}" alt="{{$fotografia->url}}">--}}
                                            <img height="300px" width="300px" class="img-thumbnail" src="{{asset($fotografia->url)}}" alt="{{$fotografia->url}}">
                                        </center>

                                    </td>
                                    <td>{{ $fotografia->fechaSubida }}</td>
                                    <td>{{ $fotografia->inmueble->descripcionGlosa }}</td>
                                    <td>
                                        <a href="{{ route('admin.fotografia.edit', $fotografia->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Fotografía</span>
                                        </a>

                                        <form action="{{ route('admin.fotografia.delete', $fotografia->id) }}" method="POST"
                                            onclick="return alertEliminar();">
                                            {{ csrf_field() }}
                                            <button  class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Fotografía</span>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.fotografia.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo registro de Fotografía</span>
                </a>
            </div>
        </div>

    </div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_fotografia->count }}</span>
            </div>
        </div>
    </footer>
    <!-- /.container-fluid -->
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
