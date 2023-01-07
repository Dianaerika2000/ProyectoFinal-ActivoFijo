<?php

namespace Database\Seeders;
//use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'administrador']);
        $role2 = Role::create(['name'=>'usuario']);

        Permission::create(['name'=>'admin.panel'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'admin.usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.usuarios.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.usuarios.store'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.usuarios.update'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.usuarios.delete'])->syncRoles([$role1]);

        /*
        Rol::create([
            'r_tip'=>'administrador',
        ]);
        Rol::create([
            'r_tip'=>'empleado',
        ]);
        */
    }
}
