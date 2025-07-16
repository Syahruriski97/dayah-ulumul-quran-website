<?php
$page_title = 'Beranda';
$page_description = 'Selamat datang di Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen - Lembaga Pendidikan Islam Terpadu';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get latest news
$berita_query = "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 3";
$berita_result = $conn->query($berita_query);

// Get statistics
$statistik_query = "SELECT * FROM statistik ORDER BY id DESC LIMIT 1";
$statistik_result = $conn->query($statistik_query);
$statistik = $statistik_result->fetch_assoc();

// Get slider images
$slider_query = "SELECT * FROM slider WHERE aktif = 1 ORDER BY urutan ASC";
$slider_result = $conn->query($slider_query);
?>

<!-- Hero Section with Slider -->
<section class="hero">
    <div class="hero-slider">
        <?php if ($slider_result->num_rows > 0): ?>
            <?php while ($slider = $slider_result->fetch_assoc()): ?>
                <div class="hero-slide">
                    <div class="hero-content">
                        <h1><?php echo htmlspecialchars($slider['judul']); ?></h1>
                        <p><?php echo htmlspecialchars($slider['deskripsi']); ?></p>
                        <a href="about.php" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="hero-slide">
                <div class="hero-content">
                    <h1>Selamat Datang di Dayah Ulumul Qur'an</h1>
                    <p>Lembaga Pendidikan Islam Terpadu yang Berkomitmen Mencetak Generasi Qur'ani</p>
                    <a href="about.php" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Statistics Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Statistik Santri</h2>
            <p>Data jumlah santri Dayah Ulumul Qur'an Yayasan Quba' Bebesen</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <div class="stats-card glass">
                    <div class="stats-number counter" data-target="<?php echo $statistik['putra']; ?>">0</div>
                    <div class="stats-label">Santri Putra</div>
                </div>
            </div>
            
            <div class="col-4">
                <div class="stats-card glass">
                    <div class="stats-number counter" data-target="<?php echo $statistik['putri']; ?>">0</div>
                    <div class="stats-label">Santri Putri</div>
                </div>
            </div>
            
            <div class="col-4">
                <div class="stats-card glass">
                    <div class="stats-number counter" data-target="<?php echo $statistik['total']; ?>">0</div>
                    <div class="stats-label">Total Santri</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Update terbaru dari Dayah Ulumul Qur'an</p>
        </div>
        
        <div class="row">
            <?php if ($berita_result->num_rows > 0): ?>
                <?php while ($berita = $berita_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass">
                            <?php if ($berita['gambar']): ?>
                                <img src="img/uploads/berita/<?php echo htmlspecialchars($berita['gambar']); ?>" 
                                     alt="<?php echo htmlspecialchars($berita['judul']); ?>" 
                                     class="card-img">
                            <?php else: ?>
                                <img src="img/default-news.jpg" alt="Berita" class="card-img">
                            <?php endif; ?>
                            
                            <h3 class="card-title"><?php echo htmlspecialchars($berita['judul']); ?></h3>
                            <p class="card-meta">
                                <i data-feather="calendar"></i> 
                                <?php echo formatTanggal($berita['tanggal']); ?>
                            </p>
                            <p class="card-text">
                                <?php echo substr(strip_tags($berita['isi']), 0, 150) . '...'; ?>
                            </p>
                            <a href="berita/detail.php?id=<?php echo $berita['id']; ?>" class="btn btn-primary">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada berita yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="berita.php" class="btn btn-outline">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<!-- Academic Programs Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Program Akademik</h2>
            <p>Pilihan program pendidikan yang kami tawarkan</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="school"></i>
                    </div>
                    <h3 class="card-title">MTs Ulumul Qur'an</h3>
                    <p class="card-text">
                        Madrasah Tsanawiyah dengan kurikulum terpadu antara ilmu agama dan umum, 
                        mempersiapkan santri untuk melanjutkan ke jenjang yang lebih tinggi.
                    </p>
                    <a href="akademik.php#mts" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="graduation-cap"></i>
                    </div>
                    <h3 class="card-title">MA Ulumul Qur'an</h3>
                    <p class="card-text">
                        Madrasah Aliyah yang mempersiapkan santri untuk melanjutkan ke perguruan tinggi 
                        dengan bekal ilmu agama yang kuat dan kemampuan akademik yang mumpuni.
                    </p>
                    <a href="akademik.php#ma" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book-open"></i>
                    </div>
                    <h3 class="card-title">Program Tahfidz</h3>
                    <p class="card-text">
                        Program khusus menghafal Al-Qur'an dengan metode yang efektif dan menyenangkan, 
                        didampingi oleh guru-guru yang berpengalaman.
                    </p>
                    <a href="akademik.php#tahfidz" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Link Cepat</h2>
            <p>Akses cepat ke fitur utama website</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <a href="galeri.php" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="image"></i>
                    </div>
                    <h4>Galeri Kegiatan</h4>
                    <p style="font-size: 0.9rem;">Lihat dokumentasi kegiatan kami</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="agenda.php" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="calendar"></i>
                    </div>
                    <h4>Agenda</h4>
                    <p style="font-size: 0.9rem;">Jadwal kegiatan terbaru</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="pengajar.php" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Pengajar</h4>
                    <p style="font-size: 0.9rem;">Kenali tim pengajar kami</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="download.php" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="download"></i>
                    </div>
                    <h4>Download</h4>
                    <p style="font-size: 0.9rem;">File dan dokumen penting</p>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
