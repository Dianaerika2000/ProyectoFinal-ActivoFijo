<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=Grupo::all();
        $contador_grupo=Contador::where('nombre',"contador_grupo")->first();
        /* dd($contador_insumo); */
        $contador_grupo->update(['count'=>$contador_grupo->count+1]);
        return view('administrador.grupo.index',compact('grupos','contador_grupo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nombre'=>['required','max:100']
        ]);
        $grupo = new Grupo($validateData);
        $grupo->save();
        return redirect()->route('admin.grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        return view('administrador.grupo.edit',compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $validateData=$request->validate([
            'nombre'=>['required','max:100'],

        ]);
        /* validar que no haya dos nombre iguales
        $consulta=Estado::where('nombre',$request->nombre)->where('id','!=',$estado->id)->first();
        if(!is_null($consulta)){
            return back()->withErrors(['error','el nombre del estado introducido ya existe']);
        }
        */
        //$consulta->update($validateData);
        $grupo->nombre=$request->get('nombre');
        $grupo->save();
        return redirect()->route('admin.grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }

    public function delete(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('admin.grupo');
    }
}
