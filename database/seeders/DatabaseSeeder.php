<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolSeeder::class,
            ContadorSeeder::class,
            UsuarioSeeder::class,
            /*
            UserSeeder::class,
            InsumoSeeder::class,
            DetalleInsumoSeeder::class,
            FormulaSeeder::class,
            DetalleFormulaSeeder::class,
            CostoSeeder::class,
            DetalleCostoSeeder::class,
            CostoFormulaSeeder::class,
            PresupuestoSeeder::class,
            ProduccionSeeder::class,
            */

        ]);
    }
}
