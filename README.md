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

## Struktur Projek
1. app/
   - Controllers :
     Berisi "otak" dari aplikasi yang mengatur alur program.
     ApiController.php,
     AuthController.php,
     BaseController.php,
     ContactController.php,
     DiskonController.php,
     FaqController.php,
     Home.php,
     PembelianController.php,
     ProductCategoryController.php,
     ProdukController.php,
     TransaksiController.php
     
   - Models :
     Berisi file-file yang berfungsi sebagai jembatan ke database.
     DiskonModel.php,
     ProductCategoryModel.php,
     ProductModel.php,
     TransactionDetailModel.php,
     TransactionModel.php,
     UserModel.php
     
   - Views :
     Berisi semua file tampilan (HTML) yang dilihat oleh pengguna.
     Folder components (header.php, sidebar.php, footer.php),
     layout.php,
     layout_clear.php,
     v_checkout.php,
     v_contact.php,
     v_diskon.php,
     v_faq.php,
     v_home.php,
     v_keranjang.php,
     v_login.php,
     v_pembelian.php,
     v_productcategory.php,
     v_produk.php,
     v_produkPDF.php,
     v_profile.php,
     
   - Database :
     - Migrations :
       2025-05-09-143741_Product.php,
       2025-05-09-143753_Transaction.php,
       2025-05-09-143808_TransactionDetail.php,
       2025-05-10-091753_ProductCategory.php,
       2025-05-20-105602_User.php,
       2025-06-30-153312_Diskon.php
     - Seeders :
       DiskonSeeder.php,
       ProductCategorySeeder.php,
       ProductSeeder.php,
       UserSeeder.php
       
   - Config :
     Routes.php untuk mengatur URL,
     Filters.php untuk keamanan halaman
3. public/
   - dashboard-toko
     index.php merupakan pintu masuk utama untuk semua permintaan ke aplikasi
   - img, folder untuk menyimpan file-file gambar
   - NiceAdmin
     Berisi template UI
4. .env
    File teks biasa di luar folder app/ yang menyimpan semua pengaturan penting dan rahasia, seperti oneksi Database (Username, password, dan nama database), base URL (alamat utama aplikasi), API key.
