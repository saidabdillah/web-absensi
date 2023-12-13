<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeCari(Builder $cari): void
    {
        $cari->where('nama_lengkap', 'like', '%' . request('cari') . '%')
            ->orWhere('nim', 'like', '%' . request('cari') . '%');
    }
}
