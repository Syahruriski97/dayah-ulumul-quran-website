<?php
$page_title = 'Login';
$page_description = 'Login untuk admin Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen';
require_once 'inc/header.php';
?>

<!-- Hero Section -->
<section class="hero" style="padding: 3rem 0;">
    <div class="container">
        <div class="hero-content">
            <h1>Login</h1>
            <p>Masuk ke sistem admin Dayah Ulumul Qur'an</p>
        </div>
    </div>
</section>

<!-- Login Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-6" style="margin: 0 auto;">
                <div class="card glass">
                    <h2 style="text-align: center; margin-bottom: 2rem; color: var(--primary-color);">
                        <i data-feather="log-in"></i> Login Admin
                    </h2>
                    
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <p>Silakan login untuk mengakses panel admin.</p>
                        <p style="font-size: 0.9rem; color: var(--text-light);">
                            Jika Anda adalah admin, silakan login dengan akun Anda.
                        </p>
                    </div>
                    
                    <div style="text-align: center;">
                        <a href="admin/login.php" class="btn btn-primary" style="padding: 1rem 2rem;">
                            <i data-feather="log-in"></i>
                            Login ke Admin Panel
                        </a>
                    </div>
                    
                    <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #eee;">
                        <p style="font-size: 0.9rem; color: var(--text-light);">
                            <i data-feather="info"></i>
                            Untuk login admin, silakan gunakan link di atas.
                        </p>
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
            <h2 style="margin-bottom: 1rem;">Butuh Bantuan?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
                Jika Anda mengalami masalah dengan login, silakan hubungi kami.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="contact.php" class="btn btn-primary">Hubungi Kami</a>
                <a href="mailto:info@dayahulumulquran.ac.id" class="btn btn-outline">Email Kami</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>
