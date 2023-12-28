@extends('student.components.main')
@section('content')
<section class="container">
  <main>
    <div class="row justify-content-md-between">
      <h1 class="text-lg-start">Absen</h1>
      {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif --}}
      <div class="col-12 col-lg-4">
        @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <form action="/dashboard/absen" method="POST">
          @csrf
          <select class="form-select mb-3 @error('mata_kuliah_id') is-invalid @enderror"
            aria-label="Large select example" name="mata_kuliah_id">
            <option selected disabled>Pilih Mata Kuliah</option>
            @foreach ($matakuliah as $matkul)
            <option value="{{ $matkul->id }}">{{ $matkul->nama_mata_kuliah }}</option>
            @endforeach
          </select>

          <div class="form-check d-inline-block me-3">
            <input class="form-check-input @error('kehadiran') is-invalid @enderror" type="radio" name="kehadiran"
              id="hadir" value="hadir" onchange="posisi">
            <label class="form-check-label" for="hadir">
              Hadir
            </label>
          </div>
          <div class="form-check mb-3 d-inline-block">
            <input class="form-check-input" type="radio" name="kehadiran" id="izin" value="izin">
            <label class="form-check-label" for="izin">
              Izin
            </label>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="3"
              name="keterangan"></textarea>
          </div>
          <input type="hidden" name="latitude" class="@error('longitude') is-invalid @enderror" id="latitude" value="">
          <input type="hidden" name="longitude" class="@error('longitude') is-invalid @enderror" id="longitude"
            value="">
          <div class="d-grid grid-2">
            <button type="submit" class="btn btn-dark">Kirim</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-lg-7 mt-5 mt-lg-0">
        <div class="table-responsive">
          <h3>Kehadiran</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Kehadiran</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal & Waktu</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($absen as $i => $abs)
              <tr>
                <th scope="row">{{ $i +=1 }}</th>
                <td>{{ $abs->matakuliah->nama_mata_kuliah }}</td>
                <td class="text-capitalize">{{ $abs->kehadiran }}</td>
                <td>{{ $abs->keterangan }}</td>
                <td>{{ $abs->waktu }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</section>
@endsection