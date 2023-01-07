<?php

namespace Database\Seeders;

use App\Models\CostoFormula;
use Illuminate\Database\Seeder;

class CostoFormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CostoFormula::create([
            'id_costo'=>1,
            'id_formula'=>1,
            'costototal'=>2227.88
        ]);
    }
}
