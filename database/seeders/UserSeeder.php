<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gestao365.com',
            'password' => bcrypt('G3zTã0E6S')
        ]);

        if (!$user->hasRole('super-admin')) {
            $user->assignRole('super-admin');
        }
    }
}
