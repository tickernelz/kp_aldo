<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'user_id' => '3',
            'nis' => '12345678',
            'nama' => 'Dede',
            'kelas' => '1A',
            'hp' => '0812345678',
        ]);
    }
}
