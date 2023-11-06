<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperAdmin = Role::create(['name'   => "Super Administrador"]);
        $roleAdmin = Role::create(['name'   => 'Administrador']);
        $seller = Role::create(['name'   => 'Vendedor']);
        $store = Role::create(['name'   => 'Almacen']);
        $shop = Role::create(['name' => 'Compras']);

        $permissions = collect([
            ['group' => 'Grupos y permisos',                'name' => "system.groups.list",                     'description' => "Permiso para acceder al listado de grupos y permisos",                   'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.create",                   'description' => "Permiso para registrar un nuevo grupo",                                  'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.edit",                     'description' => "Permiso para editar la información de los grupos",                       'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.delete",                   'description' => "Permiso para eliminar un grupo",                                         'permisos' =>  collect(['all'])],

            ['group' => 'Usuarios',                         'name' => "system.users.list",                      'description' => "Permiso para acceder al listado de usuarios",                            'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.create",                    'description' => "Permiso para registrar un nuevo usuario",                                'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.edit",                      'description' => "Permiso para editar la información de los usuarios",                     'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.status",                    'description' => "Permiso para activar/suspender usuarios",                                'permisos' =>  collect(['all'])],            

            ['group' => 'Gerencia',                         'name' => "system.management.list",                 'description' => "Permiso para acceder al listado de gerencia",                            'permisos' => collect(['all'])],
            ['group' => 'Gerencia',                         'name' => "system.management.create",               'description' => "Permiso para registrar nuevos gerencia",                                 'permisos' => collect(['all'])],
            ['group' => 'Gerencia',                         'name' => "system.management.edit",                 'description' => "Permiso para editar la información de la gerencia",                      'permisos' => collect(['all'])],
            ['group' => 'Gerencia',                         'name' => "system.management.status",               'description' => "Permiso para activar/suspender gerencia",                                'permisos' => collect(['all'])],
            
            ['group' => 'Ventas',                           'name' => "system.seller.list",                     'description' => "Permiso para acceder al listado de vendedores",                          'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.create",                   'description' => "Permiso para registrar nuevos vendedores",                               'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.edit",                     'description' => "Permiso para editar la información de los vendedores",                   'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.status",                   'description' => "Permiso para activar/suspender vendedores",                              'permisos' =>  collect(['all'])],

            ['group' => 'Almacen',                          'name' => "system.store.list",                      'description' => "Permiso para acceder al listado de almacén",                             'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.create",                    'description' => "Permiso para registrar nuevos elementos de almacén",                     'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.edit",                      'description' => "Permiso para editar la información de los elementos de almacén",         'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.status",                    'description' => "Permiso para activar/suspender elementos de almacén",                    'permisos' =>  collect(['all'])],


            ['group' => 'Compras',                          'name' => "system.shop.list",                       'description' => "Permiso para acceder al listado de compras",                              'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.shop.create",                     'description' => "Permiso para registrar nuevas compras",                                   'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.shop.edit",                       'description' => "Permiso para editar la información de las compras",                       'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.shop.status",                     'description' => "Permiso para activar/suspender compras",                                  'permisos' => collect(['all'])],

            ['group' => 'Compras',                          'name' => "system.supplier.list",                   'description' => "Permiso para acceder al listado de proveedores",                          'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.supplier.create",                 'description' => "Permiso para registrar nuevas proveedores",                               'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.supplier.edit",                   'description' => "Permiso para editar la información de las proveedores",                   'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.supplier.status",                 'description' => "Permiso para activar/suspender proveedores",                              'permisos' => collect(['all'])],

            ['group' => 'Reportes',                           'name' => "system.reports.list",                              'description' => "Permiso para acceder a las acciones de reportes",                                     'permisos' =>  collect(['all'])],

           ]);



        $permissions->each(function ($permission, $value) use($roleSuperAdmin, $roleAdmin, $seller, $store, $shop) {
            
            $collection  = $permission['permisos'];
            $groups = [];
            array_push($groups, $roleSuperAdmin, $roleAdmin);

            if ($collection->search('all') !== false) {

                array_push($groups, $seller, $store, $shop);

            } else {
                
                if ($collection->search('shop') !== false) {

                    array_push($groups, $shop);    
                }

                if ($collection->search('seller') !== false) {

                    array_push($groups, $seller);    
                }

                if ($collection->search('store') !== false) {

                    array_push($groups, $store);    
                }

            }

            Permission::create([
                'group'         => $permission['group'],
                'name'          => $permission['name'],
                'description'   => $permission['description'],
            ])->syncRoles($groups);
        });
    }
}
