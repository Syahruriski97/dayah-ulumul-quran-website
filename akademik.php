<?php
$page_title = 'Program Akademik';
$page_description = 'Program pendidikan yang ditawarkan oleh Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get academic programs
$akademik_query = "SELECT * FROM akademik ORDER BY id ASC";
$akademik_result = $conn->query($akademik_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Program Akademik</h1>
            <p>Pilihan program pendidikan yang kami tawarkan</p>
        </div>
    </div>
</section>

<!-- Academic Programs Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Unit Pendidikan</h2>
            <p>Tiga unit pendidikan utama yang kami sediakan</p>
        </div>
        
        <div class="row">
            <?php if ($akademik_result->num_rows > 0): ?>
                <?php while ($akademik = $akademik_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass text-center">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <?php if ($akademik['icon']): ?>
                                    <i data-feather="<?php echo htmlspecialchars($akademik['icon']); ?>"></i>
                                <?php else: ?>
                                    <i data-feather="school"></i>
                                <?php endif; ?>
                            </div>
                            <h3 class="card-title"><?php echo htmlspecialchars($akademik['nama_unit']); ?></h3>
                            <p class="card-text">
                                <?php echo htmlspecialchars($akademik['deskripsi']); ?>
                            </p>
                            <a href="#<?php echo strtolower(str_replace(' ', '', $akademik['nama_unit'])); ?>" 
                               class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="card glass">
                        <p>Data program akademik belum tersedia.</p>
                </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Detailed Program Sections -->
<?php
$akademik_result->data_seek(0);
while ($akademik = $akademik_result->fetch_assoc()):
    $id = strtolower(str_replace(' ', '', $akademik['nama_unit']));
?>
    <section class="section" style="background: var(--accent-color);" id="<?php echo $id; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card glass">
                        <h2 style="color: var(--primary-color); margin-bottom: 1.5rem;">
                            <?php echo htmlspecialchars($akademik['nama_unit']); ?>
                        </h2>
                        
                        <div class="row">
                            <div class="col-8">
                                <h3 style="margin-bottom: 1rem;">Deskripsi Program</h3>
                                <p style="text-align: justify; line-height: 1.8; margin-bottom: 1.5rem;">
                                    <?php echo htmlspecialchars($akademik['deskripsi']); ?>
                                </p>
                                
                                <h3 style="margin-bottom: 1rem;">Kurikulum</h3>
                                <ul style="line-height: 1.8; margin-bottom: 1.5rem;">
                                    <li>Al-Qur'an dan Hadits</li>
                                    <li>Aqidah Akhlak</li>
                                    <li>Fiqih</li>
                                    <li>Sejarah Islam</li>
                                    <li>Bahasa Arab</li>
                                    <li>Matematika</li>
                                    <li>IPA</li>
                                    <li>IPS</li>
                                    <li>Bahasa Indonesia</li>
                                    <li>Bahasa Inggris</li>
                                </ul>
                                
                                <h3 style="margin-bottom: 1rem;">Fasilitas</h3>
                                <ul style="line-height: 1.8; margin-bottom: 1.5rem;">
                                    <li>Ruang kelas ber-AC</li>
                                    <li>Perpustakaan</li>
                                    <li>Laboratorium komputer</li>
                                    <li>Laboratorium sains</li>
                                    <li>Masjid</li>
                                    <li>Asrama</li>
                                    <li>Lapangan olahraga</li>
                                </ul>
                            </div>
                            
                            <div class="col-4">
                                <h3 style="margin-bottom: 1rem;">Informasi</h3>
                                <div style="background: var(--primary-color); color: white; padding: 1.5rem; border-radius: 10px;">
                                    <h4 style="margin-bottom: 1rem;">Pendaftaran</h4>
                                    <p style="margin-bottom: 1rem;">Pendaftaran santri baru dibuka setiap tahun ajaran baru.</p>
                                    <a href="contact.php" class="btn btn-outline" style="background: white; color: var(--primary-color);">
                                        Daftar Sekarang
                                    </a>
                                </div>
                                
                                <div style="margin-top: 1.5rem;">
                                    <h4 style="margin-bottom: 0.5rem;">Kontak</h4>
                                    <p style="font-size: 0.9rem;">
                                        <i data-feather="phone"></i> +62 812-3456-7890<br>
                                        <i data-feather="mail"></i> info@dayahulumulquran.ac.id
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Keunggulan Program Kami</h2>
            <p>Apa yang membuat program kami unggul</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book"></i>
                    </div>
                    <h4>Kurikulum Terpadu</h4>
                    <p>Pendidikan agama dan umum yang seimbang untuk persiapan masa depan yang komprehensif.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Pengajar Berpengalaman</h4>
                    <p>Tim pengajar yang kompeten dan berpengalaman di bidangnya masing-masing.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="home"></i>
                    </div>
                    <h4>Fasilitas Lengkap</h4>
                    <p>Sarana dan prasarana pendidikan yang memadai untuk mendukung proses belajar mengajar.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Bergabung dengan Kami</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Jadilah bagian dari Dayah Ulumul Qur'an dan raih masa depan yang gemilang.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="contact.php" class="btn btn-primary">Daftar Sekarang</a>
                <a href="contact.php" class="btn btn-outline">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
