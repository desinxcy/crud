# CRUD Mahasiswa – Laravel 11 + Bootstrap 5

Project ini adalah aplikasi **CRUD (Create, Read, Update, Delete)** sederhana untuk data *Mahasiswa* berbasis **Laravel 11** dengan fitur tambahan:

- ✅ Pencarian (Search)
- ✅ Pagination
- ✅ Ekspor **PDF**
- ✅ Ekspor **Excel**
- ✅ Validasi form & notifikasi
- ✅ Tampilan rapi menggunakan **Bootstrap 5**

> File blade yang ada: `index.blade.php`, `create.blade.php`, `edit.blade.php`, `pdf.blade.php`, `excel.blade.php`.

---

## 📦 Tech Stack
- **PHP 8.2+**
- **Laravel 11**
- **MySQL / MariaDB** *(opsional: SQLite)*
- **Bootstrap 5**
- **Laravel-Excel** (untuk ekspor Excel, jika digunakan)
- **dompdf / snappy** (untuk ekspor PDF, salah satu)

---

## 🚀 Fitur Utama
- **Daftar Mahasiswa** dengan tabel responsif, **search**, dan **pagination**.
- **Tambah / Edit / Hapus** data mahasiswa.
- **Cetak PDF** dan **Export Excel** dari daftar mahasiswa.
- **Validasi sisi server** (dan pesan error ramah pengguna).
- **Flash message** untuk sukses / gagal.
- Rute bernama, contoh: `mahasiswa.index`, `mahasiswa.create`, `mahasiswa.pdf`, `mahasiswa.export`.

---

## 📝 Prasyarat
- PHP **8.2** atau lebih baru
- Composer
- Database: **MySQL/MariaDB** atau **SQLite**
- Ekstensi PHP: `mbstring`, `openssl`, `pdo`, `curl`, `json`, `xml`, `zip`

---

## ⚙️ Instalasi & Menjalankan Aplikasi

```bash
# 1) Clone repo (atau salin folder project)
git clone <url-repo-anda> crud-mahasiswa
cd crud-mahasiswa

# 2) Install dependency
composer install

# 3) Salin env & generate key
cp .env.example .env
php artisan key:generate

# 4) Atur koneksi database di .env
# Lihat contoh konfigurasi di bawah

# 5) Jalankan migrasi (opsional: seed)
php artisan migrate
# php artisan db:seed

# 6) Jalankan server pengembangan
php artisan serve
