@extends('usuario.layouts.template')

@section('header')
    Gestionar Insumos
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Insumos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>um</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>um</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($insumos as $insumo)

                                <tr>
                                    <td>{{ $insumo->nombre }}</td>
                                    <td>{{ $insumo->um }}</td>
                                    <td>
                                        <a href="{{ route('usuario.insumo.edit', $insumo->id) }}"
                                            class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar Insumo</span>
                                        </a>

                                        <form action="{{ route('usuario.insumo.delete', $insumo->id) }}" method="POST"
                                            id="form" class="form" onclick=" return alertEliminar();">
                                            {{ csrf_field() }}
                                            <button  type="submit" class="btn btn-danger btn-icon-split button" id="button">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                {{-- <input type="submit" value="Eliminair Usuario" class="text"> --}}
                                                <span class="text">Eliminar Insumo</span>
                                            </button>
                                        </form>

                                        <a href="{{ route('usuario.detalleinsumos', $insumo->id) }}"
                                            class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Ver detalles del Insumo</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('usuario.insumo.create') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Nuevo Insumo</span>
                </a>
            </div>
        </div>

    </div>
    <footer class="card border-left-success border-bottom-secondary">
        <div class="container my-auto">
            <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                <span>Contador de paginas: {{ $contador_insumo->count }}</span>
            </div>
        </div>
    </footer>
    <!-- /.container-fluid -->
<script>
 /*    let button=document.querySelector(".button"); */
    let button_id=document.getElementById("form");
    button_id.addEventListener("click",(e)=>{
        e.preventDefault();//detiene el envio por un momento
        console.log("hola");
        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Eliminado!',
                'El archivo fue eliminado satisfatoriamente.',
                'success'
              )
            }
          })
    })
</script>
   {{--  <script type="text/javascript">
        $('#form1').submit(function(e){
            alert("hola mundo cruel");
            e.preventDefault();//detiene el envio por un momento

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        })
    </script> --}}
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


