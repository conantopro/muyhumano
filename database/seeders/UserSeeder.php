<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Antonio Contreras',
            'username' => 'conatek',
            'email' => 'conatekpro@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('master');
    }
}
