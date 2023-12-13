@extends('admin.components.main')
@section('content')
<div class="d-flex flex-column flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Lihat Absen</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="/absen">Absen</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lihat Absen</li>
    </ol>
  </nav>
</div>
<section class="container-fluid mb-5">
  <div class="row">
    <div class="col-12 col-lg-6 mb-5">
      <div class="card">
        <img src="{{ asset('storage'). '/' . $mahasiswa->gambar }}" style="width: 200px; height:200px;"
          class="card-img-top m-auto mt-3" alt="{{ $mahasiswa->gambar }}">
        <div class="card-body text-center">
          <h5 class="card-title">Nama: {{ $absen->nama_mahasiswa }}</h5>
          <p class="card-text mb-0">Jurusan : {{ $absen->jurusan }}</p>
          <p class="card-text">NIM : {{ $absen->nim }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Mata Kuliah : {{ $absen->matakuliah->nama_mata_kuliah }}</li>
          <li class="list-group-item">Kehadiran : {{ $absen->kehadiran }}</li>
          <li class="list-group-item">Latitude : <span class="latitude">{{ $absen->latitude }}</span></li>
          <li class="list-group-item">Longitude : <span class="longitude">{{ $absen->longitude }}</span></li>
        </ul>
      </div>
      <div class="d-grid grid-2 mt-3">
        <a href="/absen" class="btn btn-primary">Kembali</a>
      </div>
    </div>
    <div class="col-12 col-lg-6 mb-5">
      <div id="map"></div>
    </div>
  </div>
</section>
@endsection