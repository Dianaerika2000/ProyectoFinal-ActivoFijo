<?php

namespace Database\Seeders;

use App\Models\Produccion;
use Illuminate\Database\Seeder;

class ProduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produccion::create([
            'fecha'=>'2022-06-13',
            'aportepatronal'=>16.71,
            'beneficiosocial'=>8.33,
            'tacho'=>120,     /* 120 kg pesa un tacho */
            'tachodiario'=>10,
            'diaslaboral'=>20,
            'id_formula'=>1,
        ]);
    }
}
