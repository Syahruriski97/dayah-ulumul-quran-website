-- Database: dayah_ulumul_quran
-- Website Dayah Ulumul Qur'an Yayasan Quba' Bebesen

CREATE DATABASE IF NOT EXISTS dayah_ulumul_quran;
USE dayah_ulumul_quran;

-- Tabel Admin
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Berita
CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    gambar VARCHAR(255),
    tanggal DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel Struktur Organisasi
CREATE TABLE struktur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jabatan VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20),
    foto VARCHAR(255),
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Tentang (Visi, Misi, Sejarah)
CREATE TABLE tentang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis ENUM('visi', 'misi', 'sejarah') NOT NULL,
    konten TEXT NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel Galeri
CREATE TABLE galeri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gambar VARCHAR(255) NOT NULL,
    deskripsi VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Agenda
CREATE TABLE agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Pengajar
CREATE TABLE pengajar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    bidang VARCHAR(100) NOT NULL,
    foto VARCHAR(255),
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Download
CREATE TABLE download (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    file VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Testimoni
CREATE TABLE testimoni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tahun VARCHAR(4) NOT NULL,
    isi TEXT NOT NULL,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Statistik
CREATE TABLE statistik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    putra INT DEFAULT 0,
    putri INT DEFAULT 0,
    total INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel Akademik
CREATE TABLE akademik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_unit VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    icon VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Slider Banner
CREATE TABLE slider (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255) NOT NULL,
    aktif TINYINT(1) DEFAULT 1,
    urutan INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data default
INSERT INTO admin (username, password, nama) VALUES 
('admin', MD5('admin123'), 'Administrator');

INSERT INTO tentang (jenis, konten) VALUES 
('visi', 'Menjadi lembaga pendidikan Islam yang unggul dalam mencetak generasi Qur\'ani yang berakhlak mulia, berpengetahuan luas, dan bermanfaat bagi umat.'),
('misi', '1. Menyelenggarakan pendidikan Islam yang berkualitas\n2. Membentuk karakter santri yang berakhlak mulia\n3. Mengembangkan potensi santri secara optimal\n4. Menjadi pusat kajian Al-Qur\'an dan ilmu keislaman'),
('sejarah', 'Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen didirikan pada tahun 2010 dengan tujuan mencetak generasi Qur\'ani yang berakhlak mulia. Berawal dari sebuah musholla kecil, kini telah berkembang menjadi lembaga pendidikan Islam yang memiliki berbagai jenjang pendidikan.');

INSERT INTO statistik (putra, putri, total) VALUES (150, 120, 270);

INSERT INTO akademik (nama_unit, deskripsi, icon) VALUES 
('MTs Ulumul Qur\'an', 'Madrasah Tsanawiyah dengan kurikulum terpadu antara ilmu agama dan umum', 'school'),
('MA Ulumul Qur\'an', 'Madrasah Aliyah yang mempersiapkan santri untuk melanjutkan ke perguruan tinggi', 'graduation-cap'),
('Tahfidz', 'Program khusus menghafal Al-Qur\'an dengan metode yang efektif dan menyenangkan', 'book-open');

INSERT INTO berita (judul, isi, gambar, tanggal) VALUES 
('Pembukaan Tahun Ajaran Baru 2024/2025', 'Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen dengan bangga mengumumkan pembukaan tahun ajaran baru 2024/2025. Kegiatan ini diawali dengan upacara pembukaan yang dihadiri oleh seluruh santri, pengajar, dan wali santri.', 'berita1.jpg', '2024-07-15'),
('Wisuda Tahfidz Angkatan ke-5', 'Sebanyak 25 santri berhasil menyelesaikan program tahfidz Al-Qur\'an 30 juz. Kegiatan wisuda ini merupakan puncak dari perjuangan panjang para santri dalam menghafal kitab suci Al-Qur\'an.', 'berita2.jpg', '2024-06-20'),
('Peringatan Maulid Nabi Muhammad SAW', 'Dalam rangka memperingati Maulid Nabi Muhammad SAW, Dayah Ulumul Qur\'an mengadakan berbagai kegiatan seperti ceramah, sholawat, dan santunan anak yatim.', 'berita3.jpg', '2024-09-28');
