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
                'keterangan' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'IPA',
                'keterangan' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'IPS',
                'keterangan' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mapel' => 'SEJARAH',
                'keterangan' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
