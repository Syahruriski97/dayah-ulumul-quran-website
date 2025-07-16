<?php
$page_title = 'Download';
$page_description = 'File dan dokumen yang dapat diunduh dari Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get download files
$download_query = "SELECT * FROM download ORDER BY created_at DESC";
$download_result = $conn->query($download_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Download</h1>
            <p>File dan dokumen untuk diunduh</p>
        </div>
    </div>
</section>

<!-- Download Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>File Download</h2>
            <p>Dokumen dan file yang dapat diunduh</p>
        </div>
        
        <?php if ($download_result->num_rows > 0): ?>
            <div class="row">
                <?php while ($download = $download_result->fetch_assoc()): ?>
                    <div class="col-6">
                        <div class="card glass">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div style="font-size: 2rem; color: var(--primary-color);">
                                    <i data-feather="file-text"></i>
                                </div>
                                
                                <div style="flex: 1;">
                                    <h3 class="card-title"><?php echo htmlspecialchars($download['judul']); ?></h3>
                                    <p class="card-text">
                                        <?php echo htmlspecialchars($download['deskripsi']); ?>
                                    </p>
                                    
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                                        <span style="font-size: 0.9rem; color: var(--text-light);">
                                            <i data-feather="calendar"></i>
                                            <?php echo formatTanggal($download['created_at']); ?>
                                        </span>
                                        
                                        <a href="downloads/<?php echo htmlspecialchars($download['file']); ?>" 
                                           class="btn btn-primary" 
                                           download>
                                            <i data-feather="download"></i>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <div class="card glass">
                    <p>Belum ada file yang tersedia untuk diunduh.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Categories Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kategori File</h2>
            <p>Kategori file yang tersedia</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="file-text"></i>
                    </div>
                    <h4>Dokumen</h4>
                    <p style="font-size: 0.9rem;">Dokumen resmi yayasan</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book"></i>
                    </div>
                    <h4>Brosur</h4>
                    <p style="font-size: 0.9rem;">Brosur dan panduan</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="image"></i>
                    </div>
                    <h4>Gambar</h4>
                    <p style="font-size: 0.9rem;">Gambar dan poster</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="file"></i>
                    </div>
                    <h4>Lainnya</h4>
                    <p style="font-size: 0.9rem;">File lainnya</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instructions Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Cara Download</h2>
            <p>Petunjuk cara mengunduh file</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card glass">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
                        <div style="text-align: center;">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <i data-feather="search"></i>
                            </div>
                            <h4>1. Pilih File</h4>
                            <p>Pilih file yang ingin Anda unduh dari daftar yang tersedia.</p>
                        </div>
                        
                        <div style="text-align: center;">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <i data-feather="download"></i>
                            </div>
                            <h4>2. Klik Download</h4>
                            <p>Klik tombol download untuk memulai proses pengunduhan.</p>
                        </div>
                        
                        <div style="text-align: center;">
                            <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                                <i data-feather="check-circle"></i>
                            </div>
                            <h4>3. Selesai</h4>
                            <p>File akan otomatis terunduh ke perangkat Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Butuh File Lainnya?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Jika Anda membutuhkan file yang tidak tersedia di sini, silakan hubungi kami.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="contact.php" class="btn btn-primary">Hubungi Kami</a>
                <a href="mailto:info@dayahulumulquran.ac.id" class="btn btn-outline">Email Kami</a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
