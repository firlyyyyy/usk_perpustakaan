# 📚 Perpustakaan Sederhana

Aplikasi **Perpustakaan Sederhana** digunakan untuk mengelola data buku dan peminjaman buku. Aplikasi ini memungkinkan **petugas** untuk mengelola data buku, serta **pengunjung** untuk meminjam buku yang tersedia.

## ✨ Fitur Utama

- 🔐 **Login untuk petugas dan pengunjung**
- 📚 **CRUD Buku** (Tambah, Lihat, Ubah, Hapus) - hanya untuk petugas
- 🌟 **Peminjaman Buku** - hanya untuk pengunjung

## 🛠️ Teknologi yang Digunakan

- **PHP** (Backend)
- **MySQL** (Database)
- **CSS** (Frontend Styling)
- **HTML** (Markup Language)

## 📊 Struktur Database (Singkat)

**Tabel `buku`**

- `id_buku` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `judul` (VARCHAR)
- `pengarang` (VARCHAR)
- `penerbit` (VARCHAR)
- `tahun_terbit` (YEAR)
- `stok` (INT)

**Tabel `pengguna`**

- `id_pengguna` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `username` (VARCHAR)
- `password` (VARCHAR)
- `level` (ENUM: 'petugas', 'pengunjung')

**Tabel `peminjaman`**

- `id_peminjaman` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `id_pengguna` (INT, FOREIGN KEY)
- `id_buku` (INT, FOREIGN KEY)
- `tanggal_pinjam` (DATE)
- `tanggal_kembali` (DATE)

---