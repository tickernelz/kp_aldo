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
        User::create([
            'username' => 'aldo1',
            'password' => bcrypt('123'),
        ])->assignRole('Super Admin');

        User::create([
            'username' => 'aldo2',
            'password' => bcrypt('123'),
        ])->assignRole('Admin');

        User::create([
            'username' => 'aldo3',
            'password' => bcrypt('123'),
        ])->assignRole('Siswa');
    }
}
