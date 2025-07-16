<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

// Get database connection
$conn = getConnection();

// Get statistics
$stats = [
    'berita' => $conn->query("SELECT COUNT(*) as total FROM berita")->fetch_assoc()['total'],
    'galeri' => $conn->query("SELECT COUNT(*) as total FROM galeri")->fetch_assoc()['total'],
    'pengajar' => $conn->query("SELECT COUNT(*) as total FROM pengajar")->fetch_assoc()['total'],
    'struktur' => $conn->query("SELECT COUNT(*) as total FROM struktur")->fetch_assoc()['total'],
    'agenda' => $conn->query("SELECT COUNT(*) as total FROM agenda")->fetch_assoc()['total'],
    'download' => $conn->query("SELECT COUNT(*) as total FROM download")->fetch_assoc()['total'],
    'testimoni' => $conn->query("SELECT COUNT(*) as total FROM testimoni")->fetch_assoc()['total']
];

// Get latest news
$latest_news = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");

// Get recent activities
$recent_activities = $conn->query("SELECT * FROM agenda ORDER BY tanggal DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .admin-header {
            background: var(--text-dark);
            color: var(--white);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .admin-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .admin-nav h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .admin-nav .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .admin-nav .logout-btn {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        
        .admin-nav .logout-btn:hover {
            background: var(--primary-dark);
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .admin-card {
            background: var(--white);
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-2px);
        }
        
        .admin-card .icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .admin-card .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .admin-card .label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .admin-section {
            margin-bottom: 2rem;
        }
        
        .admin-section h2 {
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .admin-table th,
        .admin-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .admin-table th {
            background: var(--primary-color);
            color: var(--white);
            font-weight: 600;
        }
        
        .admin-table tr:hover {
            background: var(--accent-color);
        }
        
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .admin-menu-item {
            background: var(--white);
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--text-dark);
        }
        
        .admin-menu-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: var(--primary-color);
            color: var(--white);
        }
        
        .admin-menu-item .icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .admin-menu-item h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        
        .admin-menu-item p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="admin-nav">
            <h1>Dashboard Admin</h1>
            <div class="user-info">
                <span>Selamat datang, <?php echo htmlspecialchars($_SESSION['admin_nama']); ?></span>
                <a href="logout.php" class="logout-btn">
                    <i data-feather="log-out" style="vertical-align: middle;"></i>
                    Logout
                </a>
            </div>
        </nav>
    </header>

    <div class="admin-container">
        <!-- Statistics Cards -->
        <div class="admin-grid">
            <div class="admin-card">
                <div class="icon"><i data-feather="newspaper"></i></div>
                <div class="number"><?php echo $stats['berita']; ?></div>
                <div class="label">Total Berita</div>
            </div>
            
            <div class="admin-card">
                <div class="icon"><i data-feather="image"></i></div>
                <div class="number"><?php echo $stats['galeri']; ?></div>
                <div class="label">Total Galeri</div>
            </div>
            
            <div class="admin-card">
                <div class="icon"><i data-feather="users"></i></div>
                <div class="number"><?php echo $stats['pengajar']; ?></div>
                <div class="label">Total Pengajar</div>
            </div>
            
            <div class="admin-card">
                <div class="icon"><i data-feather="user-check"></i></div>
                <div class="number"><?php echo $stats['struktur']; ?></div>
                <div class="label">Total Struktur</div>
            </div>
            
            <div class="admin-card">
                <div class="icon"><i data-feather="calendar"></i></div>
                <div class="number"><?php echo $stats['agenda']; ?></div>
                <div class="label">Total Agenda</div>
            </div>
            
            <div class="admin-card">
                <div class="icon"><i data-feather="download"></i></div>
                <div class="number"><?php echo $stats['download']; ?></div>
                <div class="label">Total Download</div>
            </div>
        </div>

        <!-- Admin Menu -->
        <div class="admin-menu">
            <a href="berita/" class="admin-menu-item">
                <div class="icon"><i data-feather="newspaper"></i></div>
                <h3>Kelola Berita</h3>
                <p>Tambah, edit, dan hapus berita</p>
            </a>
            
            <a href="galeri/" class="admin-menu-item">
                <div class="icon"><i data-feather="image"></i></div>
                <h3>Kelola Galeri</h3>
                <p>Upload dan kelola foto kegiatan</p>
            </a>
            
            <a href="pengajar/" class="admin-menu-item">
                <div class="icon"><i data-feather="users"></i></div>
                <h3>Kelola Pengajar</h3>
                <p>Data guru dan pengajar</p>
            </a>
            
            <a href="struktur/" class="admin-menu-item">
                <div class="icon"><i data-feather="user-check"></i></div>
                <h3>Kelola Struktur</h3>
                <p>Data kepengurusan yayasan</p>
            </a>
            
            <a href="agenda/" class="admin-menu-item">
                <div class="icon"><i data-feather="calendar"></i></div>
                <h3>Kelola Agenda</h3>
                <p>Jadwal kegiatan dan event</p>
            </a>
            
            <a href="download/" class="admin-menu-item">
                <div class="icon"><i data-feather="download"></i></div>
                <h3>Kelola Download</h3>
                <p>File dan dokumen untuk download</p>
            </a>
            
            <a href="testimoni/" class="admin-menu-item">
                <div class="icon"><i data-feather="message-circle"></i></div>
                <h3>Kelola Testimoni</h3>
                <p>Testimoni dari alumni</p>
            </a>
            
            <a href="statistik/" class="admin-menu-item">
                <div class="icon"><i data-feather="bar-chart-2"></i></div>
                <h3>Kelola Statistik</h3>
                <p>Data jumlah santri</p>
            </a>
            
            <a href="tentang/" class="admin-menu-item">
                <div class="icon"><i data-feather="info"></i></div>
                <h3>Kelola Tentang</h3>
                <p>Edit visi, misi, dan sejarah</p>
            </a>
            
            <a href="slider/" class="admin-menu-item">
                <div class="icon"><i data-feather="image"></i></div>
                <h3>Kelola Slider</h3>
                <p>Banner dan gambar utama</p>
            </a>
        </div>

        <!-- Latest News -->
        <div class="admin-section">
            <h2>Berita Terbaru</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($latest_news->num_rows > 0): ?>
                        <?php while ($news = $latest_news->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($news['judul']); ?></td>
                                <td><?php echo formatTanggal($news['tanggal']); ?></td>
                                <td>
                                    <a href="berita/edit.php?id=<?php echo $news['id']; ?>" style="color: var(--primary-color);">Edit</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Belum ada berita</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Recent Activities -->
        <div class="admin-section">
            <h2>Agenda Terbaru</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($recent_activities->num_rows > 0): ?>
                        <?php while ($activity = $recent_activities->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($activity['judul']); ?></td>
                                <td><?php echo formatTanggal($activity['tanggal']); ?></td>
                                <td>
                                    <a href="agenda/edit.php?id=<?php echo $activity['id']; ?>" style="color: var(--primary-color);">Edit</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Belum ada agenda</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
