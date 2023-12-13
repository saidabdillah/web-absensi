<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\ServerStatus;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('nim', Auth::user()->nim)->first();
        return view('student.dashboard', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Beranda',
        ]);
    }

    public function create()
    {
        return view('admin.tambah-mahasiswa', [
            'title' => 'Dashboard | Tambah Mahasiswa',
        ]);
    }

    public function rules()
    {
        return [
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'nim' => 'required|numeric|digits:9|unique:App\Models\Mahasiswa,nim',
            'email' => 'required|email:rfc,dns|unique:App\Models\Mahasiswa,email',
            'nohp' => 'required|min:11|max:12|unique:App\Models\Mahasiswa,nohp',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required|numeric',
            'gambar' => 'image|file|required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama Lengkap Harus Diisi.',
            'jurusan.required' => 'Jurusan Harus Dipilih.',
            'nim.required' => 'NIM Harus Diisi.',
            'nim.numeric' => 'NIM Harus Angka.',
            'nim.digits' => 'NIM Harus :digits Angka.',
            'nim.unique' => 'NIM Sudah Ada.',
            'email.required' => 'Email Harus Diisi.',
            'email.email' => 'Email Tidak Valid.',
            'email.unique' => 'Email Sudah Ada.',
            'nohp.required' => 'No HP Harus Diisi.',
            'nohp.min' => 'No HP Minimal :min Angka.',
            'nohp.max' => 'No HP Maximal :max Angka.',
            'nohp.unique' => 'No HP Sudah Ada.',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Dipilih.',
            'alamat.required' => 'Alamat Harus Diisi.',
            'angkatan.required' => 'Angkatan Harus Diisi.',
            'angkatan.numeric' => 'Angkatan Harus Angka.',
            'gambar.image' => 'Gambar Harus Gambar.',
            'gambar.required' => 'Gambar Harus Diisi.',
        ];
    }

    public function store(Request $request)
    {

        $mahasiswa = $request->validate($this->rules(), $this->messages());
        $gambar = $request->file('gambar')->store('images');
        $mahasiswa['gambar'] = $gambar;

        Mahasiswa::create($mahasiswa);

        return redirect('/mahasiswa')->with('sukses', 'Mahasiswa Berhasil Ditambah');
    }

    public function show()
    {
        return view('student.profile', [
            'mahasiswa' => Mahasiswa::where('nim', Auth::user()->nim)->first(),
            'title' => 'Profile',
        ]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.edit-mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'title' => 'Dashboard | Edit Mahasiswa',
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'angkatan' => 'numeric|required',
        ];

        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'numeric|required|unique:App\Models\Mahasiswa,nim';
        }
        if ($request->email != $mahasiswa->email) {
            $rules['email'] = 'email:rfc,dns|required|unique:App\Models\Mahasiswa,email';
        }
        if ($request->nohp != $mahasiswa->nohp) {
            $rules['nohp'] = 'required|min:11|max:12|unique:App\Models\Mahasiswa,nohp';
        }
        if ($request->gambar) {
            Storage::delete($mahasiswa->gambar);
            $mahasiswa['gambar'] = $request->file('gambar')->store('images');
        }

        $validateData = $request->validate($rules);
        Mahasiswa::where('nim', $mahasiswa->nim)->update($validateData);

        return redirect('/mahasiswa')->with('sukses', 'Mahasiswa Berhasil Diubah');
    }
}
