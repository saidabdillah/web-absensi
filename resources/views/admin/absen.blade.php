@extends('admin.components.main')
@section('content')
<div class="d-flex flex-column flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Absen</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Absen</li>
    </ol>
  </nav>
</div>

<section class="container-fluid">
  <div class="row">
    @if ($absen->count() > 10)
    <div class="col-12 col-sm-8 col-lg-6 mb-3">
      <form action="/absen" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Mahasiswa" aria-label="Cari Mahasiswa"
            aria-describedby="search" name="cari" value="{{ request('cari') }}">
          <button class="btn btn-primary" type="submit" id="search">Cari</button>
        </div>
      </form>
    </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-12 table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">NIM</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Kehadiran</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Tanggal & Waktu</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        @if ($absen->count())
        <tbody>
          @foreach ($absen as $i => $abs)
          <tr>
            <th scope="row">{{ $i + $absen->firstItem() }}</th>
            <td>{{ $abs->nama_mahasiswa }}</td>
            <td>{{ $abs->nim }}</td>
            <td>{{ $abs->jurusan }}</td>
            <td>{{ $abs->matakuliah->nama_mata_kuliah }}</td>
            <td>{{ $abs->kehadiran }}</td>
            <td>{{ $abs->keterangan }}</td>
            <td>{{ $abs->latitude }}</td>
            <td>{{ $abs->longitude }}</td>
            <td>{{ $abs->created_at }}</td>
            <td>
              <a href="/absen/mahasiswa/{{ $abs->nim }}" class="btn btn-light">Lihat</a>
              <form action="/mahasiswa/absen/{{ $abs->nim }}/edit" method="post" class="d-inline-block">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-success">Edit</button>
              </form>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Hapus
              </button>
            </td>
          </tr>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Absen</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6>Yakin mau menghapus ?</h6>
                  <form action="/absen/{{ $abs->id }}/delete" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </tbody>
      </table>
      {{ $absen->links() }}
      @else
      <tr>
        <td colspan="11">
          <div class="alert alert-danger text-center" role="alert">
            <h3>Absen Belum Ada!</h3>
          </div>
        </td>
      </tr>
      @endif
    </div>
  </div>
</section>
@endsection