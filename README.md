# Final Proyek Web Programming 2

<ul>
  <li>Mata Kuliah: Web Programming 2</li>
  <li>Dosen Pengampu: <a href="https://github.com/Muhammad-Ikhwan-Fathulloh">Muhammad Ikhwan Fathulloh</a></li>
</ul>

## Kelompok

<ul>
  <li>Kelompok: 2</li>
  <li>Proyek: Puskesmas App</li>
  <li>Anggota:</li>
  <ul>
    <li>Ketua: <a href="">Andri Nugroho</a></li>
    <li>Anggota 1: <a href="https://github.com/anwarajijuloh">Anwar Ajijuloh</a></li>
    <li>Anggota 2: <a href="">Andri Nugroho</a></li>
  </ul>
</ul>

## Judul Proyek

<p>Aplikasi Puskesmas</p>

## Penjelasan Proyek

<p>Aplikasi yang digunakan untuk mengambil antrian secara online sehingga pasien tidak perlu lagi menebak nebak ramai tidaknya antrian dipuskesmas karena sudah diintegrasikan secara online.</p>
<p>Selain dapat mengambil antrian secara online, pasien dapat melihat riwayat kesehatan dari dokter dan resep yang diberikan oleh dokter.</p>

## Komponen Proyek

### Landing page puskesmas

<ul>
    <li>Route : /</li>
    <ul>
      <li>Headline aplikasi puskesmas</li>
    </ul>
</ul>
<ul>
    <li>Route : /queue</li>
    <ul>
      <li>Info antrian hari ini di puskesmas</li>
    </ul>
</ul>
<ul>
    <li>Route : /poli</li>
    <ul>
      <li>Poli yang tersedia di aplikasi puskesmas</li>
    </ul>
</ul>
<ul>
    <li>Route : /doctor</li>
    <ul>
      <li>Dokter yang terdaftar dan bekerja di puskesmas</li>
    </ul>
</ul>
<ul>
    <li>Route : /about</li>
    <ul>
      <li>Tentang pembuat aplikasi puskesmas</li>
    </ul>
</ul>

### Authentication puskesmas

<ul>
    <li>Route : /pasien/login</li>
    <ul>
      <li>Menampilkan halaman login untuk pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/register</li>
    <ul>
      <li>Menampilkan halaman pendaftaran pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/logout</li>
    <ul>
      <li>Menjalankan authtentikasi logout untuk pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/login</li>
    <ul>
      <li>Menampilkan halaman login dokter</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/logout</li>
    <ul>
      <li>Menjalankan authtentikasi logout untuk dokter</li>
    </ul>
</ul>

### Dashboard Pasien puskesmas

<ul>
    <li>Route : /pasien/dashboard</li>
    <ul>
      <li>Menampilkan informasi seputar pasien dengan sistem</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/queue</li>
    <ul>
      <li>Menampilkan daftar list antrian yang dilakukan pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/history</li>
    <ul>
      <li>Menampilkan riwayat kesehatan pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/profile</li>
    <ul>
      <li>Menampilkan informasi profile pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /pasien/setting</li>
    <ul>
      <li>Menampilkan pengaturan profile pasien</li>
    </ul>
</ul>

### Dashboard Dokter puskesmas

<ul>
    <li>Route : /dokter/dashboard</li>
    <ul>
      <li>Menampilkan informasi seputar dokter dengan sistem</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/queue</li>
    <ul>
      <li>Menampilkan daftar list antrian yang dilakukan semua pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/history</li>
    <ul>
      <li>Menampilkan riwayat kesehatan semua pasien</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/profile</li>
    <ul>
      <li>Menampilkan informasi profile dokter</li>
    </ul>
</ul>
<ul>
    <li>Route : /dokter/setting</li>
    <ul>
      <li>Menampilkan pengaturan profile dokter</li>
    </ul>
</ul>

## Instalasi pengguna

<ul>
  <li>install package  :<i>npm install</i></li>
  <li>migrasi database : <i>php artisan migrate</i></li>
  <li>seeder dummy data : <i>php artisan db:seed</i></li>
  <li>menjalankan tailwind : <i>npm run dev</i></li>
</ul>

## Pembagian Tim

<p>Lorem ipsum sir dolor amet.</p>

## Demo Proyek

<ul>
  <li>Github: <a href="https://github.com/anwarajijuloh/puskesmas-app">puskesmas-app</a></li>
  <li>Youtube: <a href="">Youtube</a></li>
</ul>
