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
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name'   => "Super Administrador"]);
        $roleAdmin = Role::create(['name'   => 'Gerencia']);
     
        $permissions = collect([
          
            ['group' => 'Almacen',                          'name' => "system.store.list",                      'description' => "Permiso para acceder al listado de almacén",                             'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.create",                    'description' => "Permiso para registrar nuevos elementos de almacén",                     'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.edit",                      'description' => "Permiso para editar la información de los elementos de almacén",         'permisos' =>  collect(['all'])],
            ['group' => 'Almacen',                          'name' => "system.store.status",                    'description' => "Permiso para activar/suspender elementos de almacén",                    'permisos' =>  collect(['all'])],

            ['group' => 'Catálogos',                          'name' => "system.catalogue.view",                            'description' => "Permiso para visualizar el apartado de catálogos",                                    'permisos' =>  collect(['all'])],

            ['group' => 'Compras',                          'name' => "system.shop.list",                       'description' => "Permiso para acceder al listado de ordenes de compras",                              'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.shop.create",                     'description' => "Permiso para registrar nuevas ordenes de compras",                                   'permisos' => collect(['all'])],
            ['group' => 'Compras',                          'name' => "system.shop.status",                     'description' => "Permiso para cambia estatus entregar/solicitada de orden de compras",                                  'permisos' => collect(['all'])],
            ['group' => 'Compras  ',                        'name' => "system.shop.view",                       'description' => "Permiso para ver la orden de compras",                                        'permisos' =>  collect(['all'])],

            
            ['group' => 'Grupos y permisos',                'name' => "system.groups.list",                     'description' => "Permiso para acceder al listado de grupos y permisos",                    'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.create",                   'description' => "Permiso para registrar un nuevo grupo",                                   'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.edit",                     'description' => "Permiso para editar la información de los grupos",                        'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.delete",                   'description' => "Permiso para eliminar un grupo",                                          'permisos' =>  collect(['all'])],


            ['group' => 'Ventas',                           'name' => "system.seller.list",                     'description' => "Permiso para acceder al listado de vendedores",                          'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.create",                   'description' => "Permiso para registrar nuevos vendedores",                               'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.edit",                     'description' => "Permiso para editar la información de los vendedores",                   'permisos' =>  collect(['all'])],
            ['group' => 'Ventas',                           'name' => "system.seller.status",                   'description' => "Permiso para activar/suspender vendedores",                              'permisos' =>  collect(['all'])],

             
            ['group' => 'Proveedores',                      'name' => "system.supplier.list",                   'description' => "Permiso para acceder al listado de proveedores",                          'permisos' => collect(['all'])],
            ['group' => 'Proveedores',                      'name' => "system.supplier.create",                 'description' => "Permiso para registrar nuevas proveedores",                               'permisos' => collect(['all'])],
            ['group' => 'Proveedores',                      'name' => "system.supplier.edit",                   'description' => "Permiso para editar la información de las proveedores",                   'permisos' => collect(['all'])],
            ['group' => 'Proveedores',                      'name' => "system.supplier.status",                 'description' => "Permiso para activar/suspender proveedores",                              'permisos' => collect(['all'])],

           
            ['group' => 'Reportes',                         'name' => "system.reports.list",                    'description' => "Permiso para acceder a las acciones de reportes",                         'permisos' =>  collect(['all'])],

            ['group' => 'Usuarios',                         'name' => "system.users.list",                      'description' => "Permiso para acceder al listado de usuarios",                             'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.create",                    'description' => "Permiso para registrar un nuevo usuario",                                 'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.edit",                      'description' => "Permiso para editar la información de los usuarios",                      'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.status",                    'description' => "Permiso para activar/suspender usuarios",                                 'permisos' =>  collect(['all'])],            

            
        ]);


        $permissions->each(function ($permission, $value) use($roleSuperAdmin, $roleAdmin) {
            
            $collection  = $permission['permisos'];
            $groups = [];
            array_push($groups, $roleSuperAdmin, $roleAdmin);

            if ($collection->search('all') !== false) {

                array_push($groups);

            } else {
                
                if ($collection->search('Recursos Humanos') !== false) {

                    array_push($groups);    
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