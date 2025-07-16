<?php
$page_title = 'Agenda Kegiatan';
$page_description = 'Jadwal kegiatan dan agenda Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
require_once 'config/database.php';

// Get database connection
$conn = getConnection();

// Get upcoming events (future dates)
$upcoming_query = "SELECT * FROM agenda WHERE tanggal >= CURDATE() ORDER BY tanggal ASC";
$upcoming_result = $conn->query($upcoming_query);

// Get past events
$past_query = "SELECT * FROM agenda WHERE tanggal < CURDATE() ORDER BY tanggal DESC LIMIT 6";
$past_result = $conn->query($past_query);
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Agenda Kegiatan</h1>
            <p>Jadwal kegiatan dan event Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Agenda Mendatang</h2>
            <p>Kegiatan yang akan datang</p>
        </div>
        
        <?php if ($upcoming_result->num_rows > 0): ?>
            <div class="row">
                <?php while ($agenda = $upcoming_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass">
                            <div style="background: var(--primary-color); color: white; padding: 1rem; 
                                        border-radius: 10px 10px 0 0; text-align: center;">
                                <div style="font-size: 2rem; font-weight: bold;">
                                    <?php echo date('d', strtotime($agenda['tanggal'])); ?>
                                </div>
                                <div>
                                    <?php echo date('M Y', strtotime($agenda['tanggal'])); ?>
                                </div>
                            </div>
                            
                            <div style="padding: 1.5rem;">
                                <h3 class="card-title"><?php echo htmlspecialchars($agenda['judul']); ?></h3>
                                <p class="card-text">
                                    <?php echo substr(strip_tags($agenda['isi']), 0, 100) . '...'; ?>
                                </p>
                                <p style="font-size: 0.9rem; color: var(--text-light);">
                                    <i data-feather="clock"></i>
                                    <?php echo formatTanggal($agenda['tanggal']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <div class="card glass">
                    <p>Tidak ada agenda mendatang.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Calendar Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="section-title">
            <h2>Kalender Kegiatan</h2>
            <p>Kalender kegiatan bulan ini</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card glass">
                    <div style="text-align: center; padding: 2rem;">
                        <h3 style="margin-bottom: 1rem;"><?php echo date('F Y'); ?></h3>
                        <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; 
                                    max-width: 600px; margin: 0 auto;">
                            
                            <!-- Days of week -->
                            <div style="font-weight: bold; padding: 0.5rem;">Min</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Sen</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Sel</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Rab</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Kam</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Jum</div>
                            <div style="font-weight: bold; padding: 0.5rem;">Sab</div>
                            
                            <!-- Calendar days (simplified) -->
                            <?php
                            $first_day = date('w', strtotime(date('Y-m-01')));
                            $days_in_month = date('t');
                            
                            // Empty cells for days before month starts
                            for ($i = 0; $i < $first_day; $i++) {
                                echo '<div style="padding: 0.5rem;"></div>';
                            }
                            
                            // Days of the month
                            for ($day = 1; $day <= $days_in_month; $day++) {
                                $date = date('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
                                $has_event = false;
                                
                                // Check if this date has events
                                $check_query = "SELECT COUNT(*) as total FROM agenda WHERE tanggal = '$date'";
                                $check_result = $conn->query($check_query);
                                $has_event = $check_result->fetch_assoc()['total'] > 0;
                                
                                $style = $has_event ? 'background: var(--primary-color); color: white;' : '';
                                echo '<div style="padding: 0.5rem; border: 1px solid #ddd; border-radius: 5px; ' . $style . '">' . $day . '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Past Events Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kegiatan Selesai</h2>
            <p>Kegiatan yang telah berlangsung</p>
        </div>
        
        <?php if ($past_result->num_rows > 0): ?>
            <div class="row">
                <?php while ($agenda = $past_result->fetch_assoc()): ?>
                    <div class="col-4">
                        <div class="card glass">
                            <div style="background: var(--text-light); color: white; padding: 1rem; 
                                        border-radius: 10px 10px 0 0; text-align: center;">
                                <div style="font-size: 2rem; font-weight: bold;">
                                    <?php echo date('d', strtotime($agenda['tanggal'])); ?>
                                </div>
                                <div>
                                    <?php echo date('M Y', strtotime($agenda['tanggal'])); ?>
                                </div>
                            </div>
                            
                            <div style="padding: 1.5rem;">
                                <h3 class="card-title"><?php echo htmlspecialchars($agenda['judul']); ?></h3>
                                <p class="card-text">
                                    <?php echo substr(strip_tags($agenda['isi']), 0, 100) . '...'; ?>
                                </p>
                                <p style="font-size: 0.9rem; color: var(--text-light);">
                                    <i data-feather="calendar"></i>
                                    Telah berlangsung pada <?php echo formatTanggal($agenda['tanggal']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center">
                <div class="card glass">
                    <p>Belum ada kegiatan yang berlangsung.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Subscribe Section -->
<section class="section" style="background: var(--accent-color);">
    <div class="container">
        <div class="card glass text-center" style="padding: 3rem;">
            <h2 style="margin-bottom: 1rem;">Berlangganan Agenda</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Dapatkan notifikasi agenda terbaru langsung ke email Anda.
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
