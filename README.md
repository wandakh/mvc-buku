# MVC PHP Native - Data Buku

Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.
Tema: pengelolaan data buku perpustakaan.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke folder web server (`htdocs` untuk XAMPP, `www` untuk Laragon).
2. Import `database/perpustakaan.sql` (phpMyAdmin menu Import, atau `mysql -u root -p < database/perpustakaan.sql`).
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/mvc-buku/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request, validasi, dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point aplikasi dan aset CSS.

## Fitur
- Menampilkan data buku
- Menambah, mengubah, dan menghapus data buku
- Validasi input (field wajib, format ISBN, tahun terbit, stok)
- Pesan berhasil dan gagal untuk setiap operasi
- Prepared statement (PDO) dan escaping output

## Atribut Buku
ISBN (unik), judul, penulis, penerbit, tahun terbit, stok.

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan.
