@extends('adminlte::page')

@section('title', 'Fotografías')

@section('plugins.Sweetalert2', true)

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid pt-4">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0">Gestionar Fotografías</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.fotografia.create') }}" class="btn btn-primary">
                    <span class="text">Nueva Fotografía</span>
                    <i class="bi bi-plus-circle-fill"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
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

@section('css')
    {{-- Boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@stop

@section('js')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Fotografía eliminada con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este Fotografía se eliminara definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection