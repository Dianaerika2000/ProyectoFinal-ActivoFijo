<?php

namespace Database\Seeders;

use App\Models\Contador;
use Illuminate\Database\Seeder;

class ContadorSeeder extends Seeder
{
    public function run()
    {
        Contador::create([
            'nombre'=>'contador_menu',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_usuario',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_index',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_responsable',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_estado',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_grupo',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_direccion',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_inmueble',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_fotografia',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_reevaluo',
            'count'=>0,
        ]);
        Contador::create([
            'nombre'=>'contador_informe',
            'count'=>0,
        ]);
    }
}
