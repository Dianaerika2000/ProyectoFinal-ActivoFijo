<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsuarioSeeder extends Seeder
{

    public function run()
    {
        $role = Role::where('name', 'admin')->first();

        Usuario::create([
            'nombre'=>'Luis',
            'apellido'=>'Unknown',
            'genero'=>'M',
            'nacionalidad'=>'Boliviana',
            'ci'=>12345678,
            'celular'=>44448888,
            'direccion'=>'San Isidro',
            'email'=>'unknown182@tecnoweb.com',
            'foto'=>'public/imagenes/usuarios/foto.jpg',
            'password'=>bcrypt('12345678'),
            'tipo_usuario'=>'1',
            'letra'=>'Arial',
            'color'=>'Blue',
        ]);
        Usuario::create([
            'nombre'=>'Vivian',
            'apellido'=>'Unknown2',
            'genero'=>'F',
            'nacionalidad'=>'Boliviana',
            'ci'=>12345678,
            'celular'=>44448888,
            'direccion'=>'XYZ',
            'email'=>'vivian@tecnoweb.com',
            'foto'=>'public/imagenes/usuarios/foto2.jpg',
            'password'=>bcrypt('12345678'),
            'tipo_usuario'=>'2',
            'letra'=>'Calibri',
            'color'=>'Green',
        ]);
        //$user->assignRole($role);

        //Usuario::factory(9)->create();
        //'password'=>Hash::make('12345678'),
        //'password'=>bcrypt('12345678'),
    }
}
