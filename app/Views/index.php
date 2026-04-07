<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Bimbel Jadi Cerdas</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/templatemo-scholar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    <!-- Custom CSS for Toast Notification -->
    <style>
      /* Toast Notification Styles */
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
      .toast.error {
        border-left: 4px solid #dc3545;
      }
      .toast-icon {
        font-size: 20px;
      }
      .toast.success .toast-icon {
        color: #28a745;
      }
      .toast.error .toast-icon {
        color: #dc3545;
      }
      .toast-content {
        flex: 1;
      }
      .toast-title {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 2px;
      }
      .toast-message {
        font-size: 13px;
        color: #666;
      }
      .toast-close {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #999;
        padding: 0;
        line-height: 1;
      }
      .toast-close:hover {
        color: #333;
      }

      /* WhatsApp Button Styles */
      .whatsapp-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
      }
      .whatsapp-float a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: #25d366;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .whatsapp-float a:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
      }
      .whatsapp-float i {
        font-size: 30px;
        color: white;
      }

      /* Contact Info Styles */
      .contact-info-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
      }
      .contact-info-item:last-child {
        border-bottom: none;
      }
      .contact-info-item i {
        width: 40px;
        height: 40px;
        background: #7b6ada;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
      }
      .contact-info-item a {
        color: #7b6ada;
        text-decoration: none;
        font-weight: 500;
      }
      .contact-info-item a:hover {
        text-decoration: underline;
      }

      /* Maps Container */
      .maps-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-top: 20px;
      }
      .maps-container iframe {
        width: 100%;
        height: 300px;
        border: none;
      }

      /* Form Wizard Styles */
      .form-wizard {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
      }
      .wizard-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        position: relative;
      }
      .wizard-steps::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 50px;
        right: 50px;
        height: 2px;
        background: #e0e0e0;
        z-index: 0;
      }
      .wizard-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        position: relative;
        z-index: 1;
      }
      .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e0e0e0;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      .wizard-step.active .step-number {
        background: #7b6ada;
        color: white;
      }
      .wizard-step.completed .step-number {
        background: #28a745;
        color: white;
      }
      .step-label {
        font-size: 12px;
        color: #666;
        font-weight: 500;
      }
      .wizard-step.active .step-label {
        color: #7b6ada;
      }
      .wizard-content {
        display: none;
      }
      .wizard-content.active {
        display: block;
      }
      .wizard-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
      }
      .btn-wizard {
        padding: 12px 30px;
        border-radius: 25px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      .btn-wizard-prev {
        background: #e0e0e0;
        color: #666;
      }
      .btn-wizard-prev:hover {
        background: #d0d0d0;
      }
      .btn-wizard-next {
        background: #7b6ada;
        color: white;
      }
      .btn-wizard-next:hover {
        background: #6b5aca;
      }

      /* Program Card Styles */
      .program-card {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 15px;
      }
      .program-card:hover {
        border-color: #7b6ada;
        transform: translateY(-3px);
      }
      .program-card.selected {
        border-color: #7b6ada;
        background: #f8f7ff;
      }
      .program-card i {
        font-size: 32px;
        color: #7b6ada;
        margin-bottom: 10px;
      }
      .program-card h5 {
        font-size: 16px;
        margin-bottom: 5px;
      }
      .program-card p {
        font-size: 13px;
        color: #666;
        margin: 0;
      }

      /* Jadwal Selection Styles */
      .jadwal-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
      }
      .jadwal-section h5 {
        color: #7b6ada;
        margin-bottom: 15px;
        font-size: 16px;
      }
      .jadwal-section h5 i {
        margin-right: 8px;
      }
      .form-select-lg {
        padding: 12px 15px;
        font-size: 14px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        width: 100%;
        background-color: white;
      }
      .form-select-lg:focus {
        border-color: #7b6ada;
        box-shadow: 0 0 0 3px rgba(123, 106, 218, 0.1);
        outline: none;
      }
      .form-select-lg.is-invalid {
        border-color: #dc3545;
      }
      .form-select-lg.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
      }
      .jadwal-preview {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        border-left: 4px solid #7b6ada;
      }
      .jadwal-preview h6 {
        color: #333;
        margin-bottom: 10px;
      }
      .jadwal-preview p {
        color: #666;
        margin: 0;
        font-size: 14px;
      }

      /* Confirmation Summary */
      .confirmation-summary {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
      }
      .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
      }
      .summary-item:last-child {
        border-bottom: none;
      }
      .summary-label {
        color: #666;
        font-size: 14px;
      }
      .summary-value {
        font-weight: 600;
        color: #333;
        font-size: 14px;
      }

      /* Tombol Daftar di Kelas */
      .btn-daftar-kelas {
        display: inline-block;
        padding: 10px 25px;
        background: #7b6ada;
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      .btn-daftar-kelas:hover {
        background: #6b5aca;
        transform: translateY(-2px);
        color: white;
      }

      /* Smooth Scroll */
      html {
        scroll-behavior: smooth;
      }

      /* Testimonials Image Fix - Uniform Size */
      .testimonials .item .author {
        display: flex;
        align-items: center;
        gap: 20px;
      }
      .testimonials .item .author img {
        width: 80px !important;
        height: 80px !important;
        min-width: 80px !important;
        min-height: 80px !important;
        max-width: 80px !important;
        max-height: 80px !important;
        border-radius: 50% !important;
        object-fit: cover !important;
        object-position: center !important;
        float: none !important;
        margin-right: 0 !important;
        border: 3px solid rgba(255,255,255,0.3);
      }
      .testimonials .item .author .author-info {
        display: flex;
        flex-direction: column;
      }
      .testimonials .item .author .category {
        margin-top: 0 !important;
        font-size: 13px;
        opacity: 0.9;
      }
      .testimonials .item .author h4 {
        margin-top: 5px !important;
        font-size: 18px;
      }
      /* Responsive testimonials */
      @media (max-width: 768px) {
        .testimonials .item .author img {
          width: 60px !important;
          height: 60px !important;
          min-width: 60px !important;
          min-height: 60px !important;
          max-width: 60px !important;
          max-height: 60px !important;
        }
      }

      /* Modern Footer Styles */
      .main-footer {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        color: #fff;
        padding: 70px 0 0;
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
      
      /* Footer Brand */
      .footer-brand h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #fff 0%, #7b6ada 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      .footer-tagline {
        font-size: 14px;
        line-height: 1.8;
        color: rgba(255,255,255,0.7);
        margin-bottom: 25px;
        max-width: 280px;
      }
      
      /* Social Links */
      .footer-social {
        display: flex;
        gap: 12px;
      }
      .social-link {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        transition: all 0.3s ease;
        text-decoration: none;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
      }
      .social-link:hover {
        transform: translateY(-3px);
        color: #fff;
      }
      .social-link.whatsapp:hover {
        background: #25d366;
        border-color: #25d366;
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
      }
      .social-link.instagram:hover {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        border-color: #e6683c;
        box-shadow: 0 5px 15px rgba(220, 39, 67, 0.4);
      }
      .social-link.facebook:hover {
        background: #1877f2;
        border-color: #1877f2;
        box-shadow: 0 5px 15px rgba(24, 119, 242, 0.4);
      }
      .social-link.youtube:hover {
        background: #ff0000;
        border-color: #ff0000;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
      }
      
      /* Footer Links */
      .footer-links h5,
      .footer-contact h5 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #fff;
        position: relative;
        padding-bottom: 10px;
      }
      .footer-links h5::after,
      .footer-contact h5::after {
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
        margin: 0;
      }
      .footer-links ul li {
        margin-bottom: 12px;
      }
      .footer-links ul li a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .footer-links ul li a i {
        font-size: 12px;
        color: #7b6ada;
        transition: all 0.3s ease;
      }
      .footer-links ul li a:hover {
        color: #fff;
        padding-left: 5px;
      }
      .footer-links ul li a:hover i {
        color: #fff;
      }
      
      /* Footer Contact */
      .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
      }
      .contact-item i {
        width: 40px;
        height: 40px;
        background: rgba(123, 106, 218, 0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #7b6ada;
        font-size: 16px;
        flex-shrink: 0;
      }
      .contact-item div span {
        font-size: 12px;
        color: rgba(255,255,255,0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
      }
      .contact-item div p,
      .contact-item div a {
        font-size: 14px;
        color: rgba(255,255,255,0.9);
        margin: 5px 0 0;
        line-height: 1.6;
        text-decoration: none;
        transition: color 0.3s ease;
      }
      .contact-item div a:hover {
        color: #7b6ada;
      }
      
      /* Footer Bottom */
      .footer-bottom {
        margin-top: 50px;
        padding: 25px 0;
        border-top: 1px solid rgba(255,255,255,0.1);
      }
      .copyright {
        font-size: 14px;
        color: rgba(255,255,255,0.6);
        margin: 0;
      }
      .made-with {
        font-size: 14px;
        color: rgba(255,255,255,0.6);
        margin: 0;
      }
      .made-with i {
        animation: heartbeat 1.5s ease infinite;
      }
      @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
      }
      
      /* Responsive Footer */
      @media (max-width: 768px) {
        .main-footer {
          padding: 50px 0 0;
        }
        .footer-brand {
          text-align: center;
        }
        .footer-tagline {
          max-width: 100%;
        }
        .footer-social {
          justify-content: center;
        }
        .footer-bottom {
          text-align: center;
          margin-top: 30px;
        }
        .made-with {
          margin-top: 10px;
          text-align: center !important;
        }
      }
    </style>
  </head>

<body>

  <!-- Toast Notification Container -->
  <div class="toast-container" id="toastContainer"></div>

  <!-- WhatsApp Float Button -->
  <div class="whatsapp-float">
    <a href="https://wa.me/6285747323211?text=Halo%20Admin%20Bimbel%20Jadi%20Cerdas,%20saya%20ingin%20bertanya" 
       target="_blank" 
       title="Chat WhatsApp">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?= site_url('/') ?>" class="logo">
                        <h1>Bimbel Jadi cerdas</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#services">Program Dan Kelas</a></li>
                      <li class="scroll-to-section"><a href="#courses">Kegiatan</a></li>
                      <li class="scroll-to-section"><a href="#team">Pengajar</a></li>
                      <li class="scroll-to-section"><a href="#about-us-section">About Us</a></li>
                      <li class="scroll-to-section"><a href="#contact">Pendaftaran</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Bimbel Jadi Cerdas</span>
                <h2>Bimbel Jadi Cerdas</h2>
                <p>imbel Jadi Cerdas hadir sebagai mitra belajar yang siap mendukung siswa dalam memahami pelajaran sekolah secara lebih mudah dan menyenangkan.
Dengan tenaga pengajar berpengalaman, materi yang selalu diperbarui, serta metode pembelajaran yang menyesuaikan kebutuhan setiap siswa, kami berupaya menciptakan lingkungan belajar yang positif dan efektif</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="#contact">Daftar Sekarang</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Bimbel Jadi Cerdas</span>
                <h2>Wujudkan Prestasi Bersama Bimbel Jadi Cerdas</h2>
                <p>imbingan Belajar yang membantu siswa memahami pelajaran, meningkatkan nilai, dan membangun kepercayaan diri melalui metode belajar yang efektif</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="#contact">Daftar Sekarang</a>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="<?= base_url('assets/images/service-01.png') ?>" alt="online degrees">
            </div>
            <div class="main-content">
              <h4>Kelas Matematika Dan Mata Pelajaran</h4>
              <p>Membantu Siswa Siswi menjadi lebih memahami dan merasa matematika itu menyenangkan!</p>
              <div class="main-button">
                <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="<?= base_url('assets/images/service-02.png') ?>" alt="short courses">
            </div>
            <div class="main-content">
              <h4>Kelas Mandarin</h4>
              <p>Membantu Siswa Siswi dalam lebih menguasai bahasa asing terutama Bahasa Mandarin. Dibimbing oleh pengajar yang profesional</p>
              <div class="main-button">
                <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="<?= base_url('assets/images/service-03.png') ?>" alt="web experts">
            </div>
            <div class="main-content">
              <h4>Kelas Bahasa Inggris</h4>
              <p>Kelas Bahasa Inggris Bimbel Jadi Cerdas membantu siswa memahami Bahasa Inggris dengan mudah melalui metode belajar interaktif, pengajar profesional, dan materi yang sesuai kurikulum.</p>
              <div class="main-button">
                <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- About Us Section (Enhanced with WhatsApp & Maps) -->
  <div class="section about-us" id="about-us-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-1 order-lg-2">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Mau tahu lebih lanjut tentang Bimbel Jadi Cerdas?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Bimbel <strong>Jadi Cerdas</strong>, adalah bimbel yang terletak di JL.RA Kartini 107 Pekalongan. Buka Pada Pukul 10.00 Pagi - 20.00 Malam
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Bagaimana cara menghubungi kami?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="contact-info-item">
                    <i class="fab fa-whatsapp"></i>
                    <div>
                      <small>WhatsApp</small><br>
                      <a href="https://wa.me/6285747323211" target="_blank">+62 857-4732-3211</a>
                    </div>
                  </div>
                  <div class="contact-info-item">
                    <i class="fa fa-phone"></i>
                    <div>
                      <small>Telepon</small><br>
                      <a href="tel:+6285747323211">+62 857-4732-3211</a>
                    </div>
                  </div>
                  <div class="contact-info-item">
                    <i class="fa fa-map-marker-alt"></i>
                    <div>
                      <small>Alamat</small><br>
                      <span>JL. RA Kartini 107, Pekalongan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Dimana lokasi Bimbel Jadi Cerdas?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p class="mb-3">Kami berlokasi di JL. RA Kartini 107, Pekalongan. Silakan klik peta di bawah untuk mendapatkan petunjuk arah:</p>
                  <div class="maps-container">
                    <iframe 
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0!2d109.675!3d-6.889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTMnMjAuNCJTIDEwMcKwNDAnMzAuMCJF!5e0!3m2!1sid!2sid!4v1234567890"
                      allowfullscreen="" 
                      loading="lazy" 
                      referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                  </div>
                  <a href="https://maps.google.com/?q=JL+RA+Kartini+107+Pekalongan" 
                     target="_blank" 
                     class="btn btn-primary mt-3 w-100">
                    <i class="fa fa-directions mr-2"></i> Buka di Google Maps
                  </a>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Jam operasional kapan?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Senin - Jumat:</strong> 10.00 - 20.00 WIB<br>
                  <strong>Sabtu:</strong> 09.00 - 17.00 WIB<br>
                  <strong>Minggu:</strong> Tutup
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center order-lg-1">
          <div class="section-heading">
            <h6>About Us</h6>
            <h2>Bimbel Jadi Cerdas</h2>
            <p>Bimbel Jadi Cerdas adalah lembaga bimbingan belajar yang berkomitmen membantu siswa meningkatkan prestasi akademik melalui metode belajar yang efektif, interaktif, dan menyenangkan.
Dengan tutor berpengalaman, materi terbaru, serta pendekatan pembelajaran yang mudah dipahami, Bimbel Jadi Cerdas hadir sebagai solusi terbaik untuk membantu siswa mencapai hasil belajar yang optimal.

Kami percaya bahwa setiap anak memiliki potensi besar. Tugas kami adalah membimbing, mengarahkan, dan mengembangkan kemampuan siswa agar menjadi pribadi yang percaya diri, berprestasi, dan tentu saja lebih cerdas setiap hari.</p>
            
            <!-- Contact Info Summary -->
            <div class="contact-info-summary mt-4">
              <div class="contact-info-item">
                <i class="fab fa-whatsapp"></i>
                <div>
                  <a href="https://wa.me/6285747323211" target="_blank">+62 857-4732-3211</a>
                  <small class="d-block text-muted">Klik untuk chat WhatsApp</small>
                </div>
              </div>
              <div class="contact-info-item">
                <i class="fa fa-map-marker-alt"></i>
                <div>
                  <span>JL. RA Kartini 107, Pekalongan</span>
                  <small class="d-block text-muted">Lihat peta untuk petunjuk arah</small>
                </div>
              </div>
            </div>

            <div class="main-button mt-4">
              <a href="https://wa.me/6285747323211" target="_blank">
                <i class="fab fa-whatsapp"></i> Hubungi Kami
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Program Kami</h6>
            <h2>Kelas Bimbel</h2>
          </div>
        </div>
      </div>
      <ul class="event_filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Semua</a>
        </li>
        <li>
          <a href="#!" data-filter=".matematika">Matematika</a>
        </li>
        <li>
          <a href="#!" data-filter=".bahasa">Bahasa</a>
        </li>
        <li>
          <a href="#!" data-filter=".privat">Privat</a>
        </li>
      </ul>
      <div class="row event_box">
        <!-- Bahasa Inggris -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/kelas-inggris.jpg') ?>" alt="Kelas bahasa Inggris"></a>
              <span class="category">Bahasa Inggris</span>
              <span class="price"><h6>SD-SMA</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Grup & Privat</span>
              <h4>Kelas Bahasa Inggris</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 10.00 - 11.30</span>
            </div>
          </div>
        </div>
        <!-- Matematika -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 matematika">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/kelas-matematika.jpg') ?>" alt="Kelas matematika"></a>
              <span class="category">Matematika</span>
              <span class="price"><h6>SD-SMA</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Grup & Privat</span>
              <h4>Kelas Matematika</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 13.00 - 14.30</span>
            </div>
          </div>
        </div>
        <!-- Mandarin -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/kelas-mandarin.jpg') ?>" alt="Kelas bahasa Mandarin"></a>
              <span class="category">Mandarin</span>
              <span class="price"><h6>Semua Level</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Native Speaker</span>
              <h4>Kelas Bahasa Mandarin</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 15.00 - 16.00</span>
            </div>
          </div>
        </div>
        <!-- Bahasa Inggris Conversation -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa privat">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/kelas-bahasainggris.jpg') ?>" alt="Kelas conversation bahasa Inggris"></a>
              <span class="category">Bahasa Inggris</span>
              <span class="price"><h6>Conversation</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Speaking Practice</span>
              <h4>English Conversation</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 11.00 - 12.00</span>
            </div>
          </div>
        </div>
        <!-- Privat -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 privat matematika">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/mapel-01.jpg') ?>" alt="Kelas privat matematika"></a>
              <span class="category">Privat</span>
              <span class="price"><h6>1-on-1</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Fleksibel</span>
              <h4>Kelas Privat Matematika</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 14.00 - 15.00</span>
            </div>
          </div>
        </div>
        <!-- Fasilitas -->
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 privat">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="<?= base_url('assets/images/mapel-02.jpg') ?>" alt="Ruang kelas modern"></a>
              <span class="category">Fasilitas</span>
              <span class="price"><h6>Grup Kecil</h6></span>
            </div>
            <div class="down-content">
              <span class="author">Nyaman & Lengkap</span>
              <h4>Ruang Belajar Modern</h4>
              <span class="time"><i class="fa fa-clock-o"></i> 16.00 - 18.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="70" data-speed="1000"></h2>
                   <p class="count-text ">Murid</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="10" data-speed="1000"></h2>
                  <p class="count-text ">Asisten Pengajar</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="4" data-speed="1000"></h2>
                  <p class="count-text ">Tahun Berdirinya</p>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="team section" id="team">
    <div class="container">
      <div class="row">
        <?php if (!empty($pengajar)) : ?>
          <?php foreach ($pengajar as $p) : ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="team-member">
                <div class="main-content">
                  <?php if ($p['foto']) : ?>
                    <img src="<?= base_url('uploads/pengajar/' . $p['foto']) ?>" alt="<?= esc($p['nama_pengajar']) ?>">
                  <?php else : ?>
                    <img src="<?= base_url('assets/images/member-default.jpg') ?>" alt="<?= esc($p['nama_pengajar']) ?>">
                  <?php endif; ?>
                  <span class="category"><?= esc($p['mata_pelajaran']) ?></span>
                  <h4><?= esc($p['nama_pengajar']) ?></h4>     
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <!-- Default jika tidak ada data pengajar -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="team-member">
              <div class="main-content">
                <img src="<?= base_url('assets/images/shintya.jpg') ?>" alt="">
                <span class="category">Pengajar Matematika</span>
                <h4>Miss Shintya</h4>     
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="team-member">
              <div class="main-content">
                <img src="<?= base_url('assets/images/dewi.jpg') ?>" alt="">
                <span class="category">Pengajar Matematika</span>
                <h4>Miss Dewi</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="team-member">
              <div class="main-content">
                <img src="<?= base_url('assets/images/andry2.jpg') ?>" alt="">
                <span class="category">Pengajar Bahasa Inggris</span>
                <h4>Mr Andry</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="team-member">
              <div class="main-content">
                <img src="<?= base_url('assets/images/windy.jpg') ?>" alt="">
                <span class="category">Pengajar Mandarin</span>
                <h4>Miss Windy</h4>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div> 

  <div class="section testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-carousel owl-testimonials">
            <div class="item">
              <p>"Belajar di Bimbel Jadi Cerdas sangat membantu saya memahami pelajaran yang sebelumnya terasa sulit. Cara pengajar menjelaskannya materinya jelas, sabar, dan mudah dipahami. Nilai saya di sekolah meningkat dan saya jadi lebih percaya diri saat ujian."</p>
              <div class="author">
                <img src="<?= base_url('assets/images/review-siswi.jpg') ?>" alt="Aulia">
                <div class="author-info">
                  <span class="category">Siswi</span>
                  <h4>Aulia</h4>
                </div>
              </div>
            </div>
            <div class="item">
              <p>"Sejak ikut Bimbel Jadi Cerdas, anak saya menjadi lebih rajin belajar dan lebih mudah memahami materi. Pengajarnya ramah dan selalu memotivasi siswa. Kami sebagai orang tua sangat puas dengan hasilnya."</p>
              <div class="author">
                <img src="<?= base_url('assets/images/icon-bapak.jpg') ?>" alt="Andre Susanto">
                <div class="author-info">
                  <span class="category">Orang Tua Siswa</span>
                  <h4>Andre Susanto</h4>
                </div>
              </div>
            </div>
            <div class="item">
              <p>"Menurut aku, Bimbel Jadi Cerdas itu tempat belajar yang enak dan nggak ngebosenin. Kakak pengajarnya ramah dan kalau nerangin pelajaran gampang dipahami. Kalau aku nggak ngerti, boleh tanya berkali-kali dan dijelasin pelan-pelan sampai paham"</p>
              <div class="author">
                <img src="<?= base_url('assets/images/anak-smp.jpg') ?>" alt="Kenzo">
                <div class="author-info">
                  <span class="category">Siswa</span>
                  <h4>Kenzo</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>TESTIMONI</h6>
            <h2>Bagaimana Rasanya Belajar Bersama Di Bimbel Jadi Cerdas?</h2>
            <p>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section events" id="events">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>About US</h6>
            <h2>Bimbel Jadi Cerdas</h2>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="<?= base_url('assets/images/kelas-matematika2.jpg') ?>" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Matematika</span>
                    <h4>SD-SMA Grup/Privat</h4>
                  </li>
                  <li>
                    <span>Jumlah Pertemuan:</span>
                    <h6>2x Dalam 1 Minggu</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>1 Jam 30 Menit</h6>
                  </li>
                  <li>
                    <a href="<?= site_url('daftar-kelas?mapel=matematika') ?>">Daftar</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="<?= base_url('assets/images/kelas-mandarin2.jpg') ?>" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Kelas Bahasa Mandarin</span>
                    <h4>Grup/Privat</h4>
                  </li>
                  <li>
                    <span>Jumlah Pertemuan:</span>
                    <h6>2x Dalam 1 Minggu</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>1 Jam</h6>
                  </li>
                  <li>
                    <a href="<?= site_url('daftar-kelas?mapel=mandarin') ?>">Daftar</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
         <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="<?= base_url('assets/images/kelas-mapel.jpg') ?>" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Mapel</span>
                    <h4>Grup/Privat</h4>
                  </li>
                  <li>
                    <span>Jumlah Pertemuan:</span>
                    <h6>1-5x Dalam 1 Minggu</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>1 Jam 30 Menit</h6>
                  </li>
                  <li>
                    <a href="<?= site_url('daftar-kelas?mapel=mapel') ?>">Daftar</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="<?= base_url('assets/images/kelas-bahasainggris.jpg') ?>" alt="">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category">Kelas Bahasa Inggris</span>
                    <h4>SD-SMA Grup/Privat</h4>
                  </li>
                  <li>
                    <span>Jumlah Pertemuan:</span>
                    <h6>2x Dalam 1 Minggu</h6>
                  </li>
                  <li>
                    <span>Durasi:</span>
                    <h6>1 Jam</h6>
                  </li>
                  <li>
                    <a href="<?= site_url('daftar-kelas?mapel=inggris') ?>">Daftar</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Multi-Step Registration Form -->
  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading text-center">
            <h6>Daftar Sekarang Juga!</h6>
            <h2>Formulir Pendaftaran</h2>
            <p>Bergabunglah bersama kami untuk mendapatkan layanan terbaik dan pengalaman belajar yang berkualitas.</p>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="form-wizard">
            <!-- Wizard Steps Indicator -->
            <div class="wizard-steps">
              <div class="wizard-step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Program</div>
              </div>
              <div class="wizard-step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Data Diri</div>
              </div>
              <div class="wizard-step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Jadwal</div>
              </div>
              <div class="wizard-step" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Konfirmasi</div>
              </div>
            </div>

            <!-- Wizard Form -->
            <form id="registrationForm" action="<?= site_url('pendaftaran/umum') ?>" method="post">
              <!-- Step 1: Program -->
              <div class="wizard-content active" id="step1">
                <h4 class="mb-4">Pilih Program Bimbel</h4>
                <p class="text-muted mb-4">Pilih kombinasi mata pelajaran dan tipe program yang Anda inginkan.</p>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="program-card" data-program="matematika-grup" onclick="selectProgram(this)">
                      <i class="fa fa-calculator"></i>
                      <h5>Matematika - Grup</h5>
                      <p>Belajar matematika dalam kelompok</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="matematika-privat" onclick="selectProgram(this)">
                      <i class="fa fa-user"></i>
                      <h5>Matematika - Privat</h5>
                      <p>Belajar matematika privat 1-on-1</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="inggris-grup" onclick="selectProgram(this)">
                      <i class="fa fa-language"></i>
                      <h5>Bahasa Inggris - Grup</h5>
                      <p>Belajar bahasa Inggris dalam kelompok</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="inggris-privat" onclick="selectProgram(this)">
                      <i class="fa fa-user"></i>
                      <h5>Bahasa Inggris - Privat</h5>
                      <p>Belajar bahasa Inggris privat 1-on-1</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="mandarin-grup" onclick="selectProgram(this)">
                      <i class="fa fa-globe-asia"></i>
                      <h5>Bahasa Mandarin - Grup</h5>
                      <p>Belajar bahasa Mandarin dalam kelompok</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="mandarin-privat" onclick="selectProgram(this)">
                      <i class="fa fa-user"></i>
                      <h5>Bahasa Mandarin - Privat</h5>
                      <p>Belajar bahasa Mandarin privat 1-on-1</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="mapel-grup" onclick="selectProgram(this)">
                      <i class="fa fa-book"></i>
                      <h5>Mapel - Grup</h5>
                      <p>Belajar mata pelajaran lain dalam kelompok</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="program-card" data-program="mapel-privat" onclick="selectProgram(this)">
                      <i class="fa fa-user"></i>
                      <h5>Mapel - Privat</h5>
                      <p>Belajar mata pelajaran lain privat 1-on-1</p>
                    </div>
                  </div>
                </div>
                
                <input type="hidden" name="program" id="selectedProgram" required>
              </div>

              <!-- Step 2: Data Diri -->
              <div class="wizard-content" id="step2">
                <h4 class="mb-4">Data Diri Pengguna</h4>
                <div class="row">
                  <!-- Baris 1: Nama Lengkap (full width) -->
                  <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
                  </div>
                  
                  <!-- Baris 2: Alamat (full width) -->
                  <div class="col-md-12 mb-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat_rumah" class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
                  </div>
                  
                  <!-- Baris 3: Tanggal Lahir & No WhatsApp -->
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="no_wa" class="form-control" placeholder="08xxxxxxxxxx" required>
                  </div>
                  
                  <!-- Baris 4: Asal Sekolah & Kelas -->
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama sekolah" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Kelas <span class="text-danger">*</span></label>
                    <input type="text" name="kelas" class="form-control" placeholder="Contoh: 6A / X IPA" required>
                  </div>
                  
                  <!-- Baris 5: Nama Orang Tua & No WA Orang Tua -->
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Orang Tua <span class="text-danger">*</span></label>
                    <input type="text" name="nama_orangtua" class="form-control" placeholder="Nama orang tua" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label">No WA Orang Tua <span class="text-danger">*</span></label>
                    <input type="text" name="wa_orangtua" class="form-control" placeholder="08xxxxxxxxxx" required>
                  </div>
                </div>
              </div>

              <!-- Step 3: Jadwal -->
              <div class="wizard-content" id="step3">
                <h4 class="mb-4">Pilih Jadwal Belajar</h4>
                <p class="text-muted mb-4">Pilih hari dan jam yang sesuai dengan ketersediaan waktu Anda.</p>
                
                <!-- Hari Pertemuan -->
                <div class="jadwal-section">
                  <h5><i class="fa fa-calendar"></i> Hari Pertemuan</h5>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Pertemuan 1 <span class="text-danger">*</span></label>
                      <select name="hari_pertama" id="hariPertama" class="form-select form-select-lg" required onchange="updateJadwalPreview()">
                        <option value="">-- Pilih Hari Pertama --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Pertemuan 2 <span class="text-danger">*</span></label>
                      <select name="hari_kedua" id="hariKedua" class="form-select form-select-lg" required onchange="updateJadwalPreview()">
                        <option value="">-- Pilih Hari Kedua --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Jam Pertemuan -->
                <div class="jadwal-section">
                  <h5><i class="fa fa-clock"></i> Jam Belajar</h5>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="form-label">Pilih Jam <span class="text-danger">*</span></label>
                      <select name="jam" id="jamBelajar" class="form-select form-select-lg" required onchange="updateJadwalPreview()">
                        <option value="">-- Pilih Jam --</option>
                        <option value="10:00-11:30">10:00 - 11:30</option>
                        <option value="12:00-13:30">12:00 - 13:30</option>
                        <option value="14:00-15:30">14:00 - 15:30</option>
                        <option value="16:00-17:30">16:00 - 17:30</option>
                        <option value="18:30-20:00">18:30 - 20:00</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Preview Jadwal -->
                <div class="jadwal-preview" id="jadwalPreview" style="display: none;">
                  <h6><i class="fa fa-check-circle text-success"></i> Jadwal yang Anda Pilih:</h6>
                  <p id="jadwalText">-</p>
                </div>
                
                <input type="hidden" name="jadwal" id="selectedJadwal" required>
              </div>

              <!-- Step 4: Konfirmasi -->
              <div class="wizard-content" id="step4">
                <h4 class="mb-4">Konfirmasi Pendaftaran</h4>
                <p class="text-muted mb-4">Pastikan data yang Anda masukkan sudah benar.</p>
                
                <div class="confirmation-summary">
                  <!-- Urutan sesuai alur wizard: Program -> Data Diri -> Jadwal -->
                  <div class="summary-item" style="background: #f0f7ff; border-radius: 5px; padding: 10px;">
                    <span class="summary-label"><i class="fa fa-book" style="color: #7b6ada;"></i> Program</span>
                    <span class="summary-value" id="summaryProgram" style="color: #7b6ada; font-weight: 700;">-</span>
                  </div>
                  <hr style="margin: 15px 0; border-color: #e0e0e0;">
                  <div class="summary-item">
                    <span class="summary-label">Nama Lengkap</span>
                    <span class="summary-value" id="summaryNama">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">Alamat</span>
                    <span class="summary-value" id="summaryAlamat">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">Tanggal Lahir</span>
                    <span class="summary-value" id="summaryTglLahir">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">No WhatsApp</span>
                    <span class="summary-value" id="summaryNoWA">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">Asal Sekolah</span>
                    <span class="summary-value" id="summarySekolah">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">Kelas</span>
                    <span class="summary-value" id="summaryKelas">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">Nama Orang Tua</span>
                    <span class="summary-value" id="summaryOrtu">-</span>
                  </div>
                  <div class="summary-item">
                    <span class="summary-label">No WA Orang Tua</span>
                    <span class="summary-value" id="summaryWaOrtu">-</span>
                  </div>
                  <hr style="margin: 15px 0; border-color: #e0e0e0;">
                  <div class="summary-item" style="background: #fff9f0; border-radius: 5px; padding: 10px;">
                    <span class="summary-label"><i class="fa fa-clock" style="color: #ff9800;"></i> Jadwal</span>
                    <span class="summary-value" id="summaryJadwal" style="color: #ff9800; font-weight: 700;">-</span>
                  </div>
                </div>
              </div>

              <!-- Wizard Buttons -->
              <div class="wizard-buttons">
                <button type="button" class="btn-wizard btn-wizard-prev" id="btnPrev" onclick="prevStep()" style="visibility: hidden;">
                  <i class="fa fa-arrow-left"></i> Sebelumnya
                </button>
                <button type="button" class="btn-wizard btn-wizard-next" id="btnNext" onclick="nextStep()">
                  Selanjutnya <i class="fa fa-arrow-right"></i>
                </button>
                <button type="submit" class="btn-wizard btn-wizard-next" id="btnSubmit" style="display: none;">
                  <i class="fa fa-check"></i> Daftar Sekarang
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modern Footer -->
  <footer class="main-footer">
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
              <a href="#" class="social-link youtube" title="YouTube">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <div class="footer-links">
            <h5>Menu</h5>
            <ul>
              <li><a href="#top"><i class="fa fa-chevron-right"></i> Home</a></li>
              <li><a href="#services"><i class="fa fa-chevron-right"></i> Program</a></li>
              <li><a href="#courses"><i class="fa fa-chevron-right"></i> Kegiatan</a></li>
              <li><a href="#team"><i class="fa fa-chevron-right"></i> Pengajar</a></li>
              <li><a href="#about-us-section"><i class="fa fa-chevron-right"></i> About Us</a></li>
              <li><a href="#contact"><i class="fa fa-chevron-right"></i> Daftar</a></li>
            </ul>
          </div>
        </div>

        <!-- Programs -->
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <div class="footer-links">
            <h5>Program Bimbel</h5>
            <ul>
              <li><a href="<?= site_url('daftar-kelas?mapel=matematika') ?>"><i class="fa fa-calculator"></i> Matematika</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=inggris') ?>"><i class="fa fa-language"></i> Bahasa Inggris</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=mandarin') ?>"><i class="fa fa-globe-asia"></i> Bahasa Mandarin</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=mapel') ?>"><i class="fa fa-book"></i> Mapel Lainnya</a></li>
              <li><a href="<?= site_url('daftar-kelas') ?>"><i class="fa fa-users"></i> Kelas Grup</a></li>
              <li><a href="<?= site_url('daftar-kelas') ?>"><i class="fa fa-user"></i> Kelas Privat</a></li>
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
                <p>JL. RA Kartini 107<br>Pekalongan, Jawa Tengah</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fab fa-whatsapp"></i>
              <div>
                <span>WhatsApp</span>
                <a href="https://wa.me/6285747323211" target="_blank">+62 857-4732-3211</a>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa fa-clock"></i>
              <div>
                <span>Jam Operasional</span>
                <p>Senin - Jumat: 10.00 - 20.00<br>Sabtu: 09.00 - 17.00</p>
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

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/isotope.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/owl-carousel.js') ?>"></script>
  <script src="<?= base_url('assets/js/counter.js') ?>"></script>
  <script src="<?= base_url('assets/js/custom.js') ?>"></script>

  <!-- Custom JavaScript for Toast, Wizard, and Form -->
  <script>
    // Toast Notification System
    function showToast(message, type = 'success', duration = 5000) {
      const container = document.getElementById('toastContainer');
      const toast = document.createElement('div');
      toast.className = `toast ${type}`;
      
      const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
      const title = type === 'success' ? 'Berhasil!' : 'Error!';
      
      toast.innerHTML = `
        <div class="toast-icon"><i class="fa ${icon}"></i></div>
        <div class="toast-content">
          <div class="toast-title">${title}</div>
          <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
      `;
      
      container.appendChild(toast);
      
      // Trigger animation
      setTimeout(() => toast.classList.add('show'), 10);
      
      // Auto remove
      setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
      }, duration);
    }

    // Form Wizard Logic
    let currentStep = 1;
    const totalSteps = 4;

    function updateWizard() {
      // Update step indicators
      document.querySelectorAll('.wizard-step').forEach((step, index) => {
        step.classList.remove('active', 'completed');
        if (index + 1 < currentStep) {
          step.classList.add('completed');
          step.querySelector('.step-number').innerHTML = '<i class="fa fa-check"></i>';
        } else if (index + 1 === currentStep) {
          step.classList.add('active');
          step.querySelector('.step-number').innerHTML = index + 1;
        } else {
          step.querySelector('.step-number').innerHTML = index + 1;
        }
      });

      // Show/hide content
      document.querySelectorAll('.wizard-content').forEach((content, index) => {
        content.classList.toggle('active', index + 1 === currentStep);
      });

      // Update buttons
      document.getElementById('btnPrev').style.visibility = currentStep === 1 ? 'hidden' : 'visible';
      document.getElementById('btnNext').style.display = currentStep === totalSteps ? 'none' : 'inline-block';
      document.getElementById('btnSubmit').style.display = currentStep === totalSteps ? 'inline-block' : 'none';

      // Update summary if on step 4
      if (currentStep === 4) {
        updateSummary();
      }
    }

    function nextStep() {
      if (validateStep(currentStep)) {
        if (currentStep < totalSteps) {
          currentStep++;
          updateWizard();
        }
      }
    }

    function prevStep() {
      if (currentStep > 1) {
        currentStep--;
        updateWizard();
      }
    }

    function validateStep(step) {
      const stepContent = document.getElementById(`step${step}`);
      const requiredFields = stepContent.querySelectorAll('[required]');
      let valid = true;

      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          valid = false;
          field.classList.add('is-invalid');
        } else {
          field.classList.remove('is-invalid');
        }
      });

      // Additional validation for step 1 (program)
      if (step === 1 && !document.getElementById('selectedProgram').value) {
        showToast('Silakan pilih program terlebih dahulu', 'error');
        return false;
      }

      // Additional validation for step 3 (jadwal)
      if (step === 3) {
        const hariPertama = document.getElementById('hariPertama').value;
        const hariKedua = document.getElementById('hariKedua').value;
        const jam = document.getElementById('jamBelajar').value;
        
        if (!hariPertama || !hariKedua || !jam) {
          showToast('Silakan lengkapi pemilihan hari dan jam terlebih dahulu', 'error');
          return false;
        }
        
        if (hariPertama === hariKedua) {
          showToast('Hari pertama dan kedua tidak boleh sama', 'error');
          return false;
        }
      }

      if (!valid) {
        showToast('Mohon lengkapi semua field yang wajib diisi', 'error');
      }

      return valid;
    }

    function selectProgram(element) {
      document.querySelectorAll('.program-card').forEach(card => {
        card.classList.remove('selected');
      });
      element.classList.add('selected');
      document.getElementById('selectedProgram').value = element.dataset.program;
    }

    function updateJadwalPreview() {
      const hariPertama = document.getElementById('hariPertama').value;
      const hariKedua = document.getElementById('hariKedua').value;
      const jam = document.getElementById('jamBelajar').value;
      
      const previewDiv = document.getElementById('jadwalPreview');
      const previewText = document.getElementById('jadwalText');
      const hiddenInput = document.getElementById('selectedJadwal');
      
      if (hariPertama && hariKedua && jam) {
        const jadwalStr = `${hariPertama} & ${hariKedua}, Pukul ${jam.replace('-', ' - ')}`;
        previewText.textContent = jadwalStr;
        hiddenInput.value = jadwalStr;
        previewDiv.style.display = 'block';
      } else {
        previewDiv.style.display = 'none';
        hiddenInput.value = '';
      }
    }

    function updateSummary() {
      // Update summary values - urutan: Program, Data Diri, Jadwal
      const programMap = {
        'matematika-grup': 'Matematika - Grup',
        'matematika-privat': 'Matematika - Privat',
        'inggris-grup': 'Bahasa Inggris - Grup',
        'inggris-privat': 'Bahasa Inggris - Privat',
        'mandarin-grup': 'Bahasa Mandarin - Grup',
        'mandarin-privat': 'Bahasa Mandarin - Privat',
        'mapel-grup': 'Mapel - Grup',
        'mapel-privat': 'Mapel - Privat'
      };
      document.getElementById('summaryProgram').textContent = programMap[document.getElementById('selectedProgram').value] || '-';
      
      // Data Diri
      document.getElementById('summaryNama').textContent = document.querySelector('input[name="nama_lengkap"]').value || '-';
      document.getElementById('summaryAlamat').textContent = document.querySelector('textarea[name="alamat_rumah"]').value || '-';
      document.getElementById('summaryTglLahir').textContent = document.querySelector('input[name="tanggal_lahir"]').value || '-';
      document.getElementById('summaryNoWA').textContent = document.querySelector('input[name="no_wa"]').value || '-';
      document.getElementById('summarySekolah').textContent = document.querySelector('input[name="asal_sekolah"]').value || '-';
      document.getElementById('summaryKelas').textContent = document.querySelector('input[name="kelas"]').value || '-';
      document.getElementById('summaryOrtu').textContent = document.querySelector('input[name="nama_orangtua"]').value || '-';
      document.getElementById('summaryWaOrtu').textContent = document.querySelector('input[name="wa_orangtua"]').value || '-';
      
      // Jadwal
      document.getElementById('summaryJadwal').textContent = document.getElementById('selectedJadwal').value || '-';
    }

    // Form submission
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Simulate form submission (will be replaced with actual AJAX when backend ready)
      const formData = new FormData(this);
      
      // Show loading state
      const submitBtn = document.getElementById('btnSubmit');
      submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses...';
      submitBtn.disabled = true;
      
      // Simulate API call
      setTimeout(() => {
        showToast('Pendaftaran berhasil ditambahkan', 'success');
        submitBtn.innerHTML = '<i class="fa fa-check"></i> Daftar Sekarang';
        submitBtn.disabled = false;
        
        // Reset form after success
        setTimeout(() => {
          this.reset();
          currentStep = 1;
          document.querySelectorAll('.program-card').forEach(card => {
            card.classList.remove('selected');
          });
          document.getElementById('jadwalPreview').style.display = 'none';
          updateWizard();
        }, 2000);
      }, 1500);
    });

    // Remove invalid class on input/select
    document.querySelectorAll('input, select').forEach(input => {
      input.addEventListener('input', function() {
        this.classList.remove('is-invalid');
      });
      input.addEventListener('change', function() {
        this.classList.remove('is-invalid');
      });
    });

    // Check URL params for pre-selected program
    window.addEventListener('load', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const program = urlParams.get('program');
      if (program) {
        // Scroll to registration form
        document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
        
        // Select the program after a short delay
        setTimeout(() => {
          const programCard = document.querySelector(`[data-program="${program}"]`);
          if (programCard) {
            // Already on step 1 (Program), just select the card
            selectProgram(programCard);
            // Auto advance to step 2 (Data Diri) after selecting program
            setTimeout(() => {
              if (validateStep(1)) {
                currentStep = 2;
                updateWizard();
              }
            }, 300);
          }
        }, 500);
      }
    });

    // Show success/error messages from session
    <?php if (session()->getFlashdata('success')): ?>
    showToast('<?= session()->getFlashdata('success') ?>', 'success');
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
    showToast('<?= session()->getFlashdata('error') ?>', 'error');
    <?php endif; ?>
  </script>

  </body>
</html>
