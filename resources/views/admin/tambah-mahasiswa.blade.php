@extends('admin.components.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Mahasiswa</h1>
</div>
<section class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-4">
      @if (session()->has('sukses'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="/mahasiswa/tambah-mahasiswa" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
            name="nama_lengkap" value="{{ old('nama_lengkap') }}">
          @error('nama_lengkap')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
            value="{{ old('nim') }}">
          @error('nim')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <select class="form-select @error('jurusan') is-invalid @enderror" aria-label="Default select example"
            name="jurusan">
            <option disabled selected>Jurusan</option>
            <option value="Ilmu Komputer" @selected(old('jurusan')=='Ilmu Komputer' )>Ilmu Komputer</option>
            <option value="Teknologi Informasi" @selected(old('jurusan')=='Teknologi Informasi' )>Teknologi Informasi
            </option>
            <option value="Sistem Informasi" @selected(old('jurusan')=='Sistem Informasi' )>Sistem Informasi</option>
          </select>
          @error('jurusan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nohp" class="form-label">No Hp</label>
          <input type="telp" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp"
            value="{{ old('nohp') }}">
          @error('nohp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-check d-inline-block me-2">
          <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin"
            id="laki_laki" value="Laki - Laki" @checked(old('jenis_kelamin')=='Laki - Laki' )>
          <label class="form-check-label" for="laki_laki">
            Laki - Laki
          </label>
        </div>
        <div class="form-check d-inline-block mb-3">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
            @checked(old('jenis_kelamin')=='Perempuan' )>
          <label class="form-check-label" for="perempuan">
            Perempuan
          </label>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3"
            name="alamat">{{ old('alamat') }}</textarea>
          @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="angkatan" class="form-label">Angkatan</label>
          <input type="number" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan"
            name="angkatan" value="{{ old('angkatan') }}">
          @error('angkatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
          <label class="input-group-text" for="gambar">Upload</label>
          @error('gambar')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="d-grid grid-2 mb-5"><button type="submit" class="btn btn-primary">Tambah</button></div>
      </form>
    </div>
  </div>
</section>
@endsection