<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES
        $master =Role::create(['name' => 'Master']);
        $submaster =  Role::create(['name' => 'Submaster']);
        $role1 = Role::create(['name' => 'Admin Blog']);
        $topost = Role::create(['name' => 'Aprobar Publicaciones']);
        $role2 = Role::create(['name' => 'Mensajes']);
        $role3 = Role::create(['name' => 'Anuncios']);
        $role4 = Role::create(['name' => 'Ministerios']);
        $role5 = Role::create(['name' => 'Enseñanzas']);
        $role6 = Role::create(['name' => 'Testimonios']);

        //APROBAR TODAS LAS PUBLICACIONES 
        Permission::create(['name' => 'topost'])->syncRoles([$role1,$topost,$master]);

        //MOSTRAR PANEL BLOG
        Permission::create(['name' => 'admin.blog.home'])->syncRoles([$role1,$topost,$role2, $role3, $role4, $role5, $role6]);
        
        //ACCESO ESTADISTICAS
        Permission::create(['name' => 'estadisticas'])->syncRoles([$role1,$master]);

        //ACCESO USUARIOS
        Permission::create(['name' => 'admin.blog.user.index'])->syncRoles([$role1]);

        //ACCESO CATEGORIAS
        Permission::create(['name' => 'admin.blog.category.index'])->syncRoles([$role1]);

        //ACCESO MENSAJES
        Permission::create(['name' => 'admin.blog.contact'])->syncRoles([$role1,$role2]);

        //ACCESO ANUNCIOS
        Permission::create(['name' => 'admin.blog.announce.index'])->syncRoles([$role1, $role3]);

        //ACCESO MINISTERIOS
        Permission::create(['name' => 'admin.blog.ministry'])->syncRoles([$role1, $role4]);

        //ACCESO ENSEÑANZAS
        Permission::create(['name' => 'admin.blog.teaching'])->syncRoles([$role1, $role5]);

        //ACCESO TESTIMONIOS
        Permission::create(['name' => 'admin.blog.testimony'])->syncRoles([$role1, $role6]);

        //ACCESO ADMINISTRADOR SECRETARIA
        Permission::create(['name' => 'admin.secretary.admin'])->syncRoles([$master,$submaster]);

        //ACCESO OTRAS IGLESIAS
        Permission::create(['name' => 'banned'])->syncRoles([$master]);

        //ACCESO OTRAS IGLESIAS
        Permission::create(['name' => 'admin.secretary.temple'])->syncRoles([$master]);

        
    
    }
}
