<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::insert('insert into users (id, name, email, password) values (?, ?, ? , ?)', [1, 'Limber',
        'limber@gmail.com',Hash::make('12345678')
    ]);
    
    }
}
