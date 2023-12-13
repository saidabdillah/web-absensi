<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'role' => 'mahasiswa',
        //     'nim' => '220110054',
        //     'password' => 'password',
        // ]);
        User::create([
            'role' => 'admin',
            'nim' => '123456789',
            'password' => 'password',
        ]);

        // Mahasiswa::create([
        //     'nama_lengkap' => 'Muhammad Said Abdillah',
        //     'jurusan' => 'Ilmu Komputer',
        //     'nim' => '220110054',
        //     'email' => 'msaidabdillah18@gmail.com',
        //     'nohp' => '085752646237',
        //     'jenis_kelamin' => 'Laki - Laki',
        //     'alamat' => 'Kelua',
        //     'angkatan' => '2021',
        // ]);

        Matakuliah::create([
            'nama_mata_kuliah' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak'
        ]);
        Matakuliah::create([
            'nama_mata_kuliah' => 'Keamanan Informasi',
            'slug' => 'keamanan-informasi'
        ]);
        Matakuliah::create([
            'nama_mata_kuliah' => 'Kriptografi',
            'slug' => 'kriptografi'
        ]);
        Matakuliah::create([
            'nama_mata_kuliah' => 'Basis Data Terdistribusi',
            'slug' => 'basis-data-terdistribusi'
        ]);
        Matakuliah::create([
            'nama_mata_kuliah' => 'Pemograman Web Berbasis Framework',
            'slug' => 'pemograman-web-berbasis-framework'
        ]);
        Matakuliah::create([
            'nama_mata_kuliah' => 'Pemograman Mobile',
            'slug' => 'pemograman-mobile'
        ]);
    }
}
