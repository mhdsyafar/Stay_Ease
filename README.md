# StayEase

StayEase adalah aplikasi manajemen pemesanan kamar hotel dan penginapan kelas premium (Premium Property & Guest Management). Proyek ini dibangun menggunakan framework **Laravel** dan dikonfigurasi untuk memudahkan pemula dalam memelajari alur pembuatan aplikasi web dengan fitur autentikasi dan relasi database.

---

## 🛠️ Teknologi yang Digunakan

*   **Backend:** PHP 8.3+, Laravel Framework
*   **Frontend:** Tailwind CSS, Alpine.js, Laravel Blade
*   **Autentikasi:** Laravel Breeze (disesuaikan dengan Bahasa Indonesia)
*   **Database:** SQLite (untuk kemudahan development)
*   **Asset Bundler:** Vite

---

## 🏗️ Struktur Database Utama

Sistem ini memiliki 3 tabel utama yang saling berelasi:

### 1. Tabel `users`
Tabel bawaan Laravel untuk mengelola data pengguna (tamu atau admin).
*   `id` (Primary Key)
*   `name`, `email`, `password`

### 2. Tabel `kamar` (Rooms)
Menyimpan informasi tentang kamar yang tersedia.
*   `id_kamar` (Primary Key)
*   `nomor_kamar` (String) - Nomor identitas kamar
*   `tipe_kamar` (String) - Jenis kamar (contoh: Deluxe, Suite)
*   `harga` (Double) - Harga per malam
*   `status_kamar` (Enum) - `tersedia`, `terisi`, `tidak tersedia` (Default: `tersedia`)

### 3. Tabel `boking` (Bookings)
Menyimpan data transaksi pemesanan yang menghubungkan pengguna dengan kamar.
*   `id_boking` (Primary Key)
*   `id_kamar` (Foreign Key) - Berelasi ke tabel `kamar`
*   `id_user` (Foreign Key) - Berelasi ke tabel `users`
*   `tanggal_boking` (Date) - Tanggal transaksi dilakukan
*   `tanggal_check_in` (Date) - Rencana tanggal masuk
*   `tanggal_check_out` (Date) - Rencana tanggal keluar
*   `status_boking` (Enum) - `pending`, `dikonfirmasi`, `selesai`, `batal` (Default: `pending`)

---

## 🚀 Fitur Utama

1.  **Halaman Utama (Landing Page) Premium:** Desain mewah dan responsif untuk menarik pengunjung pertama kali (`/`).
2.  **Sistem Autentikasi (Bahasa Indonesia):** Fitur Login, Register, dan Lupa Password telah diterjemahkan ke Bahasa Indonesia menggunakan struktur *layout* sederhana (bawaan Laravel Breeze) agar mudah dipelajari.
3.  **Relasi Antar Tabel (Cascade Delete):** Jika sebuah kamar atau pengguna dihapus, maka data pemesanan (`boking`) yang terkait juga akan otomatis terhapus untuk menjaga integritas data.

---

## 💻 Cara Menjalankan Proyek (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan StayEase di komputer Anda (menggunakan Laragon/XAMPP):

1.  **Persiapan Lingkungan:** Pastikan PHP, Composer, dan Node.js sudah terinstal.
2.  **Install Dependensi PHP:**
    ```bash
    composer install
    ```
3.  **Install Dependensi Frontend (NPM):**
    ```bash
    npm install
    npm run build
    ```
    *(Gunakan `npm run dev` jika sedang melakukan perubahan pada file CSS/JS agar otomatis direload).*
4.  **Siapkan File Environment:**
    *   Duplikat file `.env.example` dan ubah namanya menjadi `.env`.
    *   Pastikan konfigurasi bahasa sudah diset: `APP_LOCALE=id`
5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```
6.  **Migrasi Database:**
    ```bash
    php artisan migrate
    ```
    *(SQLite database biasanya otomatis terbuat di dalam folder `database/database.sqlite`).*
7.  **Jalankan Server Lokal:**
    ```bash
    php artisan serve
    ```
8.  **Akses di Browser:** Buka `http://127.0.0.1:8000`

### 🔑 Akun Uji Coba (Test Account)
Untuk mempermudah pengujian, Anda bisa login menggunakan akun default berikut (setelah menjalankan `php artisan migrate:fresh --seed`):
*   **Email:** `admin@stayease.com`
*   **Password:** `password`

---

## 📝 Catatan Khusus untuk Pemula

*   **Tampilan Auth:** Jika Anda melihat file di `resources/views/auth/`, strukturnya sengaja dibuat sesederhana mungkin (menggunakan `x-guest-layout` standar) agar Anda mudah memahami bagaimana form mengirim data (menggunakan tag `<form method="POST" action="...">`).
*   **Pesan Error & Bahasa:** Seluruh pesan validasi (seperti "Email wajib diisi") diatur dari dalam folder `lang/id/`. Jika Anda ingin mengubah pesannya, Anda bisa mengedit file `lang/id/validation.php`.
*   **Migrasi:** Jika Anda melakukan kesalahan pada struktur database, Anda bisa menjalankan `php artisan migrate:fresh` untuk menghapus dan membuat ulang semua tabel dari awal (hati-hati, data lama akan hilang).
