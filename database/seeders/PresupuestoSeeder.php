<?php

namespace Database\Seeders;

use App\Models\Presupuesto;
use Illuminate\Database\Seeder;

class PresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presupuesto::create([
            'id_usuario'=>1,
            'id_costo'=>1,
            'fecha'=>'2022-05-25',
            'nombre'=>'reevaluo produccion I',
            'cantidadlote'=>1,
            'montototal'=>2227.88,
            'estado'=>'aprobado',
        ]);
    }
}
