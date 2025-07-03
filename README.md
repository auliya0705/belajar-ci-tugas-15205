# Aplikasi Toko - Pembelajaran Web Lanjut

## Fitur-Fitur
*Fitur Utama Aplikasi Toko*
1. Autentikasi dan Otorisasi
   Terdapat sistem login dan logout dengan hak akses yang berbeda yaitu admin dan guest.
2. Manajemen Produk
   Fitur ini digunakan untuk mengelola produk yang akan dijual, seperti menambah, mengubah/mengedit, dan menghapus data produk beserta gambarnya.
3. Manajemen Kategori
   Fitur yang memberikan fungsionalitas untuk mengelola kategori produk.
4. Manajemen Diskon
   Fitur untuk mengatur diskon harian yang akan berlaku secara otomatis dan mengelola diskon.
5. Katalog Produk
   Pada halaman utama/dashboard menampilkan semua produk yang tersedia untuk dibeli.
6. Keranjang
   Fitur ini merupakan sistem untuk menampung produk yang ingin dibeli, terdapat fitur untuk mengubah kuantitas dan hapus item juga.
7. Checkout dan ongkir otomatis
   Proses checkout yang terintegrasi dengan API RajaOngkir untuk menghitung ongkos kirim secara real-time.
8. Diskon
   Harga diskon secara otomatis pada produk saat dimasukkan ke keranjang dan otomatis berubah sesuai tanggal yang ditentukan.
9. Profil
    Fitur untuk melihat riwayat transaksi pembelian.
10. Ekspor PDF
    Dapat mengunduh daftar produk dalam format PDF.
11. Webservice API
    Menyediakan data transaksi dalam format JSON yang diamankan dengan API Key.

Aplikasi Toko ini secara fungsionalitas dibedakan berdasarkan hak akses pengguna, yaitu Admin dan Guest.
1. Role Admin
   Admin memiliki semua hak akses yang dimiliki pengguna biasa atau guest. Memiliki kewenangan untuk mengelola toko
   - Akses manajemen
     Dapat mengakses halaman untuk mengelola produk, kategori produk, dan diskon.
   - Akses data transaksi
     Dapat melihat seluruh transaksi dari semua pengguna, tidak hanya miliknya sendiri.
   - Ubah status
     Memiliki akses atau wewenang untuk mengubah status pesanan pengguna lain.
   - Ekspor data
     Dapat mengunduh laporan produk dalam bentuk PDF.
3. Role Guest
   Fokus utama peran ini adalah untuk berbelanja. Pengguna guest dapat melakukan semua fitur di atas tetapi hanya bisa melihat riwayat transaksi milik mereka sendiri dan tidak memiliki akses ke menu-menu manajemen seperti pengelolaan produk, diskon, atau data pembelian seluruh pengguna.

## Langkah-Langkah Instalasi
# Persiapan Awal
Sebelum memulai membuat projek, ada beberapa hal yang harus terpasang pada laptop/perangkat lunak, yaitu :
1. Server lokal seperti XAMPP atau laragon
2. Composer sebagai dependency manager untuk mengelola semua library PHP
3. Text editor seperti Visual Studio Code
4. Git untuk manajemen versi dan terhubung ke GitHub

# Membuat dan Konfigurasi Projek
1. Melakukan instalasi CodeIgniter 4 membuat projek menggunakan composer dengan perintah : `composer create-project codeigniter4/appstarter`.
2. Melakukan konfigurasi environment dengan menyalin file env menjadi .env dan melakukan konfigurasi awal, seperti mengatur CI_ENVIRONMENT ke development, app.baseURL, dan mengisi detail koneksi ke database.

# Membangun Database
1. Membuat database baru melalui phpMyAdmin.
2. Membuat struktur tabel menggunakan migrations, lalu menjalankan perintah `php spark migrate` untuk membangun semua tabel secara otomatis.

# Menambah Library Tambahan Menggunakan Composer
1. `dompdf/dompdf` untuk fitur ekspor data produk ke PDF.
2. `guzzlehttp/guzzle` untuk terhubung ke API RajaOngkir dan mengambil data ongkos kirim.
3. `codeigniter4/cart` untuk mengelola fungsionalitas keranjang belanja.
4. `fakerphp/faker` untuk membantu membuat data awal (dummy data) di dalam Seeders.

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

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

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
