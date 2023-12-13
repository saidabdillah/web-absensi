@extends('admin.components.main')
@section('content')
<div class="d-flex flex-column flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Lihat Mahasiswa</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="/mahasiswa">Mahasiswa</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lihat Mahasiswa</li>
    </ol>
  </nav>
</div>
<section class="container-fluid">
  <div class="row flex-column flex-md-row">
    <div class="col-12 col-lg-4 text-center mb-3">
      <div class="card position-relative z-1">
        <img src="{{ asset('storage') . '/' . $mahasiswa->gambar }}" class="card-img-top rounded-circle mx-auto mt-3"
          style="width: 200px; height:200px;" alt="{{ $mahasiswa->nama_lengkap }}">
        <div class="card-body">
          <h5 class="card-title">{{ $mahasiswa->nim }}</h5>
          <p class="card-text">{{ $mahasiswa->jurusan }}</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-8 table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nama Lengkap</th>
            <td>{{ $mahasiswa->nama_lengkap }}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="col">Email</th>
            <td>{{ $mahasiswa->email }}</td>
          </tr>
          <tr>
            <th scope="col">No HP</th>
            <td>{{ $mahasiswa->nohp }}</td>
          </tr>
          <tr>
            <th scope="col">Jenis Kelamin</th>
            <td>{{ $mahasiswa->jenis_kelamin }}</td>
          </tr>
          <tr>
            <th scope="col">Alamat</th>
            <td>{{ $mahasiswa->alamat }}</td>
          </tr>
          <tr>
            <th scope="col">Angkatan</th>
            <td>{{ $mahasiswa->angkatan }}</td>
          </tr>
        </tbody>
      </table>
      <form action="/mahasiswa/{{ $mahasiswa->nim }}/edit" method="get" class="d-flex flex-column mb-3">
        @csrf
        <button type="submit" class="btn btn-success">Edit</button>
      </form>
      <div class="d-grid grid-2">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Hapus
        </button>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Mahasiswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah kamu yakin mau menghapus ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="/mahasiswa/{{ $mahasiswa->nim }}/delete" method="post" class="d-flex flex-column">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <h3 class="mt-3 mb-3">Tambah User</h3>
    @if (session()->has('sukses'))
    <div class="alert alert-success">
      <h5>{{ session('sukses') }}</h5>
    </div>
    @endif
    <div class="col-12 col-lg-4 mb-5">
      <form action="/tambah-user" method="post" class="mb-5">
        @csrf
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="NIM"
              name="nim" value="{{ $mahasiswa->nim }}">
            <label for="nim">NIM</label>
            @error('nim')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
              placeholder="Password" name="password">
            <label for="password">Kata Sandi</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
              id="confirmPassword" placeholder="Password" name="password_confirmation">
            <label for="confirmPassword">Konfirmasi Kata Sandi</label>
            @error('password_confirmation')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="d-grid grid-2">
            <button type="submit" class="btn btn-primary">Tambah User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection