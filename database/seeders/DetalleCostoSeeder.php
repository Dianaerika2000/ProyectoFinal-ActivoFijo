<?php

namespace Database\Seeders;

use App\Models\DetalleCosto;
use Illuminate\Database\Seeder;

class DetalleCostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleCosto::create([
            'id_costo'=>1,
            'descripcion'=>'costos de mano de obra',
            'fecha'=>'2022-05-16',
            'monto'=>38.82,
        ]);

        DetalleCosto::create([
            'id_costo'=>1,
            'descripcion'=>'costos indirectos de fabricacion ',
            'fecha'=>'2022-05-16',
            'monto'=>153.30,
        ]);

        DetalleCosto::create([
            'id_costo'=>1,
            'descripcion'=>'gastos operativos',
            'fecha'=>'2022-05-16',
            'monto'=>265.01,
        ]);
    }
}
