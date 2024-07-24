<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'kelas_id', 'jurusan', 'no_telepon', 'alamat'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
};

