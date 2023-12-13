@extends('layouts.main')
@section('content')
<main class="container">
  <section class="row justify-content-center align-items-center" style="height: 100vh">
    <div class="col-12 col-sm-8 col-md-6">
      <h1 class="mb-4 text-md-center">Login</h1>
      @if (session()->get('gagal'))
      <div class="alert alert-danger">
        <h6 class="m-0 text-center">{{ session('gagal') }}</h6>
      </div>
      @endif
      <form action="/masuk" method="post">
        @csrf
        <div class="form-floating">
          <select class="form-select form-select-lg py-0 @error('role') is-invalid @enderror"
            aria-label="Large select example" name="role" required autofocus>
            <option value="" selected disabled>Role</option>
            <option value="mahasiswa" @selected(old('role')=='mahasiswa' )>Mahasiswa</option>
            <option value="admin" @selected(old('role')=='admin' )>Admin</option>
          </select>
          @error('role')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating my-3">
          <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="NIM"
            name="nim" value="{{ old('nim') }}" required>
          <label for="nim">NIM</label>
          @error('nim')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            placeholder="Password" name="password" required autocomplete="off" value="{{ old('password') }}">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating d-grid grid-2 mb-2"><button type="submit" class="btn btn-dark">Masuk</button></div>
      </form>
    </div>
  </section>
</main>
@endsection