<?php

namespace App\Http\Controllers;

//use App\Models\Presupuesto;
use App\Http\Requests\StorePresupuestoRequest;
use App\Http\Requests\UpdatePresupuestoRequest;
use App\Models\Inmueble;
use App\Models\Reevaluo;
use App\Models\Contador;
use Illuminate\Http\Request;

class RevaluoController extends Controller
{

    public function index()
    {
        $reevaluos=Reevaluo::all();
        $contador_reevaluo=Contador::where('nombre',"contador_reevaluo")->first();
        $contador_reevaluo->update(['count'=>$contador_reevaluo->count+1]);
        return view('administrador.reevaluo.index', compact('reevaluos','contador_reevaluo'));
    }

    public function create()
    {
        $reevaluos=Reevaluo::all();
        $inmuebles=Inmueble::all();
        return view('administrador.reevaluo.create',compact('reevaluos','inmuebles'));
    }

    public function store(Request $request)
    {
        $sumador=0; $total=0;
        $validateData=$request->validate([
            'descripcion'=>['required'],
            'fechaRevaluo'=>['required'],
            'costo'=>['required'],
            'costoActualizado'=>['required'],
            'depreciacionAcumulada'=>['required'],
            'valorNeto'=>['required'],
            'idInmueble'=>['required'],
        ]);

        //$validateData['montototal']=($costo->total+$formula_costo->montolote) * $request->cantidadlote;
        Reevaluo::create($validateData);
        return redirect()->route('admin.reevaluo');
    }

    public function show(Reevaluo $reevaluo)
    {
        //
    }

    public function edit(Reevaluo $reevaluo)
    {
       $inmuebles=Inmueble::all();
        return view('administrador.reevaluo.edit',compact('reevaluo', 'inmuebles'));
    }

    public function update(Request $request, Reevaluo $reevaluo)
    {
        $sumador=0; $total=0;
        $validateData=$request->validate([
            'descripcion'=>['required'],
            'fechaRevaluo'=>['required'],
            'costo'=>['required'],
            'costoActualizado'=>['required'],
            'depreciacionAcumulada'=>['required'],
            'valorNeto'=>['required'],
            'idInmueble'=>['required'],
        ]);

        //$validateData['montototal']=($costo->total+$formula_costo->montolote) * $request->cantidadlote;
        $reevaluo->update($validateData);
        return redirect()->route('admin.reevaluo');
    }

    public function delete(Reevaluo $reevaluo)
    {
        $reevaluo->delete();
        return redirect()->route('admin.reevaluo');
    }

    /* metodso auxiliares */
    public function facturar(Reevaluo $reevaluo){
        return view('administrador.reevaluo.facturar',compact('reevaluo'));
    }
}
