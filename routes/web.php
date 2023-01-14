<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\RevaluoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\FotografiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/',[ClienteController::class,'index'])->name('index');

//1:23:53
//ruta de login del admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdministradorController::class, 'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login', [AdministradorController::class, 'login'])->name('admin.login')->middleware('guest:admin');

    Route::middleware(['auth:admin'])->group(function(){
        Route::post('/logout',[AdministradorController::class,'logout'])->name('admin.logout');
        Route::get('/menu',[AdministradorController::class, 'menu'])->name('admin.menu');
        /* Route::post('/costo_formula',[AdministradorController::class,'costo_formula'])->name('admin.costo_formula'); */
        
        /* Estadisticas */
        Route::get('/estadisticas',[AdministradorController::class, 'estadisticas'])->name('admin.estadisticas');
        Route::get('/busqueda',[AdministradorController::class, 'busqueda'])->name('admin.busqueda');

        /* gestionar usuarios */
        Route::get('/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
        Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuario.create');
        Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('admin.usuario.store');
        Route::get('usuarios/edit/{usuario}', [UsuarioController::class, 'edit'])->name('admin.usuario.edit');
        Route::post('/usuarios/update/{usuario}', [UsuarioController::class, 'update'])->name('admin.usuario.update');
        Route::post('usuarios/delete/{usuario}', [UsuarioController::class, 'delete'])->name('admin.usuario.delete');

        /* gestionar responsables */
        Route::get('/responsables', [ResponsableController::class, 'index'])->name('admin.responsable');
        Route::get('responsables/create', [ResponsableController::class, 'create'])->name('admin.responsable.create');
        Route::post('/responsables/store', [ResponsableController::class, 'store'])->name('admin.responsable.store');
        Route::get('responsables/edit/{responsable}', [ResponsableController::class, 'edit'])->name('admin.responsable.edit');
        Route::post('/responsables/update/{responsable}', [ResponsableController::class, 'update'])->name('admin.responsable.update');
        Route::post('responsables/delete/{responsable}', [ResponsableController::class, 'delete'])->name('admin.responsable.delete');

        /* gestionar estados */
        Route::get('/estados', [EstadoController::class, 'index'])->name('admin.estado');
        Route::get('estados/create', [EstadoController::class, 'create'])->name('admin.estado.create');
        Route::post('/estados/store', [EstadoController::class, 'store'])->name('admin.estado.store');
        Route::get('estados/edit/{estado}', [EstadoController::class, 'edit'])->name('admin.estado.edit');
        Route::post('/estados/update/{estado}', [EstadoController::class, 'update'])->name('admin.estado.update');
        Route::post('estados/delete/{estado}', [EstadoController::class, 'delete'])->name('admin.estado.delete');

        /* gestionar grupos */
        Route::get('/grupos', [GrupoController::class, 'index'])->name('admin.grupo');
        Route::get('grupos/create', [GrupoController::class, 'create'])->name('admin.grupo.create');
        Route::post('/grupos/store', [GrupoController::class, 'store'])->name('admin.grupo.store');
        Route::get('grupos/edit/{grupo}', [GrupoController::class, 'edit'])->name('admin.grupo.edit');
        Route::post('/grupos/update/{grupo}', [GrupoController::class, 'update'])->name('admin.grupo.update');
        Route::post('grupos/delete/{grupo}', [GrupoController::class, 'delete'])->name('admin.grupo.delete');

        /* gestionar direcciones */
        Route::get('/direcciones', [DireccionController::class, 'index'])->name('admin.direccion');
        Route::get('direcciones/create', [DireccionController::class, 'create'])->name('admin.direccion.create');
        Route::post('/direcciones/store', [DireccionController::class, 'store'])->name('admin.direccion.store');
        Route::get('direcciones/edit/{direccion}', [DireccionController::class, 'edit'])->name('admin.direccion.edit');
        Route::post('/direcciones/update/{direccion}', [DireccionController::class, 'update'])->name('admin.direccion.update');
        Route::post('direcciones/delete/{direccion}', [DireccionController::class, 'delete'])->name('admin.direccion.delete');

        /* gestionar inmuebles */
        Route::get('/inmuebles', [InmuebleController::class, 'index'])->name('admin.inmueble');
        Route::get('inmuebles/create', [InmuebleController::class, 'create'])->name('admin.inmueble.create');
        Route::post('/inmuebles/store', [InmuebleController::class, 'store'])->name('admin.inmueble.store');
        Route::get('inmuebles/edit/{inmueble}', [InmuebleController::class, 'edit'])->name('admin.inmueble.edit');
        Route::post('/inmuebles/update/{inmueble}', [InmuebleController::class, 'update'])->name('admin.inmueble.update');
        Route::post('inmuebles/delete/{inmueble}', [InmuebleController::class, 'delete'])->name('admin.inmueble.delete');

        /* gestionar fotografias */
        Route::get('/fotografias', [FotografiaController::class, 'index'])->name('admin.fotografia');
        Route::get('fotografias/create', [FotografiaController::class, 'create'])->name('admin.fotografia.create');
        Route::post('/fotografias/store', [FotografiaController::class, 'store'])->name('admin.fotografia.store');
        Route::get('fotografias/edit/{fotografia}', [FotografiaController::class, 'edit'])->name('admin.fotografia.edit');
        Route::post('/fotografias/update/{fotografia}', [FotografiaController::class, 'update'])->name('admin.fotografia.update');
        Route::post('fotografias/delete/{fotografia}', [FotografiaController::class, 'delete'])->name('admin.fotografia.delete');

        /* gestionar costos */
         Route::get('/costos', [CostoController::class, 'index'])->name('admin.costos');
         Route::get('costos/create/', [CostoController::class, 'create'])->name('admin.costo.create');
         Route::post('/costos/store', [CostoController::class, 'store'])->name('admin.costo.store');
         Route::get('costos/edit/{costo}', [CostoController::class, 'edit'])->name('admin.costo.edit');
         Route::post('/costos/update/{costo}', [CostoController::class, 'update'])->name('admin.costo.update');
         Route::post('costos/delete/{costo}', [CostoController::class, 'delete'])->name('admin.costo.delete');

        /* gestionar reevaluos */
         Route::get('/reevaluos', [RevaluoController::class, 'index'])->name('admin.reevaluo');
         Route::get('reevaluos/create/', [RevaluoController::class, 'create'])->name('admin.reevaluo.create');
         Route::post('/reevaluos/store', [RevaluoController::class, 'store'])->name('admin.reevaluo.store');
         Route::get('reevaluos/edit/{reevaluo}', [RevaluoController::class, 'edit'])->name('admin.reevaluo.edit');
         Route::post('/reevaluos/update/{reevaluo}', [RevaluoController::class, 'update'])->name('admin.reevaluo.update');
         Route::post('reevaluos/delete/{reevaluo}', [RevaluoController::class, 'delete'])->name('admin.reevaluo.delete');
         /* vistas auxiliares */
         Route::get('/reevaluos/{reevaluo}', [RevaluoController::class, 'facturar'])->name('admin.reevaluofacturar');


        /* gestionar reportes */
         Route::get('/reportes', [ReporteController::class, 'index'])->name('admin.reportes');
         Route::get('reportes/create/', [ReporteController::class, 'create'])->name('admin.reporte.create');
         Route::post('/reportes/store', [ReporteController::class, 'store'])->name('admin.reporte.store');
         Route::get('reportes/edit/{reporte}', [ReporteController::class, 'edit'])->name('admin.reporte.edit');
         Route::post('/reportes/update/{reporte}', [ReporteController::class, 'update'])->name('admin.reporte.update');
         Route::post('reportes/delete/{reporte}', [ReporteController::class, 'delete'])->name('admin.reporte.delete');

         /* gestionar informes */
        Route::get('/informes', [InformeController::class, 'index'])->name('admin.informe');
        Route::get('informes/create', [InformeController::class, 'create'])->name('admin.informe.create');
        Route::post('/informes/store', [InformeController::class, 'store'])->name('admin.informe.store');
        Route::get('informes/edit/{informe}', [InformeController::class, 'edit'])->name('admin.informe.edit');
        Route::post('/informes/update/{informe}', [InformeController::class, 'update'])->name('admin.informe.update');
        //Route::post('fotografias/delete/{fotografia}', [InformeController::class, 'delete'])->name('admin.fotografia.delete');
         //Route::resource('informe', InformeController::class);

        

    });


});

/* usuario normal */
/* rutas para la gestiones del usuario empleado */
Route::prefix('usuario')->group(function () {
    Route::get('/login', [UsuarioController::class, 'loginView'])->name('usuario.login.view')->middleware('guest:usuario');
    Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.login')->middleware('guest:usuario');

    Route::middleware(['auth:usuario'])->group(function(){
        Route::post('/logout',[UsuarioController::class,'logout'])->name('usuario.logout');
        Route::get('/menu',[UsuarioController::class, 'menu'])->name('usuario.menu');
        Route::get('/busqueda',[UsuarioController::class, 'busqueda'])->name('usuario.busqueda');

                                 /* gestionar usuarios */
        Route::get('/usuarios', [UsuarioController::class, 'index2'])->name('usuario.usuarios');

        /* gestionar inmuebles */
        Route::get('/inmuebles', [InmuebleController::class, 'index'])->name('usuario.inmueble');
        Route::get('inmuebles/create', [InmuebleController::class, 'create'])->name('usuario.inmueble.create');
        Route::post('/inmuebles/store', [InmuebleController::class, 'store'])->name('usuario.inmueble.store');
        Route::get('inmuebles/edit/{inmueble}', [InmuebleController::class, 'edit'])->name('usuario.inmueble.edit');
        Route::post('/inmuebles/update/{inmueble}', [InmuebleController::class, 'update'])->name('usuario.inmueble.update');
        Route::post('inmuebles/delete/{inmueble}', [InmuebleController::class, 'delete'])->name('usuario.inmueble.delete');

        /* gestionar fotografias */
        Route::get('/fotografias', [FotografiaController::class, 'index'])->name('usuario.fotografia');
        Route::get('fotografias/create', [FotografiaController::class, 'create'])->name('usuario.fotografia.create');
        Route::post('/fotografias/store', [FotografiaController::class, 'store'])->name('usuario.fotografia.store');
        Route::get('fotografias/edit/{fotografia}', [FotografiaController::class, 'edit'])->name('usuario.fotografia.edit');
        Route::post('/fotografias/update/{fotografia}', [FotografiaController::class, 'update'])->name('usuario.fotografia.update');
        Route::post('fotografias/delete/{fotografia}', [FotografiaController::class, 'delete'])->name('usuario.fotografia.delete');

    });


});
