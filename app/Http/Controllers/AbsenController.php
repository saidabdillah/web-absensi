<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        return view('admin.absen', [
            'absen' => Absen::with('matakuliah')->cari()->paginate(10)->withQueryString(),
        ]);
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::where('nim', Auth::user()->nim)->first();
        return view('student.absen', [
            'matakuliah' => Matakuliah::all(),
            'absen' => Absen::with('matakuliah')->where('nim', $mahasiswa->nim)->latest()->get(),
        ]);
    }

    public function rules(): array
    {
        return [
            'mata_kuliah_id' => 'required',
            'kehadiran' => 'required',
            'keterangan' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'mata_kuliah_id.required' => 'Mata Kuliah Harus Dipilih',
            'kehadiran.required' => 'Kehadiran Harus Diisi',
            // 'keterangan.required' => 'Keterangan Harus Diisi',
            'latitude.required' => 'Posisi Harus Diisi',
            'longitude.required' => 'Posisi Harus Diisi',
        ];
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nim', Auth::user()->nim)->first();

        $absen = $request->validate($this->rules(), $this->messages());
        $absen['nama_mahasiswa'] = $mahasiswa->nama_lengkap;
        $absen['nim'] = $mahasiswa->nim;
        $absen['jurusan'] = $mahasiswa->jurusan;

        Absen::create($absen);

        return back()->with('success', 'Absen Terkirim');
    }

    public function lihat(Absen $absen)
    {
        $mahasiswa = Mahasiswa::where('nim', $absen->nim)->first();
        return view('admin.lihat-absen', [
            'mahasiswa' => $mahasiswa,
            'absen' => $absen->load('matakuliah'),
        ]);
    }

    public function delete(Absen $absen)
    {
        Absen::find($absen->id)->delete();
        return back()->with('success', 'Absen Telah Dihapus.');
    }
}
