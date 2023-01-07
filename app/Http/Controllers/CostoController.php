<?php

namespace App\Http\Controllers;

use App\Models\Costo;
use App\Http\Requests\StoreCostoRequest;
use App\Http\Requests\UpdateCostoRequest;
use App\Models\Contador;
use App\Models\CostoFormula;
use App\Models\DetalleCosto;
use App\Models\DetalleFormula;
use App\Models\DetalleInsumo;
use App\Models\Formula;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CostoController extends Controller
{
    public function index()
    {
        $sum = 0;
        $costos = Costo::all();

        /* nesesito calcular los costos totales */
        $detallecostos=DetalleCosto::all();
        $contador_costo=Contador::where('nombre',"contador_costo")->first();
        $contador_costo->update(['count'=>$contador_costo->count+1]);
        return view('administrador.costo.index', compact('costos', 'detallecostos','contador_costo'));
    }

    public function create()
    {
        $formulas = Formula::all();
        return view('administrador.costo.create', compact('formulas'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'concepto' => ['required', 'max:100'],
        ]);
        $validateData['total']=0;
        /* validar para que no haya dos conceptos con el mismo nombre */
        $costo_concepto = Costo::where('concepto', $request->concepto)->where('id', '!=', $request->id)->first();
        if (!is_null($costo_concepto)) {
            return back()->withErrors(['error', 'el concepto ingresado ya existe en otro costo']);
        }
        Costo::create($validateData);

        /* ahora toca introducir ese costo en costoformula */
      /*   $costo_ultimo = Costo::select('id')->latest()->first(); //extrae el ultimo registro de la tabla
        $validateData2 = $request->validate([
            'id_formula' => ['required', 'max:100'],
        ]);
        $validateData2['id_costo'] = $costo_ultimo->id;
        CostoFormula::create($validateData2);
        */
        return redirect()->route('admin.costos');
    }


    public function show(Costo $costo)
    {
        //
    }


    public function edit(Costo $costo)
    {
        return  view('administrador.costo.edit', compact('costo'));
    }

    public function update(Request $request, Costo $costo)
    {
        $validateData = $request->validate([
            'concepto' => ['required', 'max:100'],
        ]);
        /* validar para que no haya dos conceptos con el mismo nombre */
        $costo_concepto = Costo::where('concepto', $request->concepto)->where('id', '!=', $costo->id)->first();
        if (!is_null($costo_concepto)) {
            return back()->withErrors(['error', 'el concepto ingresado ya existe en otro costo']);
        }
        $costo->update($validateData);
        return redirect()->route('admin.costos');
    }

    public function delete(Costo $costo)
    {
        $costo->delete();
        return redirect()->route('admin.costos');
    }
}
