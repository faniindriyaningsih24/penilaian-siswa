let login_siswa = document.getElementById('login_siswa')
let login_guru  = document.getElementById('login_guru')
let login_admin = document.getElementById('login_admin')
let title_login = document.getElementById('title_login')

function tampilkan_login_siswa() {
  login_siswa.style.display = 'block'
  login_guru.style.display = 'none'
  login_admin.style.display = 'none'
  title_login.style.display = 'none'
}

function tampilkan_login_guru() {
  login_siswa.style.display = 'none'
  login_guru.style.display = 'block'
  login_admin.style.display = 'none'
  title_login.style.display = 'none'
}

function tampilkan_login_admin() {
  login_siswa.style.display = 'none'
  login_guru.style.display = 'none'
  login_admin.style.display = 'block'
  title_login.style.display = 'none'
}