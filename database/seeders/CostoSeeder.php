<?php

namespace Database\Seeders;

use App\Models\Costo;
use Illuminate\Database\Seeder;

class CostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Costo::create([
           'concepto'=> 'costo produccion1',
           'total'=> 457.13,
        ]);
    }
}
