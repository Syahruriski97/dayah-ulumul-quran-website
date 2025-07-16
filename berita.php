<?php
$page_title = 'Berita';
$page_description = 'Berita terbaru dan informasi dari Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 6;
$offset = ($page - 1) * $per_page;

// Get total news count
$total_query = "SELECT COUNT(*) as total FROM berita";
$total_result = $conn->query($total_query);
$total_news = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_news / $per_page);

// Get news for current page
$berita_query = "SELECT * FROM berita ORDER BY tanggal DESC LIMIT $per_page OFFSET $offset";
$berita_result = $conn->query($berita_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Berita & Informasi</h1>
            <p>Update terbaru dari Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Semua Berita</h2>
            <p>Berita dan informasi terbaru dari Dayah Ulumul Qur'an</p>
        </div>
        
        <?php if ($berita_result->num_rows > 0): ?>
            <div class="row">
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
                    <p>Belum ada berita yang tersedia.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Categories Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kategori Berita</h2>
            <p>Kategori berita yang tersedia</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book-open"></i>
                    </div>
                    <h4>Pendidikan</h4>
                    <p style="font-size: 0.9rem;">Berita seputar pendidikan</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Kegiatan</h4>
                    <p style="font-size: 0.9rem;">Kegiatan santri dan yayasan</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="award"></i>
                    </div>
                    <h4>Prestasi</h4>
                    <p style="font-size: 0.9rem;">Prestasi santri dan yayasan</p>
                </a>
            </div>
            
            <div class="col-3">
                <a href="#" class="card glass text-center" style="text-decoration: none; color: inherit;">
                    <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="calendar"></i>
                    </div>
                    <h4>Agenda</h4>
                    <p style="font-size: 0.9rem;">Jadwal kegiatan terbaru</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="section">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Berlangganan Berita</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Dapatkan update berita terbaru langsung ke email Anda.
            </p>
            <form style="max-width: 400px; margin: 0 auto;">
                <div style="display: flex; gap: 1rem;">
                    <input type="email" placeholder="Masukkan email Anda" 
                           style="flex: 1; padding: 0.75rem; border: 1px solid #ddd; border-radius: 8px;">
                    <button type="submit" class="btn btn-primary">Berlangganan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
