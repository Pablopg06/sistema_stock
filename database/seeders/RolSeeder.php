<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $rol1 = Role::create(['name' => 'Jefe']);
        $rol2 = Role::create(['name' => 'Encargado']);
        $rol3 = Role::create(['name' => 'Vendedor']);
        //Permisos para acciones sobre articulos
        Permission::create(['name' => 'articulos.index'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'articulos.show'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'articulos.edit'])->assignRole($rol1);
        //Permission::create(['name' => 'articulos.reposicion'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'articulos.destroy'])->assignRole($rol1);
        Permission::create(['name' => 'articulos.cambio'])->syncRoles([$rol1, $rol2]);
        //Permisos para acciones sobre categorias y subcategorias
        Permission::create(['name' => 'categorias.index'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.create'])->assignRole($rol1);
        Permission::create(['name' => 'categorias.categoria'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.destroy'])->assignRole($rol1);
        Permission::create(['name' => 'categorias.crear_sub'])->assignRole($rol1);
        Permission::create(['name' => 'categorias.subcategoria'])->syncRoles([$rol1, $rol2, $rol3]);
        Permission::create(['name' => 'categorias.borrar_sub'])->assignRole($rol1);
        //Permisos para ingresos
        Permission::create(['name' => 'ingreso.create'])->assignRole($rol1);
        Permission::create(['name' => 'ingreso.agregar'])->syncRoles($rol1, $rol2, $rol3);
        //Permisos para egresos
        Permission::create(['name' => 'egreso.egreso'])->syncRoles($rol1, $rol2, $rol3);

        Permission::create(['name' => 'correccion.edit'])->syncRoles($rol1, $rol2);
        //Permisos para Proveedores
        Permission::create(['name' => 'proveedores.edit'])->assignRole($rol1);
        //Permiso para eliminar perfil
        Permission::create(['name' => 'current-user.destroy'])->assignRole($rol1);

    }
}
