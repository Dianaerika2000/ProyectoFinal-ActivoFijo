<?php

namespace Database\Seeders;

use App\Models\Insumo;
use Illuminate\Database\Seeder;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Insumo::create([
            'nombre'=>'maracuya bola',
            'um'=>'kg',
        ]);
        Insumo::create([
            'nombre'=>'maracuya semilla',
            'um'=>'kg',
        ]);
        Insumo::create([
            'nombre'=>'espesante',
            'um'=>'kg',
        ]);
        Insumo::create([
            'nombre'=>'azúcar',
            'um'=>'kg',
        ]);
        Insumo::create([
            'nombre'=>'bolsa plástica',
            'um'=>'kl',
        ]);
    }
}
