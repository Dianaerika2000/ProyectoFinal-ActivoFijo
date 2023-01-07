<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados=Estado::all();
        $contador_estado=Contador::where('nombre',"contador_estado")->first();
        /* dd($contador_insumo); */
        $contador_estado->update(['count'=>$contador_estado->count+1]);
        return view('administrador.estado.index',compact('estados','contador_estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.estado.create');
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
            'nombre'=>['required','max:100'],
            'descripcion'=>['required','max:100'],
        ]);
        /*
        $asignarId= Estado::select('id')->orderBy('id', 'desc')->first();
        Validar que no haya dos nombre iguales
        $consulta=Estado::where('nombre',$request->nombre)->where('id','!=',$request->id)->first();
        if(!is_null($consulta)){
            return back()->withErrors(['error','el nombre del estado introducido ya existe']);

        }
        */
        //Estado::create($validateData);
        $estado = new Estado($validateData);
        //$estado->nombre=$request->get('nombre');
        //$estado->id=$asignarId->id+1;
        $estado->save();
        return redirect()->route('admin.estado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('administrador.estado.edit',compact('estado'));
    }

    public function update(Request $request, Estado $estado)
    {
        $validateData=$request->validate([
            'nombre'=>['required','max:100'],
            'descripcion'=>['required','max:100'],

        ]);
        /* validar que no haya dos nombre iguales
        $consulta=Estado::where('nombre',$request->nombre)->where('id','!=',$estado->id)->first();
        if(!is_null($consulta)){
            return back()->withErrors(['error','el nombre del estado introducido ya existe']);
        }
        */
        //$consulta->update($validateData);
        $estado->nombre=$request->get('nombre');
        $estado->descripcion=$request->get('descripcion');
        $estado->save();
        return redirect()->route('admin.estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        //
    }

    public function delete(Estado $estado)
    {
        $estado->delete();
        return redirect()->route('admin.estado');
    }
}
