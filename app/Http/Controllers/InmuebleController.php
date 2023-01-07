<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Direccion;
use App\Models\Estado;
use App\Models\Grupo;
use App\Models\Inmueble;
use App\Models\Responsable;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados=Estado::all();
        $direcciones=Direccion::all();
        $grupos=Grupo::all();
        $usuarios=Usuario::all();
        $responsables=Responsable::all();
        $inmuebles=Inmueble::all();
        $contador_inmueble=Contador::where('nombre',"contador_inmueble")->first();
        /* dd($contador_insumo); */
        $contador_inmueble->update(['count'=>$contador_inmueble->count+1]);
        return view('administrador.inmueble.index',compact('estados','direcciones','grupos','usuarios','responsables','inmuebles','contador_inmueble'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estado::all();
        $direcciones=Direccion::all();
        $grupos=Grupo::all();
        $usuarios=Usuario::all();
        $responsables=Responsable::all();
        $inmuebles=Inmueble::where('idGrupo',2)->get();
        return view('administrador.inmueble.create',compact('estados','direcciones','grupos','usuarios','responsables','inmuebles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $validateData=$request->validate([
            'codigo'=>['required','max:100'],
            'descripcion'=>['required','max:100'],
        ]);
        //$asignarId= Inmueble::select('codigo')->orderBy('codigo', 'desc')->first();
        /* validar que no haya dos nombre iguales */

        //Estado::create($validateData);
        /*
        $estado = new Inmueble($validateData);
        $estado->codigo=$request->get('codigo');
        $estado->descripcion=$request->get('descripcion');
        $estado->cod_asignacion=$request->get('cod_asignacion');
        $estado->tipo=$request->get('tipo');
        $estado->id_usuario_fk=$request->get('id_usuario_fk');
        $estado->id_responsable_fk=$request->get('id_responsable_fk');
        $estado->id_estado_fk=$request->get('id_estado_fk');
        $estado->id_direccion_fk=$request->get('id_direccion_fk');
        $estado->id_grupo_fk=$request->get('id_grupo_fk');
        $estado->save();
        */
        if($request->idInmueble!=null){
            $CodigoInmueble=Inmueble::where('id',$request->idInmueble)->first();
            $CodigoInmueble=Str::limit($CodigoInmueble->codigo, 5,'');
        }else{
            $CodigoInmueble=null;
        }

        if ($request->get('idGrupo')!=2){
            $CodigoIDInmueble=$request->get('idInmueble');
        }else{
            $CodigoIDInmueble=null;
        }

        if($request->idDireccion==null AND $request->ubicacion!=null){
            $ubicacion = new Direccion();
            $ubicacion->ubicacion = $request->get('ubicacion');
            $ubicacion->latitud = $request->get('lat');
            $ubicacion->longitud = $request->get('lng');
            $ubicacion->descripcion = $request->get('descripcion');
            $ubicacion->save();
            $ubicacion=$ubicacion->id;
        }else{
            $ubicacion=$request->get('idDireccion');
        }



        DB::table('inmuebles')->insert(
            array(
                'codigo'     =>   $CodigoInmueble .''. $request->get('codigo'),
                'descripcionGlosa'   =>   $request->get('descripcionGlosa'),
                'fechaAdquisicion'   =>   $request->get('fechaAdquisicion'),
                'monto'   =>   $request->get('monto'),
                'idUsuario'   =>   Auth::user()->id,
                'idResponsable'   =>   $request->get('idResponsable'),
                'idEstado'   =>   $request->get('idEstado'),
                'idGrupo'   =>   $request->get('idGrupo'),
                'idDireccion'   =>   $ubicacion,
                'idInmueble'   =>   $CodigoIDInmueble,
            )
        );

        /*
        $inmueble = new Inmueble($request);
        $inmueble ->codigo=$request->input('codigo');
        $inmueble ->descripcionGlosa=$request->input('descripcionGlosa');
        $inmueble ->fechaAdquisicion=$request->input('fechaAdquisicion');
        $inmueble ->idUsuario=1;//auth()->user()->id; //Auth::user()->id;
        $inmueble ->idResponsable=$request->input('idResponsable');
        $inmueble ->idEstado=$request->input('idEstado');
        $inmueble ->idGrupo=$request->input('idGrupo');
        $inmueble ->idDireccion=$request->input('idDireccion');
        if($request->input('idGrupo')!=2){
            $inmueble ->idInmueble = $request->input('idInmueble');
        }
        $inmueble ->save();
        */

        return redirect()->route('admin.inmueble');
    }

    public function delete(Inmueble $inmueble)
    {
        $inmueble->delete();
        return redirect()->route('admin.inmueble');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmueble $inmueble)
    {
        $estados=Estado::all();
        $direcciones=Direccion::all();
        $grupos=Grupo::all();
        $usuarios=Usuario::all();
        $responsables=Responsable::all();
        return view('administrador.inmueble.edit',compact('estados','direcciones','grupos','usuarios','responsables','inmueble'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmueble $inmueble)
    {
/*
        $inmueble = Inmueble::findOrFail($inmueble);
        $inmueble->descripcionGlosa = $request->input('descripcionGlosa');
        $inmueble->fechaAdquisicion = $request->input('fechaAdquisicion');
        $inmueble->monto = $request->input('monto');
        $inmueble->idUsuario = Auth::user()->id;
        $inmueble->idResponsable = $request->input('idResponsable');
        $inmueble->idEstado = $request->input('idEstado');
        $inmueble->idDireccion = $request->input('idDireccion');
        $inmueble->save();
*/

        if($request->idDireccion==null AND $request->ubicacion!=null){
            $ubicacion = new Direccion();
            $ubicacion->ubicacion = $request->get('ubicacion');
            $ubicacion->latitud = $request->get('lat');
            $ubicacion->longitud = $request->get('lng');
            $ubicacion->descripcion = $request->get('descripcion');
            $ubicacion->save();
        }else{
            $ubicacion=$request->get('idDireccion');
        }

        DB::table('inmuebles')->where('id','=',$inmueble->id)->update(
            array(
                'descripcionGlosa'   =>   $request->get('descripcionGlosa'),
                'fechaAdquisicion'   =>   $request->get('fechaAdquisicion'),
                'monto'   =>   $request->get('monto'),
                'idUsuario'   =>   Auth::user()->id,
                'idResponsable'   =>   $request->get('idResponsable'),
                'idEstado'   =>   $request->get('idEstado'),
                'idDireccion'   =>  $ubicacion,
            )
        );
        return redirect()->route('admin.inmueble',$inmueble);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmueble  $inmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }
}
