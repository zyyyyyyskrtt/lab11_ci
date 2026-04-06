# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


# Result Photo
![foto](https://github.com/zyyyyyyskrtt/lab11_ci/blob/ce6dd264d3e5560327ab7df5ab09f59b04b178cf/result%20photo/Screenshot%202026-04-02%20082534.png)

# 1. Tampilan visual

Form Input: Terdapat dua kolom input, yaitu `Email address` dan Password. Ini dibuat menggunakan class dari Bootstrap (`form-control`) agar tampilannya bersih.

Keamanan (Flashdata): Kalau kamu perhatikan di kodenya, ada blok untuk menampilkan Flashdata (`session()->getFlashdata('flash_msg')`). Kalau kamu salah memasukkan email atau password, pesan error (warna merah) akan muncul tepat di bawah tulisan "Sign In".

# Alur Kerja Saat Tombol "login" Diklik (Controller & model)

Kirim Data (POST): Data email dan password dikirim ke sistem menggunakan metode `POST`.

Pengecekan di Controller (`User.php`): Controller akan menangkap data tersebut.

Pencarian di Database (`UserModel`): Controller menyuruh `UserModel` untuk mencari apakah `Email` yang dimasukkan ada di dalam tabel `user` di database MySQL kamu.

Verifikasi Password: Kalau emailnya ketemu, sistem akan mencocokkan password yang kamu ketik dengan password acak (hash) yang ada di database menggunakan fungsi `password_verify()`.

Pembuatan Sesi (Session): Jika email dan password cocok, sistem akan mencatat identitas kamu ke dalam Session (memberikan status   `'logged_in' => TRUE`). Sesi ini ibarat "kartu ID/akses" sementaramu.

Redirect (Pindah Halaman): Setelah punya "kartu ID", kamu akan otomatis dilempar masuk ke halaman khusus admin (yaitu ke rute `/admin/artikel`).

# 3. Cara Ngetes 

Coba masukkan data akun dummy yang sudah kamu buat pakai Database Seeder sebelumnya:

Email: `admin@email.com`

Password: `admin123`

![foto](https://github.com/zyyyyyyskrtt/lab11_ci/blob/ce6dd264d3e5560327ab7df5ab09f59b04b178cf/result%20photo/Screenshot%202026-04-02%20082554.png)

# 1. View Layout 

Mulai dari judul "Layout Sederhana" di paling atas, pita navigasi warna biru (Home, Artikel, About, Kontak), sampai baris hitam "© 2021 Universitas Pelita Bangsa" di paling bawah, itu semua adalah View Layout .

Ini asalnya dari file `layout/main.php`. Layout ini bertindak sebagai bungkus luar yang bentuknya akan selalu sama, apa pun halaman yang lagi lu buka.

# 2. View Biasa 

Bagian putih di sebelah kiri yang ada tulisan "Halaman About" itu adalah View biasa (dari file `about.php`).

Konten ini disuntikkan ke dalam View Layout menggunakan fungsi `$this->section('content')`. Kalau lu klik menu "Home" atau "Kontak", area kiri inilah yang bakal berubah-ubah isinya menyesuaikan halaman yang dipanggil, sementara header dan footernya tetap diam.

# 3. View Cell

Nah, kotak biru "Artikel Terkini" di sidebar kanan itu adalah hasil kerja View Cell .

Di sini kelihatan jelas perbedaan View Cell dan View biasa: View Cell itu bisa manggil datanya sendiri (narik judul "Artikel Keempat", "Artikel ketiga", dll. dari database) tanpa peduli lu lagi ada di controller apa . Jadi, komponen ini sangat modular dan bisa dipasang di halaman mana aja dengan gampang.

Dua kotak di bawahnya ("Widget Header" dan "Widget Text") itu cuma kode HTML biasa yang diselipin manual di dalam layout .

![foto](https://github.com/zyyyyyyskrtt/lab11_ci/blob/ce6dd264d3e5560327ab7df5ab09f59b04b178cf/result%20photo/Screenshot%202026-04-02%20082611.png)

# 1. Menampilkan Data (Read)

Tabel berwarna biru ini membuktikan bahwa fungsi `admin_index()` di Controller `Artikel.php` lu udah berhasil terkoneksi ke database `lab_ci4`. Kode `$model->findAll()` berhasil menarik data dari tabel artikel dan menampilkannya satu per satu menggunakan looping `foreach` di dalam file view `admin_index.php`.

# 2. Tambah data  (Create)

di situ udah ada "Artikel ketiga" dan "Artikel Keempat". Ini berarti dah sukses mencoba ngeklik menu "Tambah Artikel", ngisi form-nya, dan datanya berhasil masuk (insert) ke dalam database MySQL tanpa kendala.

# 3. Tombol aksi (Update & Delete)

Di kolom paling kanan ada tombol Ubah (Abu-abu) dan Hapus (Merah).

  * Kalau di klik Ubah, dia bakal ngebawa ke form edit (form_edit.php) beserta data artikel tersebut.

  * Kalau di klik Hapus, bakal muncul peringatan "Yakin menghapus data?", dan kalau di-oke-in, artikelnya bakal lenyap         dari database.


![foto](https://github.com/zyyyyyyskrtt/lab11_ci/blob/ce6dd264d3e5560327ab7df5ab09f59b04b178cf/result%20photo/Screenshot%202026-04-02%20082623.png)

# 1. Menampilkan Data Dinamis (Read)

Kalau di awal praktikum lu cuma masukin "Artikel pertama" dan "Artikel kedua" lewat phpMyAdmin/MySQL, sekarang lu bisa lihat "Artikel ketiga" dan "Artikel Keempat" udah otomatis muncul di halaman depan. Ini membuktikan bahwa data yang lu input dari halaman Admin tadi berhasil masuk ke database dan sukses ditarik ke halaman publik ini.

# 2. Struktur Berjalan

Di balik layar, ini adalah hasil kerja keras dari fungsi `index()` pada controller `Artikel.php` yang ngejalanin perintah `$model->findAll()`. Data tersebut kemudian dilempar ke view `artikel/index.php`, lalu diurai satu per satu pakai fungsi looping `foreach` sehingga membentuk urutan artikel ke bawah.

# 3. Implementasi css

Tampilan halamannya udah persis banget sama target di modul praktikum:

  * Layout 2 Kolom: Area konten utama di sebelah kiri (70%) dan area Widget/Sidebar di sebelah kanan (30%) udah terbagi rapi menggunakan fungsi flex di CSS lu.

  * Styling Artikel: Judul artikelnya udah berubah jadi warna abu-abu elegan (tanpa garis bawah warna biru lagi), dan teks isinya udah punya warna yang lebih soft.

  * Garis Pembatas: Tag `<hr class="divider">` udah sukses ngebentuk garis tipis abu-abu di antara setiap artikel biar kelihatan rapi.
