<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Fotografia;
use App\Models\Inmueble;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class FotografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografias=Fotografia::all();
        $inmuebles = Inmueble::all();
        $contador_fotografia=Contador::where('nombre',"contador_fotografia")->first();
        /* dd($contador_insumo); */
        $contador_fotografia->update(['count'=>$contador_fotografia->count+1]);
        return view('administrador.fotografia.index',compact('fotografias','inmuebles','contador_fotografia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotografias=Fotografia::all();
        $inmuebles = Inmueble::all();
        $fotografia= new Fotografia;
        return view('administrador.fotografia.create',compact('fotografia','fotografias','inmuebles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validar el formulario
        $data = $request->validate([
            'detalle' => 'required',
            'url' => 'required',
            'fechaSubida'=>'required',
            'idInmueble' => 'required',
        ],[
            'idInmueble.required'=>'El campo inmueble es obligatorio.',
            'detalle.required'=>'El campo detalle es obligatorio.',
            'url.required'=>'El campo imagen es obligatorio.',
            'fechaSubida.required'=>'El campo fecha es obligatorio.',
        ]);

        $foto = new Fotografia($data);

        if ($request->hasFile('url')){
            $file=$request->file('url');
            $destinationPath='images/photos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('url')->move($destinationPath,$filename);
            $foto->url=$destinationPath . $filename;
        }
        $foto->idInmueble=$request->get('idInmueble');
        $foto->detalle=$request->get('detalle');
        $foto->fechaSubida=$request->get('fechaSubida');

        //Crear al producto
        //if($request->hasFile('image')){
        //    $product->image=$request->file('image')->store('public/products');
        //}
        //$asignarId= Fotografia::select('id')->orderBy('id', 'desc')->first();

        //00001
        //$foto = new Fotografia($data);


        //$foto->id=$asignarId->id+1;
        /*
        if (($asignarId->id+1)/2 == 2) {
            $foto->ruta = '03.jpeg';
        }else{
            $foto->ruta='04.jpeg';
        }
        */
        /*
        if(Input::hasFile('ruta')){
            $file=Input::file('ruta');
            $file->move(public_path().'/UsuarioTemplate/img',$file->getClientOriginalName());
            $foto->ruta=$file->getClientOriginalName();
        }

        if($request->hasFile('ruta')){
            $foto->ruta=$request->file('ruta')->store('public/UsuarioTemplate/img/');
        }
        */


        $foto->save();
        return redirect()->route('admin.fotografia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografia $fotografia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotografia $fotografia)
    {
        $inmuebles=Inmueble::all();
        return view('administrador.fotografia.edit',compact('fotografia','inmuebles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotografia $fotografia)
    {
        //validar el formulario

        $request->validate([
            'detalle' => 'required',
            'url' => 'required',
            'fechaSubida'=>'required',
            'idInmueble' => 'required',
        ],[
            'idInmueble.required'=>'El campo inmueble es obligatorio.',
            'detalle.required'=>'El campo detalle es obligatorio.',
            'url.required'=>'El campo imagen es obligatorio.',
            'fechaSubida.required'=>'El campo fecha es obligatorio.',
        ]);

        if ($request->hasFile('url')){
            $file=$request->file('url');
            $destinationPath='images/photos/';
            $filename=time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('url')->move($destinationPath,$filename);
            $fotografia->url=$destinationPath . $filename;
        }
        $fotografia->idInmueble=$request->get('idInmueble');
        $fotografia->detalle=$request->get('detalle');
        $fotografia->fechaSubida=$request->get('fechaSubida');
        $fotografia->save();
        return redirect()->route('admin.fotografia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografia $fotografia)
    {
        //
    }
    public function delete(Fotografia $fotografia)
    {
        $fotografia->delete();
        return redirect()->route('admin.fotografia');
    }
}
