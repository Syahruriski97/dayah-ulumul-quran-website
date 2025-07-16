<?php
$page_title = 'Galeri';
$page_description = 'Galeri foto kegiatan dan dokumentasi Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 12;
$offset = ($page - 1) * $per_page;

// Get total gallery count
$total_query = "SELECT COUNT(*) as total FROM galeri";
$total_result = $conn->query($total_query);
$total_galeri = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_galeri / $per_page);

// Get gallery for current page
$galeri_query = "SELECT * FROM galeri ORDER BY created_at DESC LIMIT $per_page OFFSET $offset";
$galeri_result = $conn->query($galeri_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Galeri Kegiatan</h1>
            <p>Dokumentasi kegiatan dan momen berharga Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Foto</h2>
            <p>Kumpulan foto kegiatan dan dokumentasi</p>
        </div>
        
        <?php if ($galeri_result->num_rows > 0): ?>
            <div class="row">
                <?php while ($galeri = $galeri_result->fetch_assoc()): ?>
                    <div class="col-3">
                        <div class="card glass">
                            <img src="img/uploads/galeri/<?php echo htmlspecialchars($galeri['gambar']); ?>" 
                                 alt="<?php echo htmlspecialchars($galeri['deskripsi']); ?>" 
                                 class="card-img" 
                                 style="height: 200px; cursor: pointer;"
                                 onclick="openLightbox('img/uploads/galeri/<?php echo htmlspecialchars($galeri['gambar']); ?>', '<?php echo htmlspecialchars($galeri['deskripsi']); ?>')">
                            
                            <?php if ($galeri['deskripsi']): ?>
                                <p class="card-text" style="font-size: 0.9rem; margin-top: 0.5rem;">
                                    <?php echo htmlspecialchars($galeri['deskripsi']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div style="text-align: center; margin-top: 3rem;">
                    <div style="display: inline-flex; gap: 0.5rem;">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1; ?>" class="btn btn-outline">
                                <i data-feather="chevron-left"></i> Sebelumnya
                            </a>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?>" 
                               class="btn <?php echo $i === $page ? 'btn-primary' : 'btn-outline'; ?>"
                               style="min-width: 40px;">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                            <a href="?page=<?php echo $page + 1; ?>" class="btn btn-outline">
                                Selanjutnya <i data-feather="chevron-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center">
                <div class="card glass">
                    <p>Belum ada foto yang tersedia.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Categories Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kategori Galeri</h2>
            <p>Kategori foto yang tersedia</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book"></i>
                    </div>
                    <h4>Kegiatan Belajar</h4>
                    <p style="font-size: 0.9rem;">Foto kegiatan pembelajaran</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Event</h4>
                    <p style="font-size: 0.9rem;">Foto kegiatan dan event</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="award"></i>
                    </div>
                    <h4>Prestasi</h4>
                    <p style="font-size: 0.9rem;">Foto prestasi santri</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="camera"></i>
                    </div>
                    <h4>Dokumentasi</h4>
                    <p style="font-size: 0.9rem;">Foto dokumentasi umum</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Video Gallery Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Video</h2>
            <p>Kumpulan video kegiatan dan dokumentasi</p>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="card glass">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px;">
                        <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                frameborder="0" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <h4 style="margin-top: 1rem;">Video Profil Dayah</h4>
                    <p style="font-size: 0.9rem;">Video perkenalan Dayah Ulumul Qur'an</p>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px;">
                        <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                frameborder="0" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <h4 style="margin-top: 1rem;">Kegiatan Tahfidz</h4>
                    <p style="font-size: 0.9rem;">Dokumentasi kegiatan tahfidz santri</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
