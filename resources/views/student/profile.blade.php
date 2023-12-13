@extends('student.components.main')
@section('content')
<section class="container">
  <main>
    <div class="row ">
      <h2 class="mb-3">Profile</h2>
      <div class="col-12 col-lg-4 mb-3">
        <section class="card text-center">
          <img src="{{ asset('storage') . '/' . $mahasiswa->gambar }}" class="card-img-top rounded-circle mx-auto mt-3"
            style="height: 100px; width:100px;" alt="Muhammad Said Abdillah">
          <div class="card-body">
            <h6 class="card-subtitle text-body-secondary mb-2">{{ $mahasiswa->jurusan }}</h6>
            <h6 class="card-subtitle text-body-secondary">{{ $mahasiswa->nim }}</h6>
          </div>
        </section>
      </div>
      <div class="col-12 col-lg-8">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th>Nama :</th>
              <td>{{ $mahasiswa->nama_lengkap }}</td>
            </tr>
            <tr>
              <th>Email :</th>
              <td>{{ $mahasiswa->email }}</td>
            </tr>
            <tr>
              <th>No. Hp :</th>
              <td>{{ $mahasiswa->nohp }}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin :</th>
              <td>{{ $mahasiswa->jenis_kelamin }}</td>
            </tr>
            <tr>
              <th>Alamat :</th>
              <td>{{ $mahasiswa->alamat }}</td>
            </tr>
            <tr>
              <th>Angkatan :</th>
              <td>{{ $mahasiswa->angkatan }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</section>
@endsection