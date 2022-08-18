<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Matías Benítez',
            'email' => 'matias@correo.com',
            'password' => bcrypt('password')
        ])->assignRole($role);
    }
}
