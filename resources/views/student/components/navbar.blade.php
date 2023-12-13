<nav class="navbar navbar-expand-lg bg-dark position-fixed start-0 end-0 top-0 z-3" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Web Absensi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/absen">Absen</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->role }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard/profile">Profile</a></li>
            <li>
              <form action="/keluar" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>