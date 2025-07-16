<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?><?php echo SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen - Lembaga Pendidikan Islam Terpadu'; ?>">
    <meta name="keywords" content="dayah, pesantren, pendidikan islam, tahfidz, MTs, MA, Aceh">
    <meta name="author" content="Dayah Ulumul Qur'an">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Additional CSS for specific pages -->
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="glass">
            <div class="header-content">
                <div class="logo">
                    <img src="img/logo.png" alt="Logo Dayah" onerror="this.src='img/default-logo.png'">
                    <div class="logo-text">
                        <h1>Dayah Ulumul Qur'an</h1>
                        <p>Yayasan Quba' Bebesen</p>
                    </div>
                </div>
                
                <div class="header-info">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i data-feather="phone"></i>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="contact-item">
                            <i data-feather="mail"></i>
                            <span>info@dayahulumulquran.ac.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="menu-toggle" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <i data-feather="home"></i> Beranda
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                        <i data-feather="info"></i> Tentang
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="yayasan.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'yayasan.php' ? 'active' : ''; ?>">
                        <i data-feather="building"></i> Yayasan
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="struktur.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'struktur.php' ? 'active' : ''; ?>">
                        <i data-feather="users"></i> Struktur
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="berita.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'berita.php' ? 'active' : ''; ?>">
                        <i data-feather="newspaper"></i> Berita
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="akademik.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'akademik.php' ? 'active' : ''; ?>">
                        <i data-feather="book"></i> Akademik
                    </a>
                    <div class="dropdown glass">
                        <a href="akademik.php#mts" class="dropdown-item">MTs Ulumul Qur'an</a>
                        <a href="akademik.php#ma" class="dropdown-item">MA Ulumul Qur'an</a>
                        <a href="akademik.php#tahfidz" class="dropdown-item">Program Tahfidz</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="agenda.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'agenda.php' ? 'active' : ''; ?>">
                        <i data-feather="calendar"></i> Agenda
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="galeri.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'galeri.php' ? 'active' : ''; ?>">
                        <i data-feather="image"></i> Galeri
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="pengajar.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'pengajar.php' ? 'active' : ''; ?>">
                        <i data-feather="user-check"></i> Pengajar
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="download.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'download.php' ? 'active' : ''; ?>">
                        <i data-feather="download"></i> Download
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="testimoni.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testimoni.php' ? 'active' : ''; ?>">
                        <i data-feather="message-circle"></i> Testimoni
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
