# Jelajah Alam

Aplikasi wisata alam dan edukasi lingkungan berbasis PHP native, MySQL, HTML, CSS, JavaScript dengan pola MVC.

## Kebutuhan
- PHP 8.0+ (ekstensi PDO MySQL aktif)
- MySQL 5.7+ atau MariaDB
- Apache (disarankan XAMPP)

## Cara menjalankan
1. Ekstrak folder `jelajah-alam` ke `C:/xampp/htdocs/`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buka phpMyAdmin, pilih Import, lalu impor `database/jelajah_alam.sql`.
4. Periksa `config/config.php`. Default XAMPP: host `localhost`, database `jelajah_alam`, user `root`, password kosong.
5. Buka `http://localhost/jelajah-alam/public`.

Jika folder atau port berbeda, sesuaikan `BASE_URL` di `config/config.php`.

## Login admin demo
- Username: `admin`
- Password: `password`

Segera ganti password demo sebelum aplikasi dipublikasikan. Untuk penggunaan produksi, tambahkan fitur ganti password, validasi URL gambar, pembatasan percobaan login, logging, dan konfigurasi HTTPS.

## Struktur MVC
- `app/models`: query dan akses database
- `app/views`: antarmuka pengguna
- `app/controllers`: logika alur aplikasi
- `app/core`: Database, Model, Controller
- `config`: konfigurasi aplikasi
- `public`: front controller, aset, dan routing
- `database`: skema dan data awal

## Catatan
Aplikasi ini merupakan starter project pembelajaran. Form admin sudah memakai prepared statements melalui PDO, password hashing/verification, session regeneration, dan token CSRF. Fitur upload gambar lokal dan edit artikel belum disertakan; gambar wisata menggunakan URL.
