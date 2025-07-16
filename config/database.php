<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dayah_ulumul_quran');

// Create connection
function getConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8
    $conn->set_charset("utf8");
    
    return $conn;
}

// Site Configuration
define('SITE_NAME', 'Dayah Ulumul Qur\'an Yayasan Quba\' Bebesen');
define('SITE_URL', 'http://localhost/dayah-ulumul-quran');
define('ADMIN_URL', SITE_URL . '/admin');

// Upload paths
define('UPLOAD_PATH', 'img/uploads/');
define('BERITA_PATH', UPLOAD_PATH . 'berita/');
define('GALERI_PATH', UPLOAD_PATH . 'galeri/');
define('STRUKTUR_PATH', UPLOAD_PATH . 'struktur/');
define('PENGAJAR_PATH', UPLOAD_PATH . 'pengajar/');
define('TESTIMONI_PATH', UPLOAD_PATH . 'testimoni/');
define('SLIDER_PATH', UPLOAD_PATH . 'slider/');
define('DOWNLOAD_PATH', 'downloads/');

// Create upload directories if they don't exist
$upload_dirs = [
    BERITA_PATH,
    GALERI_PATH, 
    STRUKTUR_PATH,
    PENGAJAR_PATH,
    TESTIMONI_PATH,
    SLIDER_PATH,
    DOWNLOAD_PATH
];

foreach ($upload_dirs as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Helper functions
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function uploadFile($file, $path, $allowed_types = ['jpg', 'jpeg', 'png', 'gif']) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_types)) {
        return false;
    }
    
    $new_filename = uniqid() . '.' . $file_extension;
    $upload_path = $path . $new_filename;
    
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        return $new_filename;
    }
    
    return false;
}

function formatTanggal($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $date = date_create($tanggal);
    $d = date_format($date, 'd');
    $m = date_format($date, 'n');
    $y = date_format($date, 'Y');
    
    return $d . ' ' . $bulan[$m] . ' ' . $y;
}
?>
