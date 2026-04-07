<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas - Bimbel Jadi Cerdas</title>
    
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css') ?>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding-bottom: 50px;
        }
        
        .page-header {
            background: rgba(255,255,255,0.95);
            padding: 20px 0;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .page-header h1 {
            color: #333;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        
        .page-header p {
            color: #666;
            margin: 5px 0 0 0;
        }
        
        .back-link {
            color: #7b6ada;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .back-link:hover {
            color: #6b5aca;
        }
        
        .kelas-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .kelas-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .kelas-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .kelas-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .kelas-card:hover .kelas-image img {
            transform: scale(1.1);
        }
        
        .kelas-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #7b6ada;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .kelas-badge.grup {
            background: #28a745;
        }
        
        .kelas-badge.privat {
            background: #ffc107;
            color: #333;
        }
        
        .kelas-content {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .kelas-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .kelas-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .kelas-info {
            margin-bottom: 20px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }
        
        .info-item i {
            color: #7b6ada;
            width: 20px;
        }
        
        .kelas-footer {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .btn-daftar {
            display: block;
            width: 100%;
            padding: 12px;
            background: #7b6ada;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-daftar:hover {
            background: #6b5aca;
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 5px 15px rgba(123, 106, 218, 0.4);
        }
        
        .btn-daftar i {
            margin-left: 5px;
        }
        
        .filter-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .filter-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .filter-btn {
            padding: 8px 20px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 20px;
            margin: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        
        .filter-btn:hover, .filter-btn.active {
            border-color: #7b6ada;
            background: #7b6ada;
            color: white;
        }
        
        /* Toast Notification */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        .toast {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 16px 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 300px;
            transform: translateX(400px);
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0;
        }
        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }
        .toast.success {
            border-left: 4px solid #28a745;
        }
        .toast-icon {
            font-size: 20px;
            color: #28a745;
        }
        .toast-content {
            flex: 1;
        }
        .toast-title {
            font-weight: 600;
            font-size: 14px;
        }
        .toast-message {
            font-size: 13px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="<?= site_url('/') ?>" class="back-link">
                        <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                    </a>
                    <h1 class="mt-2">Daftar Kelas</h1>
                    <p>Pilih kelas yang sesuai dengan kebutuhan belajar Anda</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="https://wa.me/6285747323211" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp"></i> Tanya Admin
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-title"><i class="fa fa-filter"></i> Filter Berdasarkan:</div>
            <div>
                <button class="filter-btn active" onclick="filterKelas('all')">Semua</button>
                <button class="filter-btn" onclick="filterKelas('matematika')">Matematika</button>
                <button class="filter-btn" onclick="filterKelas('inggris')">Bahasa Inggris</button>
                <button class="filter-btn" onclick="filterKelas('mandarin')">Bahasa Mandarin</button>
                <button class="filter-btn" onclick="filterKelas('mapel')">Mapel Lainnya</button>
                <button class="filter-btn" onclick="filterKelas('grup')">Kelas Grup</button>
                <button class="filter-btn" onclick="filterKelas('privat')">Kelas Privat</button>
            </div>
        </div>

        <!-- Kelas Grid -->
        <div class="row" id="kelasContainer">
            <!-- Matematika Grup -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="matematika grup">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/matematika-grup.jpg') ?>" alt="Matematika Grup">
                        <span class="kelas-badge grup">Grup</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Matematika - Grup</h3>
                        <p class="kelas-subtitle">SD, SMP, SMA</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam 30 menit</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-users"></i>
                                <span>Maksimal 10 siswa/kelas</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-book"></i>
                                <span>Materi sesuai kurikulum</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=matematika-grup#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matematika Privat -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="matematika privat">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/kelas-matematika2.jpg') ?>" alt="Matematika Privat">
                        <span class="kelas-badge privat">Privat</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Matematika - Privat</h3>
                        <p class="kelas-subtitle">SD, SMP, SMA</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam 30 menit</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-user"></i>
                                <span>1-on-1 dengan pengajar</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-book"></i>
                                <span>Kurikulum personalized</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=matematika-privat#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bahasa Inggris Grup -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="inggris grup">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/inggris-pert.jpg') ?>" alt="Bahasa Inggris Grup">
                        <span class="kelas-badge grup">Grup</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Bahasa Inggris - Grup</h3>
                        <p class="kelas-subtitle">SD, SMP, SMA</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-users"></i>
                                <span>Maksimal 8 siswa/kelas</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-comments"></i>
                                <span>Fokus conversation</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=inggris-grup#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bahasa Inggris Privat -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="inggris privat">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/kelas-bahasainggris.jpg') ?>" alt="Bahasa Inggris Privat">
                        <span class="kelas-badge privat">Privat</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Bahasa Inggris - Privat</h3>
                        <p class="kelas-subtitle">SD, SMP, SMA</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-user"></i>
                                <span>1-on-1 dengan pengajar</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-comments"></i>
                                <span>Intensive speaking practice</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=inggris-privat#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bahasa Mandarin Grup -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="mandarin grup">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/kelas-mandarin.jpg') ?>" alt="Bahasa Mandarin Grup">
                        <span class="kelas-badge grup">Grup</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Bahasa Mandarin - Grup</h3>
                        <p class="kelas-subtitle">Semua jenjang</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-users"></i>
                                <span>Maksimal 8 siswa/kelas</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-language"></i>
                                <span>HSK preparation available</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=mandarin-grup#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bahasa Mandarin Privat -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="mandarin privat">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/kelas-mandarin2.jpg') ?>" alt="Bahasa Mandarin Privat">
                        <span class="kelas-badge privat">Privat</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Bahasa Mandarin - Privat</h3>
                        <p class="kelas-subtitle">Semua jenjang</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-user"></i>
                                <span>1-on-1 dengan pengajar</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-language"></i>
                                <span>Custom learning path</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=mandarin-privat#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mapel Grup -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="mapel grup">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/mapel-3.jpg') ?>" alt="Mapel Grup">
                        <span class="kelas-badge grup">Grup</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Mapel - Grup</h3>
                        <p class="kelas-subtitle">IPA, IPS, B. Indonesia, dll</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam 30 menit</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-users"></i>
                                <span>Maksimal 10 siswa/kelas</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-book"></i>
                                <span>Semua mata pelajaran</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=mapel-grup#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mapel Privat -->
            <div class="col-lg-4 col-md-6 mb-4 kelas-item" data-kelas="mapel privat">
                <div class="kelas-card">
                    <div class="kelas-image">
                        <img src="<?= base_url('assets/images/kelas-mapel.jpg') ?>" alt="Mapel Privat">
                        <span class="kelas-badge privat">Privat</span>
                    </div>
                    <div class="kelas-content">
                        <h3 class="kelas-title">Mapel - Privat</h3>
                        <p class="kelas-subtitle">IPA, IPS, B. Indonesia, dll</p>
                        <div class="kelas-info">
                            <div class="info-item">
                                <i class="fa fa-calendar"></i>
                                <span>2x pertemuan/minggu</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-clock"></i>
                                <span>1 jam 30 menit</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-user"></i>
                                <span>1-on-1 dengan pengajar</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-book"></i>
                                <span>Fokus pada kebutuhan siswa</span>
                            </div>
                        </div>
                        <div class="kelas-footer">
                            <a href="<?= site_url('/?program=mapel-privat#contact') ?>" class="btn-daftar">
                                Daftar Sekarang <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    
    <script>
        // Toast Notification
        function showToast(message) {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = 'toast success';
            
            toast.innerHTML = `
                <div class="toast-icon"><i class="fa fa-check-circle"></i></div>
                <div class="toast-content">
                    <div class="toast-title">Berhasil!</div>
                    <div class="toast-message">${message}</div>
                </div>
            `;
            
            container.appendChild(toast);
            setTimeout(() => toast.classList.add('show'), 10);
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
        
        // Filter Kelas
        function filterKelas(filter) {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Filter items
            const items = document.querySelectorAll('.kelas-item');
            items.forEach(item => {
                if (filter === 'all') {
                    item.style.display = 'block';
                } else {
                    const kelasData = item.getAttribute('data-kelas');
                    if (kelasData.includes(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        }
        
        // Check URL params for filter
        window.addEventListener('load', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const mapel = urlParams.get('mapel');
            
            if (mapel) {
                // Find and click the appropriate filter button
                const filterBtns = document.querySelectorAll('.filter-btn');
                filterBtns.forEach(btn => {
                    if (btn.textContent.toLowerCase().includes(mapel.toLowerCase()) ||
                        (mapel === 'mapel' && btn.textContent === 'Semua')) {
                        btn.click();
                    }
                });
            }
        });
    </script>

    <!-- Modern Footer -->
    <footer class="main-footer" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <!-- Brand Column -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <h3>Bimbel Jadi Cerdas</h3>
                        <p class="footer-tagline">Membantu siswa mencapai potensi terbaik melalui pembelajaran berkualitas.</p>
                        <div class="footer-social">
                            <a href="https://wa.me/6285747323211" target="_blank" class="social-link whatsapp" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="social-link instagram" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link facebook" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-links">
                        <h5>Menu</h5>
                        <ul>
                            <li><a href="<?= site_url('/') ?>"><i class="fa fa-chevron-right"></i> Home</a></li>
                            <li><a href="<?= site_url('/#services') ?>"><i class="fa fa-chevron-right"></i> Program</a></li>
                            <li><a href="<?= site_url('/#team') ?>"><i class="fa fa-chevron-right"></i> Pengajar</a></li>
                            <li><a href="<?= site_url('/#about-us-section') ?>"><i class="fa fa-chevron-right"></i> About Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Programs -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-links">
                        <h5>Program Bimbel</h5>
                        <ul>
                            <li><a href="<?= site_url('/?program=matematika-grup#contact') ?>"><i class="fa fa-calculator"></i> Matematika</a></li>
                            <li><a href="<?= site_url('/?program=inggris-grup#contact') ?>"><i class="fa fa-language"></i> Bahasa Inggris</a></li>
                            <li><a href="<?= site_url('/?program=mandarin-grup#contact') ?>"><i class="fa fa-globe-asia"></i> Bahasa Mandarin</a></li>
                            <li><a href="<?= site_url('/?program=mapel-grup#contact') ?>"><i class="fa fa-book"></i> Mapel Lainnya</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact">
                        <h5>Hubungi Kami</h5>
                        <div class="contact-item">
                            <i class="fa fa-map-marker-alt"></i>
                            <div>
                                <span>Alamat</span>
                                <p>JL. RA Kartini 107<br>Pekalongan</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fab fa-whatsapp"></i>
                            <div>
                                <span>WhatsApp</span>
                                <a href="https://wa.me/6285747323211" target="_blank">+62 857-4732-3211</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright">&copy; <?= date('Y') ?> Bimbel Jadi Cerdas. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="made-with">
                            Made with <i class="fa fa-heart text-danger"></i> in Pekalongan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Styles -->
    <style>
        .main-footer {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #fff;
            padding: 60px 0 0;
            position: relative;
            overflow: hidden;
        }
        .main-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #7b6ada, #ff6b6b, #feca57, #7b6ada);
            background-size: 300% 100%;
            animation: gradientLine 3s ease infinite;
        }
        @keyframes gradientLine {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .footer-brand h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fff 0%, #7b6ada 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .footer-tagline {
            font-size: 14px;
            color: rgba(255,255,255,0.7);
            margin-bottom: 20px;
        }
        .footer-social {
            display: flex;
            gap: 10px;
        }
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .social-link:hover {
            transform: translateY(-3px);
            color: #fff;
        }
        .social-link.whatsapp:hover { background: #25d366; }
        .social-link.instagram:hover { background: linear-gradient(45deg, #f09433, #bc1888); }
        .social-link.facebook:hover { background: #1877f2; }
        
        .footer-links h5, .footer-contact h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        .footer-links h5::after, .footer-contact h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #7b6ada;
            border-radius: 2px;
        }
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        .footer-links ul li {
            margin-bottom: 10px;
        }
        .footer-links ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        .footer-links ul li a:hover {
            color: #fff;
            padding-left: 5px;
        }
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
        }
        .contact-item i {
            width: 35px;
            height: 35px;
            background: rgba(123, 106, 218, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7b6ada;
            font-size: 14px;
        }
        .contact-item div span {
            font-size: 12px;
            color: rgba(255,255,255,0.5);
        }
        .contact-item div p, .contact-item div a {
            font-size: 14px;
            color: rgba(255,255,255,0.9);
            margin: 0;
            text-decoration: none;
        }
        .footer-bottom {
            margin-top: 40px;
            padding: 20px 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .copyright, .made-with {
            font-size: 13px;
            color: rgba(255,255,255,0.6);
            margin: 0;
        }
    </style>
</body>
</html>
