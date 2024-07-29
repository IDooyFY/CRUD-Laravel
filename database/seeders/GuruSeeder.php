<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gurus')->insert([
            [
                'nama' => 'Ahmad',
                'no_induk' => 12345,
                'alamat' => 'Jl. Merdeka',
                'no_telepon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' =>  'Budi',
                'no_induk' => 67890,
                'alamat' => 'Jl. Sudirman',
                'no_telepon' => '081298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra',
                'no_induk' => 11223,
                'alamat' => 'Jl. Baru',
                'no_telepon' => '081212345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi',
                'no_induk' => 99281,
                'alamat' => 'Jl. Cempaka',
                'no_telepon' => '089921948234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Aldi',
                'no_induk' => 93013,
                'alamat' => 'Jl. Merak',
                'no_telepon' => '089928971234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fikri',
                'no_induk' => 99271,
                'alamat' => 'Jl. Melati',
                'no_telepon' => '089917354123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Arpan',
                'no_induk' => 98247,
                'alamat' => 'Jl. Dahlia',
                'no_telepon' => '089927664532',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Anton',
                'no_induk' => 99461,
                'alamat' => 'Jl. Panjaitan',
                'no_telepon' => '089926485612',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rahmawati',
                'no_induk' => 77391,
                'alamat' => 'Jl. Durian runtuh',
                'no_telepon' => '086738123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Angel',
                'no_induk' => 63721,
                'alamat' => 'Jl. Sukasari',
                'no_telepon' => '087651723456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
