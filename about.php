<?php
$page_title = 'Tentang Kami';
$page_description = 'Informasi lengkap tentang Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen - Visi, Misi, dan Sejarah';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get about content
$visi_query = "SELECT konten FROM tentang WHERE jenis = 'visi'";
$misi_query = "SELECT konten FROM tentang WHERE jenis = 'misi'";
$sejarah_query = "SELECT konten FROM tentang WHERE jenis = 'sejarah'";

$visi = $conn->query($visi_query)->fetch_assoc()['konten'];
$misi = $conn->query($misi_query)->fetch_assoc()['konten'];
$sejarah = $conn->query($sejarah_query)->fetch_assoc()['konten'];
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Tentang Kami</h1>
            <p>Mengenal lebih dekat Dayah Ulumul Qur'an Yayasan Quba' Bebesen</p>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card glass">
                    <h2 style="text-align: center; margin-bottom: 2rem; color: var(--primary-color);">
                        <i data-feather="info" style="vertical-align: middle;"></i> 
                        Tentang Dayah Ulumul Qur'an
                    </h2>
                    
                    <div style="max-width: 800px; margin: 0 auto;">
                        <p style="text-align: center; font-size: 1.1rem; margin-bottom: 3rem;">
                            Dayah Ulumul Qur'an Yayasan Quba' Bebesen adalah lembaga pendidikan Islam 
                            yang berkomitmen mencetak generasi Qur'ani yang berakhlak mulia, berpengetahuan luas, 
                            dan bermanfaat bagi umat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision, Mission, History Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="row">
            <!-- Vision -->
            <div class="col-4">
                <div class="card glass">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                            <i data-feather="eye"></i>
                        </div>
                        <h3 style="color: var(--primary-color);">Visi</h3>
                    </div>
                    <p style="text-align: center; line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($visi)); ?>
                    </p>
                </div>
            </div>
            
            <!-- Mission -->
            <div class="col-4">
                <div class="card glass">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                            <i data-feather="target"></i>
                        </div>
                        <h3 style="color: var(--primary-color);">Misi</h3>
                    </div>
                    <div style="text-align: left; line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($misi)); ?>
                    </div>
                </div>
            </div>
            
            <!-- History -->
            <div class="col-4">
                <div class="card glass">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <div style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;">
                            <i data-feather="book-open"></i>
                        </div>
                        <h3 style="color: var(--primary-color);">Sejarah</h3>
                    </div>
                    <p style="text-align: justify; line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($sejarah)); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Keunggulan Kami</h2>
            <p>Apa yang membuat Dayah Ulumul Qur'an berbeda</p>
        </div>
        
        <div class="row">
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="book"></i>
                    </div>
                    <h4>Kurikulum Terpadu</h4>
                    <p>Pendidikan agama dan umum yang seimbang untuk persiapan masa depan yang komprehensif.</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="users"></i>
                    </div>
                    <h4>Pengajar Berpengalaman</h4>
                    <p>Tim pengajar yang kompeten dan berpengalaman di bidangnya masing-masing.</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="home"></i>
                    </div>
                    <h4>Fasilitas Lengkap</h4>
                    <p>Sarana dan prasarana pendidikan yang memadai untuk mendukung proses belajar mengajar.</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="card glass text-center">
                    <div style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="heart"></i>
                    </div>
                    <h4>Pendekatan Holistik</h4>
                    <p>Pengembangan karakter dan spiritual santri secara menyeluruh untuk menjadi pribadi yang unggul.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Nilai-Nilai Kami</h2>
            <p>Prinsip dasar yang kami junjung tinggi</p>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="card glass">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="shield"></i> Integritas
                    </h4>
                    <p>Menjunjung tinggi kejujuran dan akhlak mulia dalam setiap aspek kehidupan.</p>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="zap"></i> Ekselensi
                    </h4>
                    <p>Berusaha mencapai yang terbaik dalam bidang akademik dan non-akademik.</p>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="globe"></i> Kebermanfaatan
                    </h4>
                    <p>Menjadi pribadi yang bermanfaat bagi masyarakat dan umat Islam.</p>
                </div>
            </div>
            
            <div class="col-6">
                <div class="card glass">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">
                        <i data-feather="trending-up"></i> Perkembangan Berkelanjutan
                    </h4>
                    <p>Senantiasa berkembang dan beradaptasi dengan perubahan zaman.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Bergabung dengan Kami</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Jadilah bagian dari Dayah Ulumul Qur'an dan raih masa depan yang gemilang.
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
