<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'nama', 'kelas_id', 'no_telepon'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
};
