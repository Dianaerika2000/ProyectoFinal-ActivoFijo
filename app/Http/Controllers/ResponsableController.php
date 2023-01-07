<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables=Responsable::all();
        $contador_responsable=Contador::where('nombre',"contador_responsable")->first();
        /* dd($contador_insumo); */
        $contador_responsable->update(['count'=>$contador_responsable->count+1]);
        return view('administrador.responsable.index',compact('responsables','contador_responsable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.responsable.create');
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
            'codigoAsignado'=>['required','max:100'],
            'nombre'=>['required','max:100'],
            'Apellido'=>['required','max:100'],
        ]);
        //$asignarId= Responsable::select('cod_adm')->orderBy('cod_adm', 'desc')->first();
        /* validar que no haya dos nombre iguales
        $consulta=Responsable::where('nombre',$request->nombre)->where('cod_adm','!=',$request->cod_adm)->first();
        if(!is_null($consulta)){
            return back()->withErrors(['error','el nombre introducido ya existe']);

        }
        */
        //Responsable::create($validateData);
        DB::table('responsables')->insert(
            array(
                'codigoAsignado'     =>   $request->get('codigoAsignado'),
                'nombre'   =>   $request->get('nombre'),
                'Apellido'   =>   $request->get('Apellido')
            )
        );

        //$estado = new Responsable($validateData);
        //$estado->nombre=$request->get('nombre');
        //$request->cod_adm=$request->get('cod_adm');
        //$request->nombre=$request->get('nombre');
        //$request->save();
        return redirect()->route('admin.responsable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        return view('administrador.responsable.edit',compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsable $responsable)
    {
        $validateData=$request->validate([
            'codigoAsignado'=>['required','max:100'],
            'nombre'=>['required','max:100'],
            'Apellido'=>['required','max:100'],
        ]);
        //$asignarId= Responsable::select('cod_adm')->orderBy('cod_adm', 'desc')->first();
        /* validar que no haya dos nombre iguales */
        /*
        $consulta=Responsable::where('nombre',$request->nombre)->where('codigoAsignado','!=',$request->codigoAsignado)->first();
        if(!is_null($consulta)){
            return back()->withErrors(['error','El nombre introducido ya existe']);

        }*/
        $responsable->update($validateData);

        //$estado->nombre=$request->get('nombre');
        //$estado->save();
        return redirect()->route('admin.responsable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsable $responsable)
    {
        //
    }
    public function delete(Responsable $responsable)
    {
        $responsable->delete();
        //DB::table('responsable')->delete($responsable);
        //DB::table('responsable')->where('cod_adm', '=', $responsable)->delete();

        return redirect()->route('admin.responsable');
    }
}
