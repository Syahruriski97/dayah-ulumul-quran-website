<?php
$page_title = 'Testimoni Alumni';
$page_description = 'Testimoni dan pengalaman alumni Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get testimonials
$testimoni_query = "SELECT * FROM testimoni ORDER BY created_at DESC";
$testimoni_result = $conn->query($testimoni_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Testimoni Alumni</h1>
            <p>Pengalaman dan kesaksian dari alumni Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kata Alumni</h2>
            <p>Pengalaman dan kesaksian dari para alumni</p>
        </div>
        
        <?php if ($testimoni_result->num_rows > 0): ?>
            <div class="row">
                <?php while ($testimoni = $testimoni_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass">
                            <?php if ($testimoni['foto']): ?>
                                <img src="img/uploads/testimoni/<?php echo htmlspecialchars($testimoni['foto']); ?>" 
                                     alt="<?php echo htmlspecialchars($testimoni['nama']); ?>" 
                                     class="card-img" 
                                     style="width: 100px; height: 100px; border-radius: 50%; margin: 0 auto 1rem;">
                            <?php else: ?>
                                <div style="width: 100px; height: 100px; border-radius: 50%; background: var(--primary-color); 
                                            display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <i data-feather="user" style="font-size: 2rem; color: white;"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div style="text-align: center;">
                                <h3 class="card-title"><?php echo htmlspecialchars($testimoni['nama']); ?></h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                                    Alumni Tahun <?php echo htmlspecialchars($testimoni['tahun']); ?>
                                </p>
                                <p class="card-text" style="font-style: italic;">
                                    "<?php echo htmlspecialchars($testimoni['isi']); ?>"
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <div class="card glass">
                    <p>Belum ada testimoni yang tersedia.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Success Stories Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kisah Sukses</h2>
            <p>Perjalanan sukses alumni Dayah Ulumul Qur'an</p>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="card glass">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="graduation-cap"></i> Pendidikan
                    </h3>
                    <p style="text-align: justify; line-height: 1.8;">
                        Banyak alumni Dayah Ulumul Qur'an yang melanjutkan pendidikan ke perguruan tinggi ternama, 
                        baik di dalam maupun luar negeri. Dengan bekal ilmu agama yang kuat dan kemampuan akademik yang mumpuni, 
                        mereka mampu bersaing di berbagai bidang studi.
                    </p>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="briefcase"></i> Karier
                    </h3>
                    <p style="text-align: justify; line-height: 1.8;">
                        Alumni kami telah berhasil meniti karier di berbagai bidang, termasuk pendidikan, 
                        kesehatan, teknologi, dan bisnis. Dengan nilai-nilai Islam yang kuat, mereka menjadi 
                        profesional yang berintegritas dan bermanfaat bagi masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Statistik Alumni</h2>
            <p>Data dan capaian alumni Dayah Ulumul Qur'an</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <div class="card glass text-center">
                    <div class="stats-number counter" data-target="500">0</div>
                    <div class="stats-label">Total Alumni</div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div class="stats-number counter" data-target="85">0</div>
                    <div class="stats-label">% Melanjutkan Kuliah</div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div class="stats-number counter" data-target="90">0</div>
                    <div class="stats-label">% Bekerja</div>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div class="stats-number counter" data-target="95">0</div>
                    <div class="stats-label">% Hafidz</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alumni Network Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Jaringan Alumni</h2>
            <p>Komunitas alumni Dayah Ulumul Qur'an</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Komunitas Alumni</h4>
                    <p>Komunitas alumni yang solid dan saling mendukung dalam berbagai bidang kehidupan.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book"></i>
                    </div>
                    <h4>Program Mentoring</h4>
                    <p>Program mentoring dari alumni senior untuk membantu junior dalam pengembangan karier.</p>
                </div>
            </div>
            
            <div class="col-4">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="heart"></i>
                    </div>
                    <h4>Silaturahmi</h4>
                    <p>Kegiatan silaturahmi alumni yang rutin dilakukan untuk mempererat tali persaudaraan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Jadilah Bagian dari Kami</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Bergabunglah dengan Dayah Ulumul Qur'an dan raih masa depan yang gemilang seperti para alumni kami.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="akademik.php" class="btn btn-primary">Lihat Program</a>
                <a href="contact.php" class="btn btn-outline">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
