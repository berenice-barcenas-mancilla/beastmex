<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use phpDocumentor\Reflection\Types\Nullable;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          
        $user = User::create([
            'name'              => "beastmex",
            'last_name'         => "importaciones",
            'email'             => "sistemas@beastmex.com.mx",
            'email_verified_at' => now(),
            'password'          => bcrypt('1234abcd')
            
        ]);

        $user->assignRole(1);
        
        $users = collect([
            ['name' => "Elias",         'last_name' => "Mayor",                 'email' => "gerencia@beastmex.com.mx",           'role' => 2,],
            ['name' => "Edgar",         'last_name' => "Escobedo",              'email' => "ventas@beastmex.com.mx",             'role' => 3,],
            ['name' => "Diego",         'last_name' => "Zamora",                'email' => "almacen@beastmex.com.mx",            'role' => 4,],
            ['name' => "Bere",          'last_name' => "Barcenas",              'email' => "compras@beastmex.com.mx",            'role' => 5,],
           ]);

        $users->each(function ($user, $value) {
            $row = User::create([
                'name'                  => $user['name'],
                'last_name'             => $user['last_name'],
                'email'                 => $user['email'],
                'email_verified_at'     => now(),
                'password'              => bcrypt('1234abcd'),
            ]);

            $row->assignRole($user['role']);
        });
    }
}
