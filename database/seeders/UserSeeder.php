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
            'name'              => "Beastmex",
            'last_name'         => "Corporation",
            'email'             => "sistemas@beastmex.com.mx",
            'email_verified_at' => now(),
            'password'          => bcrypt('1234abcd')
            
        ]);

        $user->assignRole(1);

        $users = collect([
            ['name' => "Elias Enrique", 'last_name' => "Mayor Carrasquero",     'email' => "gerencia@beastmex.com.mx",                  'role' => 2],
        ]);

        $users->each(function ($user, $value) {
            $row = User::create([
                'name'                  => $user['name'],
                'last_name'             => $user['last_name'],
                'email'                 => $user['email'],
                'email_verified_at'     => now(),
                'password'              => bcrypt('Abcd1234!')
            ]);

            $row->assignRole($user['role']);
        }); 
       
    }
}
