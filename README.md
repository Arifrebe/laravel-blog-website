# 📝 Laravel Blog Website

Proyek ini adalah sebuah **Blog Website berbasis Laravel 9** yang dirancang untuk menampilkan konten artikel, memungkinkan pengguna membaca artikel berdasarkan kategori dan tag.

---

## 🚀 Fitur Utama

- ✅ Halaman blog dengan tampilan profesional
- ✅ Manajemen artikel (Create, Read, Update, Delete)
- ✅ Kategori dan tag untuk mengelompokkan artikel
- ✅ Panel admin untuk kelola konten
- ✅ Autentikasi pengguna (Login & Register)

---

## 🧰 Stack Teknologi

- **Framework:** Laravel 9
- **Frontend:** Blade, Bootstrap 5, AOS (Animate on Scroll)
- **Database:** MySQL / MariaDB
- **Icons:** Bootstrap Icons / Font Awesome

---

## ⚙️ Cara Instalasi

> Ikuti langkah berikut jika ingin menjalankan proyek ini secara lokal:

```bash
# 1. Clone repo
git clone https://github.com/Arifrebe/laravel-blog.git
cd laravel-blog

# 2. Install dependensi
composer install

# 3. Copy file env dan generate key
cp .env.example .env
php artisan key:generate

# 4. Atur database di file .env lalu migrasi & seed
php artisan migrate --seed

# 5. (Opsional) Buat symbolic link untuk storage
php artisan storage:link

# 6. Jalankan project
php artisan serve

```

## 🚧 Status Proyek
Proyek ini masih dalam tahap pengembangan (Work in Progress) dan terbuka untuk kontribusi siapa pun yang ingin membantu mengembangkan fitur, menyempurnakan tampilan, atau menambah dokumentasi.

