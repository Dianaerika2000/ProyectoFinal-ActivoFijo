<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $contador_index=Contador::where('nombre','contador_index')->first();
        $contador_index->update(['count'=>$contador_index->count+1]);
        return view('welcome',compact('contador_index'));
    }
}
