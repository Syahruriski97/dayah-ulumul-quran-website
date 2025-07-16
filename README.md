# Website Dayah Ulumul Qur'an Yayasan Quba' Bebesen

Website resmi Dayah Ulumul Qur'an Yayasan Quba' Bebesen - Lembaga Pendidikan Islam Terpadu dengan teknologi PHP Native + MySQL.

## 🚀 Fitur Utama

### Frontend
- ✅ Desain modern dengan glassmorphism effect
- ✅ Responsive design untuk semua perangkat
- ✅ 11 halaman utama (Home, About, Yayasan, Struktur, Berita, Akademik, Galeri, Agenda, Pengajar, Download, Testimoni)
- ✅ Sistem berita dengan pagination
- ✅ Galeri foto dengan lightbox
- ✅ Kalender kegiatan
- ✅ Testimoni alumni

### Backend Admin
- ✅ Login system dengan session management
- ✅ Dashboard dengan statistik
- ✅ CRUD untuk semua konten (berita, galeri, pengajar, struktur, agenda, download, testimoni)
- ✅ Rich text editor (CKEditor) untuk konten berita
- ✅ Upload file dan gambar
- ✅ Responsive admin panel

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP Native
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **CSS Framework**: Custom CSS dengan glassmorphism design
- **Font**: Google Fonts (Poppins)
- **Icons**: Feather Icons
- **Editor**: CKEditor untuk konten berita

## 📁 Struktur Folder

```
/
├── admin/                    # Panel admin
│   ├── index.php            # Dashboard admin
│   ├── login.php            # Login admin
│   ├── logout.php           # Logout admin
│   ├── berita/              # CRUD berita
│   ├── galeri/              # CRUD galeri
│   ├── pengajar/            # CRUD pengajar
│   ├── struktur/            # CRUD struktur
│   ├── agenda/              # CRUD agenda
│   ├── download/            # CRUD download
│   ├── testimoni/           # CRUD testimoni
│   ├── tentang/             # Edit visi, misi, sejarah
│   └── slider/              # CRUD slider
├── css/                     # File CSS
│   └── style.css           # CSS utama dengan glassmorphism
├── js/                      # File JavaScript
│   └── main.js             # JavaScript utama
├── inc/                     # Komponen include
│   ├── header.php          # Header website
│   └── footer.php          # Footer website
├── config/                  # Konfigurasi
│   └── database.php        # Koneksi database
├── img/                     # File gambar
│   └── uploads/            # Upload folder
├── downloads/               # File download
├── berita/detail.php        # Detail berita
├── database.sql            # SQL database
└── README.md               # Dokumentasi
```

## 🎨 Desain

- **Background**: Dominan putih
- **Glassmorphism**: Efek kaca pada header, card, dan dropdown
- **Warna Aksen**: Hijau pastel (#A8D5BA)
- **Font**: Poppins (Google Fonts)
- **Responsive**: Mobile-first design

## 🗄️ Database

File `database.sql` berisi struktur tabel lengkap dengan data contoh.

### Tabel Utama:
- `admin` - Data admin
- `berita` - Berita dan artikel
- `struktur` - Struktur kepengurusan
- `tentang` - Visi, misi, sejarah
- `galeri` - Galeri foto
- `agenda` - Jadwal kegiatan
- `pengajar` - Data pengajar
- `download` - File download
- `testimoni` - Testimoni alumni
- `statistik` - Data jumlah santri
- `akademik` - Program akademik
- `slider` - Slider banner

## 🚀 Instalasi

### Persyaratan Sistem:
- PHP 7.4 atau lebih baru
- MySQL 5.7 atau lebih baru
- Web server (Apache/Nginx)

### Langkah Instalasi:

1. **Clone atau Download Repository**
   ```bash
   git clone [repository-url]
   cd dayah-ulumul-quran
   ```

2. **Setup Database**
   - Buat database baru di MySQL
   - Import file `database.sql`
   - Atau jalankan query dalam file tersebut

3. **Konfigurasi Database**
   - Edit file `config/database.php`
   - Sesuaikan dengan kredensial database Anda

4. **Setup Folder Upload**
   - Pastikan folder `img/uploads/` memiliki permission 755
   - Pastikan folder `downloads/` memiliki permission 755

5. **Akses Website**
   - Frontend: http://localhost/dayah-ulumul-quran/
   - Admin: http://localhost/dayah-ulumul-quran/admin/
   - Login default: username: admin, password: admin123

## 🔐 Login Admin

**Default Login:**
- Username: admin
- Password: admin123

**Catatan:** Ganti password default setelah login pertama kali.

## 📱 Responsive Design

Website ini telah dioptimalkan untuk:
- Desktop (1920px ke atas)
- Tablet (768px - 1024px)
- Mobile (320px - 767px)

## 🎯 Fitur Khusus

### Glassmorphism Effect
```css
.glass {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}
```

### Counter Animation
Animasi counter untuk statistik dengan JavaScript.

### Lightbox Gallery
Modal popup untuk galeri foto.

### Mobile Menu
Hamburger menu untuk perangkat mobile.

## 📝 Penggunaan Admin Panel

### Kelola Berita
1. Login ke admin panel
2. Pilih "Kelola Berita"
3. Tambah/Edit/Hapus berita
4. Gunakan CKEditor untuk konten

### Upload Gambar
1. Pastikan gambar dalam format JPG, PNG, atau GIF
2. Maksimal ukuran file: 2MB
3. Gambar akan di-resize otomatis

## 🔧 Troubleshooting

### Masalah Upload
- Pastikan folder uploads memiliki permission 755
- Periksa ukuran file dan format
- Periksa konfigurasi PHP (upload_max_filesize)

### Masalah Database
- Pastikan koneksi database benar
- Periksa struktur tabel
- Import ulang database.sql jika perlu

## 📞 Kontak

Untuk bantuan teknis:
- Email: info@dayahulumulquran.ac.id
- Phone: +62 812-3456-7890

## 📄 Lisensi

Proyek ini dikembangkan untuk Dayah Ulumul Qur'an Yayasan Quba' Bebesen.
