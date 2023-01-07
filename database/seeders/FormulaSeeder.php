<?php

namespace Database\Seeders;

use App\Models\Formula;
use Illuminate\Database\Seeder;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formula::create([
            'nombre'=>'frapé maracuya standar',
            'fecha'=>'2022-05-15',
            'montolote'=>1770.75,
        ]);
    }
}
