<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Direccion;
use App\Models\Fotografia;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones=Direccion::all();
        $contador_direcciones=Contador::where('nombre',"contador_direccion")->first();
        /* dd($contador_insumo); */
        $contador_direcciones->update(['count'=>$contador_direcciones->count+1]);
        return view('administrador.direccion.index',compact('direcciones','contador_direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.direccion.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'ubicacion' => 'required',
        ]);
        $ubicacion = new Direccion();

        $ubicacion->ubicacion = $request->get('ubicacion');
        $ubicacion->latitud = $request->get('lat');
        $ubicacion->longitud = $request->get('lng');
        $ubicacion->descripcion = $request->get('descripcion');
        $ubicacion->save();

        return redirect()->route('admin.direccion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        return view('administrador.direccion.edit',compact('direccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion)
    {
        request()->validate([
            'ubicacion' => 'required',
        ]);

        $direccion->ubicacion = $request->get('ubicacion');
        $direccion->latitud = $request->get('lat');
        $direccion->longitud = $request->get('lng');
        $direccion->save();
        return redirect()->route('admin.direccion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion)
    {
        //
    }

    public function delete(Direccion $direccion)
    {
        $direccion->delete();
        return redirect()->route('admin.direccion');
    }
}
