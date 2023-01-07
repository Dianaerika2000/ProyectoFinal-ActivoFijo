<?php

namespace Database\Seeders;

use App\Models\DetalleFormula;
use Illuminate\Database\Seeder;

class DetalleFormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleFormula::create([
            'id_insumo'=>1,
            'id_formula'=>1,
            'cantidad'=>30,
        ]);
        DetalleFormula::create([
            'id_insumo'=>2,
            'id_formula'=>1,
            'cantidad'=>12,
        ]);
        DetalleFormula::create([
            'id_insumo'=>3,
            'id_formula'=>1,
            'cantidad'=>25.5,
        ]);
        DetalleFormula::create([
            'id_insumo'=>4,
            'id_formula'=>1,
            'cantidad'=>30,
        ]);

    }
}
