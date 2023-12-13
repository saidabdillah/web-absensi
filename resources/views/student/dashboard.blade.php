@extends('student.components.main')
@section('content')
<section class="container-fluid">
  <main class="d-flex justify-content-center align-items-center flex-column" style="min-height: 88vh">
    <div class="logo mb-5">
      <img src="/image/logo.png" class="d-block mx-auto" alt="ITS Mandiri">
    </div>
    <h1 class="text-center">Selamat Datang, <strong class="d-block">{{ $mahasiswa->nama_lengkap }}</strong></h1>
  </main>
</section>
@endsection