<?php
$page_title = 'Daftar Pengajar';
$page_description = 'Daftar pengajar dan guru Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get teachers data
$pengajar_query = "SELECT * FROM pengajar ORDER BY nama ASC";
$pengajar_result = $conn->query($pengajar_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Daftar Pengajar</h1>
            <p>Tim pengajar profesional Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Tim Pengajar</h2>
            <p>Guru dan pengajar profesional yang berdedikasi</p>
        </div>
        
        <div class="row">
            <?php if ($pengajar_result->num_rows > 0): ?>
                <?php while ($pengajar = $pengajar_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass text-center">
                            <?php if ($pengajar['foto']): ?>
                                <img src="img/uploads/pengajar/<?php echo htmlspecialchars($pengajar['foto']); ?>" 
                                     alt="<?php echo htmlspecialchars($pengajar['nama']); ?>" 
                                     class="card-img" 
                                     style="width: 150px; height: 150px; border-radius: 50%; margin: 0 auto 1rem;">
                            <?php else: ?>
                                <div style="width: 150px; height: 150px; border-radius: 50%; background: var(--primary-color); 
                                            display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <i data-feather="user" style="font-size: 3rem; color: white;"></i>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="card-title"><?php echo htmlspecialchars($pengajar['nama']); ?></h3>
                            <p style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                                <?php echo htmlspecialchars($pengajar['bidang']); ?>
                            </p>
                            <?php if ($pengajar['deskripsi']): ?>
                                <p class="card-text" style="font-size: 0.9rem;">
                                    <?php echo htmlspecialchars($pengajar['deskripsi']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="card glass">
                        <p>Data pengajar belum tersedia.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Qualifications Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kualifikasi Pengajar</h2>
            <p>Standar kualifikasi pengajar kami</p>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="card glass">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="graduation-cap"></i> Pendidikan
                    </h3>
                    <ul style="line-height: 1.8;">
                        <li>Lulusan S1/S2 dari universitas ternama</li>
                        <li>Memiliki sertifikat pendidik</li>
                        <li>Menguasai bidang keahliannya</li>
                        <li>Memiliki pengalaman mengajar</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="award"></i> Kompetensi
                    </h3>
                    <ul style="line-height: 1.8;">
                        <li>Komunikasi yang baik</li>
                        <li>Pedagogik yang kuat</li>
                        <li>Integritas dan akhlak mulia</li>
                        <li>Komitmen terhadap pendidikan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Teaching Methods Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Metode Pengajaran</h2>
            <p>Metode pengajaran yang kami terapkan</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book-open"></i>
                    </div>
                    <h4>Pembelajaran Aktif</h4>
                    <p>Metode pembelajaran yang melibatkan santri secara aktif dalam proses belajar.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Pembelajaran Kolaboratif</h4>
                    <p>Pembelajaran yang mendorong kerja sama antar santri.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="monitor"></i>
                    </div>
                    <h4>Pembelajaran Digital</h4>
                    <p>Pemanfaatan teknologi digital dalam proses pembelajaran.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Hubungi Pengajar</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Untuk informasi lebih lanjut mengenai pengajar kami, silakan hubungi kami.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="contact.php" class="btn btn-primary">Hubungi Kami</a>
                <a href="akademik.php" class="btn btn-outline">Lihat Program</a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
