</main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>Dayah Ulumul Qur'an Yayasan Quba' Bebesen adalah lembaga pendidikan Islam yang berkomitmen mencetak generasi Qur'ani yang berakhlak mulia dan bermanfaat bagi umat.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <ul>
                        <li><i data-feather="map-pin"></i> Jl. Bebesen - Takengon, Aceh Tengah</li>
                        <li><i data-feather="phone"></i> +62 812-3456-7890</li>
                        <li><i data-feather="mail"></i> info@dayahulumulquran.ac.id</li>
                        <li><i data-feather="clock"></i> Senin - Jumat: 07:00 - 17:00</li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Link Cepat</h3>
                    <ul>
                        <li><a href="about.php">Tentang Kami</a></li>
                        <li><a href="akademik.php">Program Akademik</a></li>
                        <li><a href="berita.php">Berita Terbaru</a></li>
                        <li><a href="galeri.php">Galeri Kegiatan</a></li>
                        <li><a href="download.php">Download</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Ikuti Kami</h3>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i data-feather="facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i data-feather="instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i data-feather="youtube"></i></a>
                        <a href="#" aria-label="WhatsApp"><i data-feather="message-circle"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Dayah Ulumul Qur'an Yayasan Quba' Bebesen. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/main.js"></script>
    
    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
    </script>
    
    <!-- Additional JavaScript for specific pages -->
    <?php if (isset($additional_js)): ?>
        <?php foreach ($additional_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
