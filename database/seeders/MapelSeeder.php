<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            [
                'mapel' => 'Matematika',
                'keterangan' => 'Mempelajari Statistika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'IPA',
                'keterangan' => 'Mempelajari Ilmu Pengetahuan Alam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'IPS',
                'keterangan' => 'Mempelajari Sejarah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'Biologi',
                'keterangan' => 'Mempelajari Anatomi Hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
