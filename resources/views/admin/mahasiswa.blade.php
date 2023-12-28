@extends('admin.components.main')
@section('content')
<div class="d-flex flex-column flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Mahasiswa</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
    </ol>
  </nav>
</div>
<section class="container-fluid">
  <a href="/mahasiswa/tambah-mahasiswa" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
  <div class="row">
    <div class="col-12 col-sm-4 mb-3 mt-5">
      <form action="/mahasiswa" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Mahasiswa" aria-label="Cari Mahasiswa"
            aria-describedby="search" name="cari" value="{{ request('cari') }}">
          <button class="btn btn-primary" type="submit" id="search">Cari</button>
        </div>
      </form>
    </div>
    @if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-12 table-responsive">
      <table class="table table-hover align-middle table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NIM</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Email</th>
            <th scope="col">No HP</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Angkatan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        @if ($mahasiswa->count())
        <tbody>
          @foreach ($mahasiswa as $i => $mhs)
          <tr>
            <th scope="row">{{ $i + $mahasiswa->firstItem() }}</th>
            <td>{{ $mhs->nama_lengkap }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>{{ $mhs->email }}</td>
            <td>{{ $mhs->nohp }}</td>
            <td>{{ $mhs->jenis_kelamin }}</td>
            <td>{{ $mhs->alamat }}</td>
            <td>{{ $mhs->angkatan }}</td>
            <td>
              <a href="/mahasiswa/lihat/{{ $mhs->nim }}" class="btn btn-success">Lihat Mahasiswa</a>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      {{ $mahasiswa->links() }}
      @else
      <tr>
        <td colspan="10">
          <div class="alert alert-danger text-center" role="alert">
            <h3>Mahasiswa Belum Ada!</h3>
          </div>
        </td>
      </tr>
      @endif
    </div>
  </div>
</section>
@endsection