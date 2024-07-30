<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            [
                'nis' => 12345,
                'nama' => 'Ahmad',
                'no_telepon' => '081234567890',
                'kelas_id' => 1
            ],
            [
                'nis' => 67890,
                'nama' => 'Budi',
                'no_telepon' => '081298765432',
                'kelas_id' => 2
            ],
            [
                'nis' => 11223,
                'nama' => 'Citra',
                'no_telepon' => '081212345678',
                'kelas_id' => 3
            ],
            [
                'nis' => 99281,
                'nama' => 'Dewi',
                'no_telepon' => '089921948234',
                'kelas_id' => 1
            ],
            [
                'nis' => 93013,
                'nama' => 'Aldi',
                'no_telepon' => '089928971234',
                'kelas_id' => 2
            ],
            [
                'nis' => 99271,
                'nama' => 'Fikri',
                'no_telepon' => '089928971234',
                'kelas_id' => 3
            ],
            [
                'nis' => 12346,
                'nama' => 'Eka',
                'no_telepon' => '081234567890',
                'kelas_id' => 1
            ],
            [
                'nis' => 67891,
                'nama' => 'Gita',
                'no_telepon' => '081298765432',
                'kelas_id' => 2
            ],
            [
                'nis' => 11224,
                'nama' => 'Hana',
                'no_telepon' => '081212345678',
                'kelas_id' => 3
            ],
            [
                'nis' => 99282,
                'nama' => 'Indra',
                'no_telepon' => '089921948234',
                'kelas_id' => 1
            ],
            [
                'nis' => 93014,
                'nama' => 'Joko',
                'no_telepon' => '089928971234',
                'kelas_id' => 2
            ],
            [
                'nis' => 99272,
                'nama' => 'Kiki',
                'no_telepon' => '089928971234',
                'kelas_id' => 3
            ],
            [
                'nis' => 12347,
                'nama' => 'Lala',
                'no_telepon' => '081234567890',
                'kelas_id' => 1
            ],
            [
                'nis' => 67892,
                'nama' => 'Mama',
                'no_telepon' => '081298765432',
                'kelas_id' => 2
            ],
            [
                'nis' => 11225,
                'nama' => 'Nina',
                'no_telepon' => '081212345678',
                'kelas_id' => 3
            ],
        ]);
    }
}
