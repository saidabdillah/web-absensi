<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Absen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'mata_kuliah_id');
    }

    public function scopeCari(Builder $cari): void
    {
        $cari->where('nama_mahasiswa', 'like', '%' . request('cari') . '%')
            ->orWhere('nim', 'like', '%' . request('cari') . '%');
    }
}
