<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/style.css">
  <title>Document</title>
</head>
<body>

  <div class="header">
    <img src="/gambar/header.jpg" width="100%" height="40%">
  </div>

  <div class="menu">
    <b>
      <a href="/home" class="{{ Request::is('home*') ? 'active' : '' }}">Home</a>
      @if (session('role') == 'admin')
        <a href="/guru/index"  class="{{ Request::is('guru*') ? 'active' : '' }}">Guru</a>
        <a href="/jurusan/index"  class="{{ Request::is('jurusan*') ? 'active' : '' }}">Jurusan</a>
        <a href="/kelas/index"  class="{{ Request::is('kelas*') ? 'active' : '' }}">Kelas</a>
        <a href="/siswa/index"  class="{{ Request::is('siswa*') ? 'active' : '' }}">Siswa</a>
        <a href="/mapel/index"  class="{{ Request::is('mapel*') ? 'active' : '' }}">Mapel</a>
        <a href="/mengajar/index"  class="{{ Request::is('mengajar*') ? 'active' : '' }}">Mengajar</a>
      @else
        <a href="/nilai/index"  class="{{ Request::is('nilai*') ? 'active' : '' }}">Nilai</a>
      @endif
      <a href="/logout">Logout</a>
    </b>
  </div>

  @yield('content')

  <div class="footer">
    <center>
      <p>
        &copy; {{ date('Y') }} - Mochamad Farhan
      </p>
    </center>
  </div>
    
</body>
</html>