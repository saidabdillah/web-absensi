@extends('admin.components.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<section class="container mt-3 ms-0">
  <div class="row">
    <div class="col-4">
      <div class="card p-3">
        <img src="/image/logo.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h1 class="card-text">Institut Teknologi Sapta Mandiri</h1>
          <h4 class="card-text mt-3">Selamat Datang Admin</h4>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h3>Mahasiswa</h3>
          <h5>Total</h5>
          <h6 class="card-text">{{ $mahasiswa }} Orang</h6>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection