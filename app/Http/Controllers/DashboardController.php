<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'mahasiswa' => Mahasiswa::count(),
            'title' => 'Dashboard',
        ]);
    }

    public function show()
    {
        return view(
            'admin.mahasiswa',
            [
                'mahasiswa' => Mahasiswa::cari()->paginate(10)->withQueryString(),
                'title' => 'Dashboard | Mahasiswa',
            ]
        );
    }

    public function lihat(Mahasiswa $mahasiswa)
    {
        return view('admin.lihat-mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Dashboard | Lihat Mahasiswa',
        ]);
    }

    public function rules(): array
    {
        return [
            'nim' => 'required|numeric|digits:9|unique:App\Models\User,nim',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'Nim Harus Diisi.',
            'nim.unique' => 'Nim Sudah Ada.',
            'nim.numeric' => 'Nim Harus Angka.',
            'nim.digits' => 'Nim Harus :digits Angka.',
            'password.required' => 'Password Harus Diisi.',
            'password.confirmed' => 'Password Tidak Cocok.',
            'password_confirmation.required' => 'Konfirmasi Password Harus Diisi',
        ];
    }

    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());

        User::create([
            'role' => 'mahasiswa',
            'nim' => $request->nim,
            'password' => $request->password,
        ]);

        return back()->with('sukses', 'User Dengan Mahasiswa Ini Telah Dibuat');
    }


    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::where('nim', $mahasiswa->nim)->delete();
        User::where('nim', $mahasiswa->nim)->delete();
        Storage::delete($mahasiswa->gambar);

        return redirect('/mahasiswa/tambah-mahasiswa')->with('sukses', 'Mahasiswa Berhasil Dihapus');
    }
}
