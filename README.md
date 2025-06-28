# QuickTix - Sistem Pemesanan Tiket Event Online

## Deskripsi Project
QuickTix adalah aplikasi web untuk pemesanan tiket event online yang dibangun menggunakan framework CodeIgniter 3. Aplikasi ini memungkinkan pengguna untuk mencari, memilih, dan membeli tiket berbagai jenis event seperti konser, festival, workshop, dan lainnya.

## Fitur Utama
- 🔍 **Pencarian Event**: Fitur pencarian dan filter event berdasarkan kategori
- 🎫 **Pemesanan Tiket**: Sistem pembelian tiket dengan berbagai metode pembayaran
- 📱 **E-Ticket**: Tiket digital dengan QR code untuk validasi
- 👤 **Manajemen User**: Registrasi, login, dan profil pengguna
- 📊 **Dashboard Transaksi**: Riwayat dan status transaksi
- 🔐 **Sistem Keamanan**: Validasi QR code dan autentikasi

## Teknologi yang Digunakan
- **Backend**: PHP 7.4+ dengan CodeIgniter 3
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Icons**: Font Awesome 6
- **QR Code**: API QR Server

## Struktur Database
Aplikasi menggunakan database MySQL dengan tabel utama:
- `users` - Data pengguna
- `tickets` - Data event dan tiket
- `transactions` - Data transaksi pembelian

## Instalasi dan Setup

### Prerequisites
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web server (Apache/Nginx)
- Composer (opsional)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/Ezlryb506/quicktix.git
   cd quicktix
   ```

2. **Setup Database**
   - Buat database MySQL baru
   - Import file `database.sql` atau `quicktix.sql`
   - Konfigurasi database di `application/config/database.php`

3. **Konfigurasi Aplikasi**
   - Edit `application/config/config.php`
   - Set `base_url` sesuai dengan URL server Anda
   - Set `encryption_key` untuk keamanan

4. **Setup Web Server**
   - Pastikan folder `application` dan `system` tidak dapat diakses langsung
   - Set document root ke folder project
   - Aktifkan mod_rewrite untuk Apache

5. **Permissions**
   ```bash
   chmod 755 application/cache
   chmod 755 application/logs
   chmod 755 uploads
   ```

### Konfigurasi Database
Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'your_username',
    'password' => 'your_password',
    'database' => 'quicktix',
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

## Penggunaan

### Akses Aplikasi
- **URL Utama**: `http://your-domain.com/`
- **Halaman Event**: `http://your-domain.com/events/search`
- **Login**: `http://your-domain.com/auth/login`
- **Register**: `http://your-domain.com/auth/register`

### Fitur Admin
- Validasi QR Code: `http://your-domain.com/tickets/validate_qr_page`
- Manajemen transaksi dan tiket

## Deployment

### Shared Hosting
1. Upload semua file ke folder `public_html`
2. Import database
3. Konfigurasi database dan base_url
4. Set permissions folder

### VPS/Dedicated Server
1. Clone repository ke server
2. Setup web server (Apache/Nginx)
3. Konfigurasi virtual host
4. Setup SSL certificate
5. Konfigurasi database dan aplikasi

## Struktur Folder
```
quicktix/
├── application/          # Kode aplikasi utama
│   ├── config/          # Konfigurasi
│   ├── controllers/     # Controller
│   ├── models/          # Model
│   ├── views/           # View
│   └── ...
├── system/              # Framework CodeIgniter
├── uploads/             # File upload
├── index.php            # Entry point
└── README.md           # Dokumentasi
```

## Kontribusi
1. Fork repository
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi
Project ini dilisensikan di bawah MIT License - lihat file [LICENSE](LICENSE) untuk detail.

## Kontak
- **Email**: your-email@example.com
- **GitHub**: [@username](https://github.com/Ezlryb506)

## Screenshots
[Tambahkan screenshot aplikasi di sini]

## Changelog
### v1.0.0 (2025-01-XX)
- Initial release
- Fitur pencarian dan pemesanan tiket
- Sistem autentikasi user
- Validasi QR code
- Pagination pada halaman event

---
**Dibuat dengan ❤️ menggunakan CodeIgniter 3** 