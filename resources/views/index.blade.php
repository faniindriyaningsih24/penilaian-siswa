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
      <a href="#" class="active">Home</a>
    </b>
  </div>

  <div class="kiri">
    <fieldset>
      <legend></legend>

      <center>
        <button class="button" onclick="tampilkan_login_siswa()">Siswa</button>
        <button class="button" onclick="tampilkan_login_guru()">Guru</button>
        <button class="button" onclick="tampilkan_login_admin()">Admin</button>
        
        <hr>
        <b>Login sesuai dengan anda</b>
        <hr>
      </center>


      <div id="login_siswa" style="display: none;">
        <form action="/login_siswa" method="post">
          @csrf
          <b>Login Siswa</b>
          <table>
            <tr>
              <td width="25%">NIS</td>
              <td width="25%"><input type="text" name="nis"></td>
            </tr>
            <tr>
              <td width="25%">Password</td>
              <td width="25%"><input type="password" name="password"></td>
            </tr>
            <tr>
              <td colspan="2">
                <center>
                  <button class="button" type="submit">Login</button>
                </center>
              </td>
            </tr>
          </table>
        </form>
      </div>

      <div id="login_guru" style="display: none;">
        <form action="/login_guru" method="post">
          @csrf
          <b>Login Guru</b>
          <table>
            <tr>
              <td width="25%">NIP</td>
              <td width="25%"><input type="text" name="nip"></td>
            </tr>
            <tr>
              <td width="25%">Password</td>
              <td width="25%"><input type="password" name="password"></td>
            </tr>
            <tr>
              <td colspan="2">
                <center>
                  <button class="button" type="submit">Login</button>
                </center>
              </td>
            </tr>
          </table>
        </form>
      </div>

      <div id="login_admin" style="display: none;">
        <form action="/login_admin" method="post">
          @csrf
          <b>Login Admin</b>
          <table>
            <tr>
              <td width="25%">Kode Admin</td>
              <td width="25%"><input type="text" name="kode_admin"></td>
            </tr>
            <tr>
              <td width="25%">Password</td>
              <td width="25%"><input type="password" name="password"></td>
            </tr>
            <tr>
              <td colspan="2">
                <center>
                  <button class="button" type="submit">Login</button>
                </center>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </fieldset>
  </div>

  <div class="kanan">
    <center>
      <h1>
        SELAMAT DATANG
        <br>
        DI WEB PENILAIAN SMKN 1 CIBINONG
      </h1>
    </center>
  </div>

  <div class="kirikuyy">
    <center>
      <p class="mar">Gallery</p>

      <div class="gallery">
        <img src="/gambar/g2.jpg">
        <div class="deskripsi">SMK BISA</div>
      </div>
    </center>
  </div>
    
</body>
</html>
<script src="/js/script.js"></script>