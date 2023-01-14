<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\DetalleFormula;
use App\Models\DetalleInsumo;
use App\Models\Formula;
use App\Models\Grupo;
use App\Models\Inmueble;
use App\Models\Insumo;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use PhpParser\Node\Stmt\Label;

class AdministradorController extends Controller
{
    public function loginView()
    {
        return view('administrador.login');
    }

    public function login(Request $request)
    {
        $validatedDate = $request->validate([
            'email' => ['required', 'max:30', 'exists:usuarios,email'],
            'password' => ['required', 'min:8'],
        ]);
        $usuarios = Usuario::where('email', $request->email)->first();
        /*   $credentials = $request->only('a_acc', 'a_pass'); */
        // $usuario=Usuario::where('id_acceso',$acceso->id)->first();
        //$rol = Rol::where('id', $usuarios->id_rol)->first();
        /*  if(is_null($acceso)){
            return back()->withErrors(['error','el usuario no existe']);
        } */
        /* dd($usuarios); */
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        }
        /*  dd($usuarios); */
        return back()->withErrors(['error', 'la contraseña es incorrecta, o usted no es administrador']);
        /*  if (Auth::guard('acces')->attempt($credentials)) {
            return redirect()->route('admin.menu');
        }
        return back()->withErrors(['error','la contraseña es incorrecta']); */
    }

    public function menu(Request $request)
    {
        //$formulas = Formula::all();
        $usuarios = Usuario::all();
        /*        $contador_menu=contador::find('acceso.login');//seria mas correcto */
        $contador_menu = Contador::where('nombre', 'contador_menu')->first();
        /*   dd($contador_menu); */
        $contador_menu->update(['count' => $contador_menu->count + 1]);

        /* codigo para resolver el char barras */
        $puntos = [];
        $puntos2 = [];
        /*
        foreach ($formulas as $informe) {
            $puntos[] = ['name' => $informe->nombre, 'y' => floatval($informe->montolote), 'drilldown' => $informe->nombre];
        }
        */

        //$detalleformulas = DetalleFormula::where('id_formula', $request->id_formula)->get();
        //$nombre_formula= Formula::where('id',$request->id_formula)->first();
        /*
        foreach ($detalleformulas as $detalleformula) {
            $puntos2[] = ['name' => $detalleformula->insumo->nombre, 'y' => floatval($detalleformula->cantidad*$detalleformula->insumo->detalleinsumo->precio), 'drilldown' => $detalleformula->insumo->nombre];
        }


        $puntos3=[];
        $insumos = insumo::all();
        foreach ($insumos as $insumo) {
            $puntos3[] = ['name' => $insumo->nombre, 'y' => floatval($insumo->detalleinsumo->precio), 'drilldown' => $insumo->nombre];
        }
        */
        /*    dd($detalleformulas); */

        /**
         * ChartJs - Inmubles por grupo
         */
        $inmuebles = Inmueble::all();
        $grupos = Grupo::all();

        $dGrupo = [];

        foreach ($grupos as $key => $grupo) {
            $dGrupo['id'][] = $grupo->id;
            $dGrupo['label'][] = $grupo->nombre;
        }

        $idGrupos = $dGrupo['id'];

        foreach ($idGrupos as $key => $grupo) {
            $dGrupo['data'][] = Inmueble::where('idGrupo', $grupo)->count();
        }
        //  $dGrupo['data'] = json_encode($dGrupo);
        // dd($grupos);

        // ChartJS

        return view('administrador.menu', compact('contador_menu', 'usuarios', 'inmuebles', 'grupos', 'dGrupo'));
    }

    /* public function costo_formula(Request $request)
    {
        $detalleformulas = DetalleFormula::where('id_formula', $request->id_formula)->get();
        dd($detalleformulas);
        return redirect()->route('admin.menu');
    } */

    public function estadisticas(Request $request)
    {
        /**
         * ChartJs - Inmubles por grupo
         */
        $inmuebles = Inmueble::all();
        $grupos = Grupo::all();

        $label = [];
        $data = [];

        $idGrupos = [];
        foreach ($grupos as $key => $grupo) {
            $label[] = $grupo->nombre;
            $idGrupos[] = $grupo->id;
        }
        // dd($label);
        foreach ($idGrupos as $key => $id) {
            $data[] = Inmueble::where('idGrupo', $id)->count();
        }
        return view('administrador.estadisticas.estadisticas', ['label' => $label, 'data' => $data]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('index');
    }

    public function busqueda(Request $request)
    {
        //return $request;
        if ($request->busqueda) {
            $busqueda = strtoupper($request->busqueda); //"USUARIO"
            $text = trim($request->busqueda); //"usuario"
            $result = [];

            //si escribe: usuario listar
            $pos = strpos($text, 'usuario'); //0
            if ($pos !== false) {
                $result['Listar todos los usuario'] = route('admin.usuarios');
                $pos = strpos($text, 'registrar'); //false
                /*  dd($pos); */
                if ($pos !== false) {
                    $result['Registrar algun usuario'] = route('admin.usuario.create');
                }
            }

            //si escribe: casa registrar
            $pos = strpos($text, 'casa');
            if ($pos !== false) {
                $result['Listar todas las casas'] = route('casa.listar');
                $pos = strpos($text, 'registrar');
                if ($pos !== false) {
                    $result['Añadir una casa (Terreno)'] = route('casa.registrar');
                }
            }

            //si escribe: comunicado registrar
            $pos = strpos($text, 'comunicado');
            if ($pos !== false) {
                $result['Listar todos los comunicados'] = route('comunicado.listar');
                $pos = strpos($text, 'registrar');
                if ($pos !== false) {
                    $result['Crear un comunicado'] = route('comunicado.registrar');
                }
            }

            //si escribe: acta
            $pos = strpos($text, 'acta');
            if ($pos !== false) {
                $result['Crear un acta'] = route('acta.registrar');
            }


            if (Auth::user()->rol->r_tip == 'administrador') {
                //si escribe: acceso
                $pos = strpos($text, 'acceso');
                if ($pos !== false) {
                    $result['Listar todos los login de usuarios'] = route('acceso.listar');
                }

                //si escribe: mensaje
                $pos = strpos($text, 'mensaje');
                if ($pos !== false) {
                    $result['Listar todos los mensajes'] = route('listar.mensaje');
                }

                //si escribe: condominio regitrar
                $pos = strpos($text, 'condominio');
                if ($pos !== false) {
                    $result['Listar todos los condominio'] = route('condominio.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['Registrar un condominio'] = route('condominio.registrar');
                    }
                }

                //si escribe: servicio regitrar
                $pos = strpos($text, 'servicio');
                if ($pos !== false) {
                    $result['Listar todos los servicios'] = route('servicio.listar');
                    $pos = strpos($text, 'registrar');
                    if ($pos !== false) {
                        $result['Registrar un servicio'] = route('servicio.registrar');
                    }
                }

                //si escribe: alta
                $pos = strpos($text, 'alta');
                if ($pos !== false) {
                    $result['Listar Servicios Activos'] = route('servicio.listar.alta');
                }

                //si escribe: baja
                $pos = strpos($text, 'baja');
                if ($pos !== false) {
                    $result['Listar Servicios Desactivos'] = route('servicio.listar.baja');
                }
            }

            if (auth::user()->rol->r_tip == 'administrador' || (auth::user()->rol->r_tip == 'empleado')) {
                $pos = strpos($text, 'inquilino');
                if ($pos !== false) {
                    $result['Listar todos tus inquilinos'] = route('usuario.listar.inquilinos');
                }
            }

            //si escribe: reserva regitrar
            $pos = strpos($text, 'reserva');
            if ($pos !== false) {
                $result['Listar todas las reservas'] = route('reserva.listar');
                $pos = strpos($text, 'registrar');
                if ($pos !== false) {
                    $result['Registrar una reserva'] = route('reserva.registrar');
                }
            }

            //si escribe perfil
            $pos = strpos($text, 'perfil');
            if ($pos !== false) {
                $result['Mostrar tu perfil'] = route('usuario.perfil');
            }

            //si escribe: mensaje regitrar
            $pos = strpos($text, 'mensaje');
            if ($pos !== false) {
                $result['Listar todos tus mensajes'] = route('listar.mensaje.usuario');
                $pos = strpos($text, 'registrar');
                if ($pos !== false) {
                    $result['Registrar un mensaje'] = route('mensaje.registrar');
                }
            }

            if (Auth::user()->rol->r_tip == 'administrador' || Auth::user()->rol->r_tip == 'empleado') {
                //si escribe: pagar listar
                $pos = strpos($text, 'pagar');
                if ($pos !== false) {
                    $result['Listar todos tus Servicios'] = route('pagos.listar');
                    $pos = strpos($text, 'listar');
                    if ($pos !== false) {
                        $result['Listar tus servicios pagados'] = route('pagos.listar.pagados');
                    }
                }
            }

            return view('administrador.menu', compact('result', 'text', 'busqueda'));
        }
    }
}
