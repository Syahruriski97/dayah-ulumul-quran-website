<?php
$page_title = 'Struktur Kepengurusan';
$page_description = 'Struktur organisasi dan kepengurusan Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get structure data ordered by position
$struktur_query = "SELECT * FROM struktur ORDER BY urutan ASC";
$struktur_result = $conn->query($struktur_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Struktur Kepengurusan</h1>
            <p>Struktur organisasi Dayah Ulumul Qur'an Yayasan Quba' Bebesen</p>
        </div>
    </div>
</section>

<!-- Structure Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Struktur Organisasi</h2>
            <p>Susunan kepengurusan Dayah Ulumul Qur'an</p>
        </div>
        
        <div class="row">
            <?php if ($struktur_result->num_rows > 0): ?>
                <?php while ($struktur = $struktur_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass text-center">
                            <?php if ($struktur['foto']): ?>
                                <img src="img/uploads/struktur/<?php echo htmlspecialchars($struktur['foto']); ?>" 
                                     alt="<?php echo htmlspecialchars($struktur['nama']); ?>" 
                                     class="card-img" 
                                     style="width: 150px; height: 150px; border-radius: 50%; margin: 0 auto 1rem;">
                            <?php else: ?>
                                <div style="width: 150px; height: 150px; border-radius: 50%; background: var(--primary-color); 
                                            display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <i data-feather="user" style="font-size: 3rem; color: white;"></i>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="card-title"><?php echo htmlspecialchars($struktur['nama']); ?></h3>
                            <p style="color: var(--primary-color); font-weight: 600; margin-bottom: 0.5rem;">
                                <?php echo htmlspecialchars($struktur['jabatan']); ?>
                            </p>
                            <?php if ($struktur['no_hp']): ?>
                                <p style="font-size: 0.9rem; color: var(--text-light);">
                                    <i data-feather="phone" style="vertical-align: middle;"></i>
                                    <?php echo htmlspecialchars($struktur['no_hp']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <div class="card glass">
                        <p>Data struktur kepengurusan belum tersedia.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Organizational Chart Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Bagan Organisasi</h2>
            <p>Struktur hierarki kepengurusan yayasan</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card glass">
                    <div style="text-align: center; padding: 2rem;">
                        <div style="display: inline-block; background: var(--primary-color); color: white; 
                                    padding: 1rem 2rem; border-radius: 10px; margin-bottom: 2rem;">
                            <h3>Ketua Yayasan</h3>
                        </div>
                        
                        <div style="display: flex; justify-content: center; gap: 2rem; margin-bottom: 2rem;">
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem 2rem; border-radius: 10px;">
                                <h4>Wakil Ketua</h4>
                            </div>
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem 2rem; border-radius: 10px;">
                                <h4>Sekretaris</h4>
                            </div>
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem 2rem; border-radius: 10px;">
                                <h4>Bendahara</h4>
                            </div>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; max-width: 800px; margin: 0 auto;">
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem; border-radius: 10px;">
                                <h5>Kepala MTs</h5>
                            </div>
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem; border-radius: 10px;">
                                <h5>Kepala MA</h5>
                            </div>
                            <div style="background: var(--primary-color); color: white; 
                                        padding: 1rem; border-radius: 10px;">
                                <h5>Kepala Tahfidz</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Hubungi Kami</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Untuk informasi lebih lanjut mengenai struktur kepengurusan, silakan hubungi kami.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="yayasan.php" class="btn btn-primary">Profil Yayasan</a>
                <a href="contact.php" class="btn btn-outline">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
require_once 'inc/footer.php';
?>
