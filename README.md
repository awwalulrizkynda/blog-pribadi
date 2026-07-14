# Blog Pribadi Laravel

## Deskripsi

Blog Pribadi adalah aplikasi web sederhana yang dibangun menggunakan framework Laravel. Aplikasi ini digunakan untuk mengelola artikel blog dengan sistem autentikasi pengguna. Setiap pengguna dapat membuat kategori sendiri, menambahkan artikel, mengubah data artikel, menghapus artikel, serta melihat artikel yang telah dipublikasikan pada halaman utama.

Aplikasi ini dibuat sebagai tugas mata kuliah Pengembangan Web.

---

## Teknologi yang Digunakan

- Laravel 12
- PHP 8.3
- MySQL
- Bootstrap 5
- Blade Template
- Laravel Breeze
- Git & GitHub

---

## Fitur Aplikasi

### Halaman Publik

- Menampilkan daftar artikel yang berstatus Published
- Detail artikel
- Pagination artikel
- Informasi kategori artikel
- Thumbnail artikel

### Halaman Admin

- Login
- Register
- Dashboard
- CRUD Kategori
- CRUD Artikel
- Upload Thumbnail
- Draft dan Published Artikel
- Edit Profil
- Logout

---

## Instalasi

Clone repository

```bash
git clone https://github.com/awwalulrizkynda/blog-pribadi.git
```

Masuk ke folder project

```bash
cd blog-pribadi
```

Install dependency

```bash
composer install
```

Install package frontend

```bash
npm install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`

```env
DB_DATABASE=blog_pribadi
DB_USERNAME=root
DB_PASSWORD=
```

---

## Menjalankan Migration dan Seeder

Jalankan perintah berikut

```bash
php artisan migrate --seed
```

Apabila ingin mengulang database

```bash
php artisan migrate:fresh --seed
```

---

## Storage Link

Supaya thumbnail dapat ditampilkan

```bash
php artisan storage:link
```

---

## Menjalankan Aplikasi

Terminal pertama

```bash
php artisan serve
```

Terminal kedua

```bash
npm run dev
```

Buka browser

```
http://127.0.0.1:8000
```

---

## Akun Demo

### Administrator

Email

```
admin@email.com
```

Password

```
12345678
```

---

## Struktur Database

### users

- id
- name
- email
- password

### categories

- id
- user_id
- name
- slug
- description

### articles

- id
- user_id
- category_id
- title
- slug
- content
- thumbnail
- status

---

## Screenshot Fitur

- Home
- Dashboard
- Manajemen Kategori
- Manajemen Artikel
- Detail Artikel
- Profil Pengguna

---

## Author

Nama : Awwalul Rizky Nanda

NIM : 240170150

Program Studi : Informatika

Universitas : (Isi dengan nama universitas Anda)
