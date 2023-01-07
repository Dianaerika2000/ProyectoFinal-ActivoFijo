<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use App\Models\Usuario;
//use App\Models\Role;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller

{
    /* ..................................................................
    ............................administrar los usuarios....................
    ............................................................................
    */
    public function index()
    {
        $usuarios = Usuario::all();
        $contador_usuario=Contador::where('nombre',"contador_usuario")->first();
        $contador_usuario->update(['count'=>$contador_usuario->count+1]);
        return view('administrador.usuarios.index',compact('usuarios','contador_usuario'));
    }
    public function create()
    {
        $roles = Role::all();
        $usuarios = Usuario::all();
        return view('administrador.usuarios.create', compact('roles','usuarios'));
    }
    public function store(Request $request){

        $validateData=$request->validate([
            'nombre'=>['required','max:50'],
            'apellido'=>['required','max:50'],
            'ci'=>['required','max:20'],
            'genero'=>['required','max:1'],
            'direccion'=>['required'],
            'celular'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'nacionalidad'=>['required'],
        ]);

        /* debemos de autenticar las contraseñas que sean iguales */
        if($request->password!=$request->password1){
            return back()->withErrors(['error','las contraseñas no coinciden']);
        }
        $validateData['password']=Hash::make($request->password);
        $usuario = Usuario::create($validateData);

        $usuario->roles()->sync($request->roles);
        return redirect()->route('admin.usuarios');
    }
    public function edit(Usuario $usuario){

        $roles=Role::all();
        //$contraseña= $usuario->getPassword($usuario->password);
        return view('administrador.usuarios.edit',compact('roles','usuario'));
    }
    public function update(Request $request, Usuario $usuario){
        //return dd($request);

        $validateData=$request->validate([
            'nombre'=>['required','max:50'],
            'apellido'=>['required','max:50'],
            'ci'=>['required','max:20'],
            'genero'=>['required','max:12'],
            'direccion'=>['required'],
            'celular'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
            'nacionalidad'=>['required'],
        ]);
        if($request->password!=$request->password1){
            return back()->withErrors(['Error','Las contraseñas no coinciden']);
        }
        if(!is_null($request->password)){
            $validateData['password']=Hash::make($request->password);
        }
        /* que pasa si alguien introduce una email que ya existe?? */
        $usuario_email=Usuario::where('email',$request->email)->where('id','!=',$usuario->id)->first();
        if(!is_null($usuario_email)){
            return back()->withErrors(['Error','El email introducido ya existe en otra cuenta']);
        }
        $validateData['tipo_usuario']=$request->roles;
        $usuario->update($validateData);

        $usuario->roles()->sync($request->roles);
        return redirect()->route('admin.usuarios',$usuario)->with('info','Se asignó los cambios');
    }


    public function delete(Usuario $usuario){
        $usuario->delete();
        return redirect()->route('admin.usuarios');
    }

    /* ........................................................................................................
.........................................................................................................
........................................................................................................*/

/* para el usuario que se vaya a loguear */
public function loginView(){
    return view('usuario.login');
}

public function login(Request $request){
    $validatedData = $request->validate([
        'email' => ['required', 'max:30','exists:usuario,email'],
        'password' => ['required']
    ]);
   /*  $usuario=Usuario::where('email', $request->email)->first();
    $rol=Role::where('id',$usuario->id_rol)->first(); */
    if(Auth::guard('usuario')->attempt(['email'=> $request->email, 'password'=>$request->password,'id_rol'=>2])){
        return redirect()->route('usuario.menu');
    }
    return back()->withErrors(['error'=>'la contraseña es incorrecta o usted no es un usuario ordinario']);
}

public function menu(){
    $usuarios=Usuario::all();
    $contador_menu=Contador::where('nombre',"contador_menu")->first();
    $contador_menu->update(['count'=>$contador_menu->count+1]);

    $puntos2=[];
    $insumos = insumo::all();
    foreach ($insumos as $insumo) {
        $puntos2[] = ['name' => $insumo->nombre, 'y' => floatval($insumo->detalleinsumo->precio), 'drilldown' => $insumo->nombre];
    }
    return view('usuario.menu',compact('usuarios','contador_menu'),["costo_formulita"=>json_encode($puntos2)]);
}

public function logout(){
    Auth::guard('usuario')->logout();
  /*   return redirect()->route('usuario.login.view'); */
    return redirect()->route('index');
}
public function index2()
    {
        $usuarios = Usuario::all();
        $contador_usuario=Contador::where('nombre',"contador_usuario")->first();
        $contador_usuario->update(['count'=>$contador_usuario->count+1]);
        return view('usuario.usuarios.index',compact('usuarios','contador_usuario'));
    }
}
