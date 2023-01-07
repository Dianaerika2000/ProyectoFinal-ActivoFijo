<?php

namespace Database\Seeders;

use App\Models\DetalleInsumo;
use Illuminate\Database\Seeder;

class DetalleInsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleInsumo::create([
            'id_insumo'=>1,
            'fecha'=>'2022-05-12',
            'precio'=>'20',
        ]);
        DetalleInsumo::create([
            'id_insumo'=>2,
            'fecha'=>'2022-05-12',
            'precio'=>'10.5',
        ]);
        DetalleInsumo::create([
            'id_insumo'=>3,
            'fecha'=>'2022-05-12',
            'precio'=>'36.5',
        ]);
        DetalleInsumo::create([
            'id_insumo'=>4,
            'fecha'=>'2022-05-12',
            'precio'=>'3.8',
        ]);
        DetalleInsumo::create([
            'id_insumo'=>4,
            'fecha'=>'2022-05-15',
            'precio'=>'3.9',
        ]);
        DetalleInsumo::create([
            'id_insumo'=>5,
            'fecha'=>'2022-05-12',
            'precio'=>'25',
        ]);
    }
}
