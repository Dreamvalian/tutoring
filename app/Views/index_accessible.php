<!DOCTYPE html>
<html lang="id">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bimbel Jadi Cerdas - Lembaga bimbingan belajar terbaik di Pekalongan untuk SD, SMP, SMA. Program Matematika, Bahasa Inggris, Bahasa Mandarin.">
    <meta name="keywords" content="bimbel, les privat, matematika, bahasa inggris, mandarin, pekalongan, bimbingan belajar">
    <meta name="author" content="Bimbel Jadi Cerdas">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Bimbel Jadi Cerdas - Bimbingan Belajar Terbaik di Pekalongan">
    <meta property="og:description" content="Lembaga bimbingan belajar dengan metode efektif, interaktif, dan menyenangkan.">
    <meta property="og:locale" content="id_ID">
    
    <!-- Theme Color for Mobile Browsers -->
    <meta name="theme-color" content="#7b6ada">
    <meta name="msapplication-TileColor" content="#7b6ada">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Bimbel Jadi Cerdas - Bimbingan Belajar Pekalongan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/templatemo-scholar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    <!-- Custom CSS for Accessibility & UX -->
    <style>
      /* Skip to Main Content Link */
      .skip-to-main {
        position: absolute;
        top: -40px;
        left: 0;
        background: #7b6ada;
        color: white;
        padding: 8px 16px;
        z-index: 10000;
        text-decoration: none;
        border-radius: 0 0 8px 0;
        font-weight: 600;
        transition: top 0.3s;
      }
      .skip-to-main:focus {
        top: 0;
        outline: 3px solid #fff;
        outline-offset: 2px;
      }

      /* Enhanced Focus Indicators */
      *:focus {
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
      }
      *:focus:not(:focus-visible) {
        outline: none;
      }
      *:focus-visible {
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
        box-shadow: 0 0 0 4px rgba(123, 106, 218, 0.3);
      }

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
        border-left: 4px solid #28a745;
        role: status;
        aria-live: polite;
      }
      .toast.show {
        transform: translateX(0);
        opacity: 1;
      }
      .toast.success {
        border-left-color: #28a745;
      }
      .toast.error {
        border-left-color: #dc3545;
      }
      .toast-icon {
        font-size: 20px;
        flex-shrink: 0;
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
        padding: 4px 8px;
        line-height: 1;
        border-radius: 4px;
        transition: all 0.2s;
        min-width: 32px;
        min-height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .toast-close:hover, .toast-close:focus {
        color: #333;
        background: #f0f0f0;
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
        position: relative;
      }
      .whatsapp-float a:hover, .whatsapp-float a:focus {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
        outline: 3px solid #fff;
        outline-offset: 2px;
      }
      .whatsapp-float a::before {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: border-color 0.3s;
      }
      .whatsapp-float a:focus::before {
        border-color: #7b6ada;
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
        flex-shrink: 0;
      }
      .contact-info-item a {
        color: #5a4aba;
        text-decoration: none;
        font-weight: 500;
        text-underline-offset: 3px;
      }
      .contact-info-item a:hover, .contact-info-item a:focus {
        text-decoration: underline;
        color: #7b6ada;
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
        font-weight: 600;
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
        min-height: 48px;
        min-width: 120px;
        font-size: 16px;
      }
      .btn-wizard:focus {
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
        box-shadow: 0 0 0 4px rgba(123, 106, 218, 0.3);
      }
      .btn-wizard-prev {
        background: #e0e0e0;
        color: #333;
      }
      .btn-wizard-prev:hover, .btn-wizard-prev:focus {
        background: #d0d0d0;
      }
      .btn-wizard-next {
        background: #7b6ada;
        color: white;
      }
      .btn-wizard-next:hover, .btn-wizard-next:focus {
        background: #6b5aca;
        transform: translateY(-2px);
      }

      /* Program Card Styles - Accessibility Enhanced */
      .program-card {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 15px;
        background: white;
        position: relative;
      }
      .program-card:hover, .program-card:focus {
        border-color: #7b6ada;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(123, 106, 218, 0.2);
        outline: none;
      }
      .program-card:focus-visible {
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
      }
      .program-card.selected {
        border-color: #7b6ada;
        background: #f8f7ff;
        box-shadow: 0 4px 15px rgba(123, 106, 218, 0.3);
      }
      .program-card i {
        font-size: 32px;
        color: #7b6ada;
        margin-bottom: 10px;
      }
      .program-card h5 {
        font-size: 16px;
        margin-bottom: 5px;
        color: #333;
      }
      .program-card p {
        font-size: 13px;
        color: #666;
        margin: 0;
      }
      .program-card[role="radio"]:focus {
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
      }

      /* Jadwal Selection Styles */
      .jadwal-section {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
      }
      .jadwal-section h5 {
        color: #5a4aba;
        margin-bottom: 15px;
        font-size: 16px;
      }
      .jadwal-section h5 i {
        margin-right: 8px;
      }
      .form-select-lg {
        padding: 12px 15px;
        font-size: 16px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        width: 100%;
        background-color: white;
        min-height: 48px;
      }
      .form-select-lg:focus {
        border-color: #7b6ada;
        box-shadow: 0 0 0 4px rgba(123, 106, 218, 0.1);
        outline: none;
      }
      .form-select-lg.is-invalid {
        border-color: #dc3545;
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
        flex-wrap: wrap;
        gap: 8px;
      }
      .summary-item:last-child {
        border-bottom: none;
      }
      .summary-label {
        color: #555;
        font-size: 14px;
        font-weight: 500;
      }
      .summary-value {
        font-weight: 600;
        color: #333;
        font-size: 14px;
        text-align: right;
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
        min-height: 44px;
        min-width: 100px;
        text-align: center;
        line-height: 24px;
      }
      .btn-daftar-kelas:hover, .btn-daftar-kelas:focus {
        background: #6b5aca;
        transform: translateY(-2px);
        color: white;
        outline: 3px solid #7b6ada;
        outline-offset: 2px;
      }

      /* Team Section - Equal Height Cards */
      .team .row {
        display: flex;
        flex-wrap: wrap;
      }
      .team .row > [class*="col-"] {
        display: flex;
        margin-bottom: 30px;
      }
      .team-member {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      .team-member:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
      }
      .team-member .main-content {
        padding: 25px;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .team-member img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 15px;
        border: 4px solid #f0f0f0;
      }
      .team-member .category {
        display: inline-block;
        background: #7b6ada;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        margin-bottom: 10px;
      }
      .team-member h3 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        color: #333;
      }

      /* Courses/Events Grid Section - Equal Height */
      .courses .row {
        display: flex;
        flex-wrap: wrap;
      }
      .courses .row > [class*="col-"] {
        display: flex;
        margin-bottom: 30px;
      }

      /* Events Section - Button Vertically Centered */
      .events_item {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
      }
      .events_item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
      }
      .events_item .thumb {
        position: relative;
        overflow: hidden;
      }
      .events_item .thumb img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
      }
      .events_item:hover .thumb img {
        transform: scale(1.05);
      }
      .events_item .down-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
      }
      .events_item .author {
        font-size: 13px;
        color: #7b6ada;
        font-weight: 500;
        margin-bottom: 5px;
      }
      .events_item h4 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        color: #333;
        flex: 1;
      }

      /* Services Section - Equal Height */
      .services .row {
        display: flex;
        flex-wrap: wrap;
      }
      .services .row > [class*="col-"] {
        display: flex;
        margin-bottom: 30px;
      }

      /* Program Section Cards */
      .service-item {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
      }
      .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
      }
      .service-item .icon {
        margin-bottom: 20px;
      }
      .service-item .icon img {
        width: 80px;
        height: 80px;
        object-fit: contain;
      }
      .service-item .main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
      }
      .service-item h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
      }
      .service-item p {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        flex: 1;
        margin-bottom: 20px;
      }
      .service-item .main-button {
        margin-top: auto;
      }

      /* Events List Section - Button Alignment Fix */
      #events .item {
        background: #f8f9ff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
      }
      #events .item:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
      }
      #events .item .image {
        height: 100%;
        display: flex;
        align-items: center;
      }
      #events .item .image img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
      }
      #events .item .row {
        display: flex;
        align-items: center;
      }
      #events .item ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        height: 100%;
      }
      #events .item ul li {
        flex: 1;
        min-width: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      #events .item ul li:first-child {
        flex: 2;
        min-width: 200px;
      }
      #events .item ul li:last-child {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100%;
      }
      #events .item .btn-daftar-kelas {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        padding: 12px 30px;
        font-size: 14px;
        line-height: 1;
        white-space: nowrap;
      }
      #events .item .category {
        background: #7b6ada;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        display: inline-block;
        margin-bottom: 8px;
      }
      #events .item h4 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        color: #333;
      }
      #events .item span {
        font-size: 13px;
        color: #666;
      }
      #events .item h6 {
        font-size: 14px;
        font-weight: 600;
        color: #7b6ada;
        margin: 5px 0 0;
      }

      /* Smooth Scroll */
      html {
        scroll-behavior: smooth;
      }

      /* Testimonials Image Fix */
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
        background: linear-gradient(135deg, #fff 0%, #b8b0e8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      .footer-tagline {
        font-size: 14px;
        line-height: 1.8;
        color: rgba(255,255,255,0.85);
        margin-bottom: 25px;
        max-width: 280px;
      }
      
      /* Social Links */
      .footer-social {
        display: flex;
        gap: 12px;
      }
      .social-link {
        width: 44px;
        height: 44px;
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
        min-width: 44px;
        min-height: 44px;
      }
      .social-link:hover, .social-link:focus {
        transform: translateY(-3px);
        color: #fff;
        outline: 3px solid rgba(255,255,255,0.5);
        outline-offset: 2px;
      }
      .social-link.whatsapp:hover, .social-link.whatsapp:focus {
        background: #25d366;
        border-color: #25d366;
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
      }
      .social-link.instagram:hover, .social-link.instagram:focus {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        border-color: #e6683c;
        box-shadow: 0 5px 15px rgba(220, 39, 67, 0.4);
      }
      .social-link.facebook:hover, .social-link.facebook:focus {
        background: #1877f2;
        border-color: #1877f2;
        box-shadow: 0 5px 15px rgba(24, 119, 242, 0.4);
      }
      .social-link.youtube:hover, .social-link.youtube:focus {
        background: #ff0000;
        border-color: #ff0000;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
      }
      
      /* Footer Links - Enhanced Contrast */
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
        background: #b8b0e8;
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
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 4px 0;
        text-underline-offset: 3px;
      }
      .footer-links ul li a i {
        font-size: 12px;
        color: #b8b0e8;
        transition: all 0.3s ease;
      }
      .footer-links ul li a:hover, .footer-links ul li a:focus {
        color: #fff;
        padding-left: 5px;
        text-decoration: underline;
        outline: none;
      }
      .footer-links ul li a:hover i,
      .footer-links ul li a:focus i {
        color: #fff;
      }
      .footer-links ul li a:focus-visible {
        outline: 2px solid rgba(255,255,255,0.5);
        outline-offset: 2px;
        border-radius: 4px;
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
        background: rgba(123, 106, 218, 0.3);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b8b0e8;
        font-size: 16px;
        flex-shrink: 0;
      }
      .contact-item div span {
        font-size: 12px;
        color: rgba(255,255,255,0.7);
        text-transform: uppercase;
        letter-spacing: 1px;
      }
      .contact-item div p,
      .contact-item div a {
        font-size: 14px;
        color: rgba(255,255,255,0.95);
        margin: 5px 0 0;
        line-height: 1.6;
        text-decoration: none;
        transition: color 0.3s ease;
        text-underline-offset: 3px;
      }
      .contact-item div a:hover, .contact-item div a:focus {
        color: #b8b0e8;
        text-decoration: underline;
      }
      
      /* Footer Bottom */
      .footer-bottom {
        margin-top: 50px;
        padding: 25px 0;
        border-top: 1px solid rgba(255,255,255,0.15);
      }
      .copyright {
        font-size: 14px;
        color: rgba(255,255,255,0.8);
        margin: 0;
      }
      .made-with {
        font-size: 14px;
        color: rgba(255,255,255,0.8);
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
          margin-left: auto;
          margin-right: auto;
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

      /* Reduced Motion */
      @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
          animation-duration: 0.01ms !important;
          animation-iteration-count: 1 !important;
          transition-duration: 0.01ms !important;
          scroll-behavior: auto !important;
        }
        .whatsapp-float a::before {
          display: none;
        }
      }

      /* High Contrast Mode Support */
      @media (prefers-contrast: high) {
        .program-card {
          border-width: 3px;
        }
        .program-card.selected {
          border-width: 4px;
        }
        .btn-wizard {
          border: 2px solid currentColor;
        }
        .footer-links ul li a {
          text-decoration: underline;
        }
      }

      /* Print Styles */
      @media print {
        .whatsapp-float,
        .toast-container,
        .main-nav,
        .footer-social {
          display: none !important;
        }
        .main-footer {
          background: #fff !important;
          color: #000 !important;
        }
        .footer-brand h3 {
          color: #000 !important;
          -webkit-text-fill-color: #000 !important;
        }
      }
    </style>
  </head>

<body>
  <!-- Skip to Main Content - Accessibility -->
  <a href="#main-content" class="skip-to-main">Lewati ke Konten Utama</a>

  <!-- Toast Notification Container -->
  <div class="toast-container" id="toastContainer" role="region" aria-live="polite" aria-label="Notifikasi"></div>

  <!-- WhatsApp Float Button -->
  <div class="whatsapp-float">
    <a href="https://wa.me/6285747323211?text=Halo%20Admin%20Bimbel%20Jadi%20Cerdas,%20saya%20ingin%20bertanya" 
       target="_blank" 
       rel="noopener noreferrer"
       aria-label="Chat WhatsApp dengan Bimbel Jadi Cerdas"
       title="Chat WhatsApp">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>
  </div>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader" role="status" aria-live="polite" aria-label="Memuat halaman">
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
  <header class="header-area header-sticky" role="banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav" role="navigation" aria-label="Menu utama">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?= site_url('/') ?>" class="logo" aria-label="Beranda Bimbel Jadi Cerdas">
                        <h1>Bimbel Jadi cerdas</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search Start ***** -->
                    <div class="search-input">
                      <form id="search" action="#" role="search" aria-label="Pencarian situs">
                        <label for="searchText" class="visually-hidden">Cari di situs</label>
                        <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" onkeypress="handle" aria-label="Kata kunci pencarian" />
                        <button type="submit" aria-label="Cari">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav" role="menubar">
                      <li class="scroll-to-section" role="none">
                        <a href="#top" class="active" role="menuitem" aria-current="page">Home</a>
                      </li>
                      <li class="scroll-to-section" role="none">
                        <a href="#services" role="menuitem">Program Dan Kelas</a>
                      </li>
                      <li class="scroll-to-section" role="none">
                        <a href="#courses" role="menuitem">Kegiatan</a>
                      </li>
                      <li class="scroll-to-section" role="none">
                        <a href="#team" role="menuitem">Pengajar</a>
                      </li>
                      <li class="scroll-to-section" role="none">
                        <a href="#about-us-section" role="menuitem">About Us</a>
                      </li>
                      <li class="scroll-to-section" role="none">
                        <a href="#contact" role="menuitem">Pendaftaran</a>
                      </li>
                  </ul>   
                    <button class="menu-trigger" 
                            aria-label="Buka menu navigasi" 
                            aria-expanded="false"
                            aria-controls="main-nav"
                            type="button">
                        <span>Menu</span>
                    </button>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Start ***** -->
  <main id="main-content" role="main">
    <section class="main-banner" id="top" aria-labelledby="banner-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-banner">
              <div class="item item-1">
                <div class="header-text">
                  <span class="category">Program Unggulan</span>
                  <h2 id="banner-heading">Belajar Matematika Jadi Lebih Mudah dan Menyenangkan</h2>
                  <p>Dengan metode pembelajaran yang interaktif dan pengajar berpengalaman, kami membantu siswa memahami konsep matematika dengan cara yang menyenangkan.</p>
                  <div class="buttons">
                    <div class="main-button">
                      <a href="#contact">Daftar Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-2">
                <div class="header-text">
                  <span class="category">Hasil Terbaik</span>
                  <h2>Raih Prestasi Akademik Bersama Kami</h2>
                  <p>Bimbel Jadi Cerdas telah membantu ratusan siswa meningkatkan nilai dan percaya diri dalam belajar.</p>
                  <div class="buttons">
                    <div class="main-button">
                      <a href="#contact">Daftar Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-3">
                <div class="header-text">
                  <span class="category">Pembelajaran Fleksibel</span>
                  <h2>Pilih Jadwal yang Sesuai dengan Anda</h2>
                  <p>Tersedia kelas grup dan privat dengan jadwal fleksibel Senin-Sabtu.</p>
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
    </section>
  <!-- ***** Main Banner End ***** -->

    <!-- ***** Services Section Start ***** -->
    <section class="services section" id="services" aria-labelledby="services-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <article class="service-item">
              <div class="icon">
                <img src="<?= base_url('assets/images/service-01.png') ?>" alt="Ikon kelas matematika dengan rumus dan angka">
              </div>
              <div class="main-content">
                <h3 id="services-heading">Kelas Matematika</h3>
                <p>Membantu Siswa Siswi menjadi lebih memahami dan merasa matematika itu menyenangkan!</p>
                <div class="main-button">
                  <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
                </div>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6">
            <article class="service-item">
              <div class="icon">
                <img src="<?= base_url('assets/images/service-02.png') ?>" alt="Ikon kelas bahasa Mandarin dengan karakter hanzi">
              </div>
              <div class="main-content">
                <h3>Kelas Mandarin</h3>
                <p>Pelajari bahasa Mandarin dari dasar dengan pengajar yang berpengalaman dan metode yang mudah dipahami.</p>
                <div class="main-button">
                  <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
                </div>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6">
            <article class="service-item">
              <div class="icon">
                <img src="<?= base_url('assets/images/service-03.png') ?>" alt="Ikon kelas bahasa Inggris dengan globe dan buku">
              </div>
              <div class="main-content">
                <h3>Kelas Bahasa Inggris</h3>
                <p>Tingkatkan kemampuan berbahasa Inggris Anda dengan kurikulum yang komprehensif dan praktis.</p>
                <div class="main-button">
                  <a href="<?= site_url('daftar-kelas') ?>">Lihat Kelas</a>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** Services Section End ***** -->

    <!-- About Us Section (Enhanced with WhatsApp & Maps) -->
    <section class="section about-us" id="about-us-section" aria-labelledby="about-heading">
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
                      <i class="fab fa-whatsapp" aria-hidden="true"></i>
                      <div>
                        <span>WhatsApp</span><br>
                        <a href="https://wa.me/6285747323211" target="_blank" rel="noopener noreferrer">+62 857-4732-3211</a>
                      </div>
                    </div>
                    <div class="contact-info-item">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                      <div>
                        <span>Telepon</span><br>
                        <a href="tel:+6285747323211">+62 857-4732-3211</a>
                      </div>
                    </div>
                    <div class="contact-info-item">
                      <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                      <div>
                        <span>Alamat</span><br>
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
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Peta lokasi Bimbel Jadi Cerdas di Pekalongan"
                        aria-label="Google Maps lokasi bimbel">
                      </iframe>
                    </div>
                    <a href="https://maps.google.com/?q=JL+RA+Kartini+107+Pekalongan" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="btn btn-primary mt-3 w-100">
                      <i class="fa fa-directions mr-2" aria-hidden="true"></i> Buka di Google Maps
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
              <h6>Tentang Kami</h6>
              <h2 id="about-heading">Bimbel Jadi Cerdas</h2>
              <p>Bimbel Jadi Cerdas adalah lembaga bimbingan belajar yang berkomitmen membantu siswa meningkatkan prestasi akademik melalui metode belajar yang efektif, interaktif, dan menyenangkan.
Dengan tutor berpengalaman, materi terbaru, serta pendekatan pembelajaran yang mudah dipahami, Bimbel Jadi Cerdas hadir sebagai solusi terbaik untuk membantu siswa mencapai hasil belajar yang optimal.

Kami percaya bahwa setiap anak memiliki potensi besar. Tugas kami adalah membimbing, mengarahkan, dan mengembangkan kemampuan siswa agar menjadi pribadi yang percaya diri, berprestasi, dan tentu saja lebih cerdas setiap hari.</p>
              
              <!-- Contact Info Summary -->
              <div class="contact-info-summary mt-4">
                <div class="contact-info-item">
                  <i class="fab fa-whatsapp" aria-hidden="true"></i>
                  <div>
                    <a href="https://wa.me/6285747323211" target="_blank" rel="noopener noreferrer">+62 857-4732-3211</a>
                    <small class="d-block text-muted">Klik untuk chat WhatsApp</small>
                  </div>
                </div>
                <div class="contact-info-item">
                  <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                  <div>
                    <span>JL. RA Kartini 107, Pekalongan</span>
                    <small class="d-block text-muted">Lihat peta untuk petunjuk arah</small>
                  </div>
                </div>
              </div>

              <div class="main-button mt-4">
                <a href="https://wa.me/6285747323211" target="_blank" rel="noopener noreferrer">
                  <i class="fab fa-whatsapp" aria-hidden="true"></i> Hubungi Kami
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About Us Section End -->

    <!-- ***** Courses Section Start ***** -->
    <section class="section courses" id="courses" aria-labelledby="courses-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-heading">
              <h6>Kegiatan Belajar</h6>
              <h2 id="courses-heading">Aktivitas dan Kegiatan Kami</h2>
            </div>
          </div>
        </div>
        <ul class="event_filter" role="tablist" aria-label="Filter kegiatan">
          <li role="presentation">
            <a class="is_active" href="#!" data-filter="*" role="tab" aria-selected="true">Semua Kegiatan</a>
          </li>
          <li role="presentation">
            <a href="#!" data-filter=".matematika" role="tab" aria-selected="false">Matematika</a>
          </li>
          <li role="presentation">
            <a href="#!" data-filter=".bahasa" role="tab" aria-selected="false">Bahasa</a>
          </li>
          <li role="presentation">
            <a href="#!" data-filter=".privat" role="tab" aria-selected="false">Kelas Privat</a>
          </li>
        </ul>
        <div class="row event_box">
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/kelas-inggris.jpg') ?>" alt="Kelas bahasa Inggris dengan siswa aktif belajar">
                </a>
                <span class="category">Bahasa Inggris</span>
                <span class="price"><h6>SD-SMA</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Conversation & Grammar</span>
                <h4>Kelas Bahasa Inggris</h4>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 matematika">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/kelas-matematika.jpg') ?>" alt="Kelas matematika dengan papan tulis">
                </a>
                <span class="category">Matematika</span>
                <span class="price"><h6>SD-SMA</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Kelas Grup & Privat</span>
                <h4>Pembelajaran Matematika</h4>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/kelas-mandarin.jpg') ?>" alt="Kelas bahasa Mandarin dengan pengajar native">
                </a>
                <span class="category">Mandarin</span>
                <span class="price"><h6>Pemula-Lanjut</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Hanzi & Pinyin</span>
                <h4>Kelas Bahasa Mandarin</h4>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 bahasa privat">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/kelas-bahasainggris.jpg') ?>" alt="Kelas bahasa Inggris aktivitas speaking">
                </a>
                <span class="category">Bahasa Inggris</span>
                <span class="price"><h6>Semua Level</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Conversation</span>
                <h4>Kelas Bahasa Inggris Praktis</h4>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 matematika privat">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/mapel-01.jpg') ?>" alt="Sesi les privat matematika">
                </a>
                <span class="category">Privat</span>
                <span class="price"><h6>1-on-1</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Fleksibel</span>
                <h4>Kelas Privat Matematika</h4>
              </div>
            </article>
          </div>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 matematika bahasa privat">
            <article class="events_item">
              <div class="thumb">
                <a href="#" tabindex="-1" aria-hidden="true">
                  <img src="<?= base_url('assets/images/mapel-02.jpg') ?>" alt="Ruang kelas yang nyaman">
                </a>
                <span class="category">Fasilitas</span>
                <span class="price"><h6>Grup Kecil</h6></span>
              </div>
              <div class="down-content">
                <span class="author">Nyaman & Lengkap</span>
                <h4>Ruang Belajar Modern</h4>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** Courses Section End ***** -->

    <!-- ***** Fun Facts Start ***** -->
    <section class="section fun-facts" aria-label="Statistik Bimbel">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wrapper">
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="counter">
                    <h2 class="timer count-title count-number" data-to="150" data-speed="1000" aria-label="150 siswa happy">150+</h2>
                     <p class="count-text">Siswa Aktif</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="counter">
                    <h2 class="timer count-title count-number" data-to="804" data-speed="1000" aria-label="804 jam kursus">5000+</h2>
                    <p class="count-text">Jam Belajar</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="counter">
                    <h2 class="timer count-title count-number" data-to="50" data-speed="1000" aria-label="50 siswa berprestasi">95%</h2>
                    <p class="count-text">Tingkat Kepuasan</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="counter end">
                    <h2 class="timer count-title count-number" data-to="15" data-speed="1000" aria-label="15 tahun pengalaman">5+</h2>
                    <p class="count-text">Tahun Pengalaman</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** Fun Facts End ***** -->

    <!-- ***** Team Section Start ***** -->
    <section class="team section" id="team" aria-labelledby="team-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <div class="section-heading">
              <h6>Tim Pengajar</h6>
              <h2 id="team-heading">Tim Pengajar Kami</h2>
              <p>Pengajar berpengalaman dan profesional yang siap membantu Anda meraih prestasi</p>
            </div>
          </div>
          <?php 
            // Jika tidak ada data pengajar atau $pengajar kosong, tampilkan dummy data
            $dummyPengajar = [
              ['nama_pengajar' => 'Miss Shintya', 'mata_pelajaran' => 'Matematika - Grup', 'foto' => null],
              ['nama_pengajar' => 'Mr Andry', 'mata_pelajaran' => 'Bahasa Inggris - Grup', 'foto' => null],
              ['nama_pengajar' => 'Miss Dewi', 'mata_pelajaran' => 'Matematika - Privat', 'foto' => null],
              ['nama_pengajar' => 'Miss Windy', 'mata_pelajaran' => 'Bahasa Mandarin - Grup', 'foto' => null],
            ];
            
            $displayPengajar = !empty($pengajar) ? $pengajar : $dummyPengajar;
            $memberImages = ['member-01.jpg', 'member-02.jpg', 'member-03.jpg', 'member-04.jpg'];
            $index = 0;
          ?>
          <?php foreach ($displayPengajar as $p) : ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <article class="team-member">
                <div class="main-content">
                  <?php if (!empty($p['foto']) && file_exists(FCPATH . 'uploads/pengajar/' . $p['foto'])) : ?>
                    <img src="<?= base_url('uploads/pengajar/' . $p['foto']) ?>" alt="Foto pengajar <?= esc($p['nama_pengajar']) ?> - <?= esc($p['mata_pelajaran']) ?>">
                  <?php else : ?>
                    <?php 
                      // Gunakan gambar dummy yang berbeda-beda
                      $dummyImage = $memberImages[$index % count($memberImages)];
                      $index++;
                    ?>
                    <img src="<?= base_url('assets/images/' . $dummyImage) ?>" alt="Foto pengajar <?= esc($p['nama_pengajar']) ?> - <?= esc($p['mata_pelajaran']) ?>">
                  <?php endif; ?>
                  <span class="category"><?= esc($p['mata_pelajaran']) ?></span>
                  <h3><?= esc($p['nama_pengajar']) ?></h3>     
                </div>
              </article>
            </div>
          <?php endforeach; ?>
          
          <?php if (empty($pengajar)) : ?>
            <!-- Info bahwa ini adalah data dummy -->
            <div class="col-12 text-center mt-3">
              <p class="text-muted" style="font-size: 14px;">
                <i class="fa fa-info-circle" aria-hidden="true"></i> 
                Menampilkan data pengajar contoh. Data aktual akan segera diperbarui.
              </p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- ***** Team Section End ***** -->

    <!-- ***** Testimonials Section Start ***** -->
    <section class="section testimonials" aria-labelledby="testimonials-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="owl-carousel owl-testimonials">
              <article class="item">
                <p>"Belajar di Bimbel Jadi Cerdas sangat membantu saya memahami pelajaran yang sebelumnya terasa sulit. Cara pengajar menjelaskannya materinya jelas, sabar, dan mudah dipahami. Nilai saya di sekolah meningkat dan saya jadi lebih percaya diri saat ujian."</p>
                <div class="author">
                  <img src="<?= base_url('assets/images/review-siswi.jpg') ?>" alt="Foto testimoni dari Aulia, siswi bimbel">
                  <div class="author-info">
                    <span class="category">Siswi</span>
                    <h3>Aulia</h3>
                  </div>
                </div>
              </article>
              <article class="item">
                <p>"Sejak ikut Bimbel Jadi Cerdas, anak saya menjadi lebih rajin belajar dan lebih mudah memahami materi. Pengajarnya ramah dan selalu memotivasi siswa. Kami sebagai orang tua sangat puas dengan hasilnya."</p>
                <div class="author">
                  <img src="<?= base_url('assets/images/icon-bapak.jpg') ?>" alt="Foto testimoni dari Andre Susanto, orang tua siswa">
                  <div class="author-info">
                    <span class="category">Orang Tua Siswa</span>
                    <h3>Andre Susanto</h3>
                  </div>
                </div>
              </article>
              <article class="item">
                <p>"Menurut aku, Bimbel Jadi Cerdas itu tempat belajar yang enak dan nggak ngebosenin. Kakak pengajarnya ramah dan kalau nerangin pelajaran gampang dipahami. Kalau aku nggak ngerti, boleh tanya berkali-kali dan dijelasin pelan-pelan sampai paham"</p>
                <div class="author">
                  <img src="<?= base_url('assets/images/anak-smp.jpg') ?>" alt="Foto testimoni dari Kenzo, siswa SMP">
                  <div class="author-info">
                    <span class="category">Siswa</span>
                    <h3>Kenzo</h3>
                  </div>
                </div>
              </article>
            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="section-heading">
              <h6>Testimoni</h6>
              <h2 id="testimonials-heading">Bagaimana Rasanya Belajar Bersama Di Bimbel Jadi Cerdas?</h2>
              <p>Dengarkan apa kata mereka yang telah bergabung dengan kami.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** Testimonials Section End ***** -->

    <!-- ***** Events Section Start ***** -->
    <section class="section events" id="events" aria-labelledby="events-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-heading">
              <h6>Program Bimbel</h6>
              <h2 id="events-heading">Pilihan Program Kami</h2>
            </div>
          </div>
          <div class="col-lg-12 col-md-6">
            <!-- Bahasa Inggris 1 -->
          <div class="col-lg-12 col-md-6">
            <article class="item">
              <div class="row">
                <div class="col-lg-3">
                  <div class="image">
                    <img src="<?= base_url('assets/images/kelas-inggris.jpg') ?>" alt="Kelas bahasa Inggris dengan aktivitas speaking">
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
                      <a href="<?= site_url('daftar-kelas?mapel=inggris') ?>" class="btn-daftar-kelas">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
          </div>
          <!-- Matematika -->
          <div class="col-lg-12 col-md-6">
            <article class="item">
              <div class="row">
                <div class="col-lg-3">
                  <div class="image">
                    <img src="<?= base_url('assets/images/kelas-matematika.jpg') ?>" alt="Kelas matematika dengan siswa belajar di ruang kelas">
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
                      <a href="<?= site_url('daftar-kelas?mapel=matematika') ?>" class="btn-daftar-kelas">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
          </div>
          <!-- Mandarin -->
          <div class="col-lg-12 col-md-6">
            <article class="item">
              <div class="row">
                <div class="col-lg-3">
                  <div class="image">
                    <img src="<?= base_url('assets/images/kelas-mandarin.jpg') ?>" alt="Kelas bahasa Mandarin dengan pengajar native">
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul>
                    <li>
                      <span class="category">Kelas Bahasa Mandarin</span>
                      <h4>Grup/Privat</h4>
                    </li>
                    <li>
                      <span>Jumlah Pertemuan</span>
                      <h6>2x Dalam 1 Minggu</h6>
                    </li>
                    <li>
                      <span>Durasi:</span>
                      <h6>1 Jam</h6>
                    </li>
                    <li>
                      <a href="<?= site_url('daftar-kelas?mapel=mandarin') ?>" class="btn-daftar-kelas">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
          </div>
          <!-- Bahasa Inggris 2 -->
          <div class="col-lg-12 col-md-6">
            <article class="item">
              <div class="row">
                <div class="col-lg-3">
                  <div class="image">
                    <img src="<?= base_url('assets/images/kelas-bahasainggris.jpg') ?>" alt="Kelas bahasa Inggris dengan aktivitas speaking">
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
                      <a href="<?= site_url('daftar-kelas?mapel=inggris') ?>" class="btn-daftar-kelas">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- ***** Events Section End ***** -->

    <!-- Multi-Step Registration Form -->
    <section class="contact-us section" id="contact" aria-labelledby="registration-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-heading text-center">
              <h6>Pendaftaran Online</h6>
              <h2 id="registration-heading">Formulir Pendaftaran Siswa Baru</h2>
              <p>Bergabunglah bersama kami untuk mendapatkan layanan terbaik dan pengalaman belajar yang berkualitas.</p>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="form-wizard" role="form" aria-label="Formulir pendaftaran 4 langkah">
              <!-- Wizard Steps Indicator -->
              <div class="wizard-steps" role="tablist" aria-label="Langkah pendaftaran">
                <div class="wizard-step active" data-step="1" role="tab" aria-selected="true" aria-label="Langkah 1: Pilih Program" tabindex="0">
                  <div class="step-number" aria-hidden="true">1</div>
                  <div class="step-label">Program</div>
                </div>
                <div class="wizard-step" data-step="2" role="tab" aria-selected="false" aria-label="Langkah 2: Data Diri" tabindex="-1">
                  <div class="step-number" aria-hidden="true">2</div>
                  <div class="step-label">Data Diri</div>
                </div>
                <div class="wizard-step" data-step="3" role="tab" aria-selected="false" aria-label="Langkah 3: Pilih Jadwal" tabindex="-1">
                  <div class="step-number" aria-hidden="true">3</div>
                  <div class="step-label">Jadwal</div>
                </div>
                <div class="wizard-step" data-step="4" role="tab" aria-selected="false" aria-label="Langkah 4: Konfirmasi" tabindex="-1">
                  <div class="step-number" aria-hidden="true">4</div>
                  <div class="step-label">Konfirmasi</div>
                </div>
              </div>

              <!-- Wizard Form -->
              <form id="registrationForm" action="<?= site_url('pendaftaran/umum') ?>" method="post" novalidate>
                <!-- Step 1: Program -->
                <fieldset class="wizard-content active" id="step1" role="tabpanel" aria-labelledby="step1-heading">
                  <legend class="visually-hidden" id="step1-heading">Pilih Program Bimbel</legend>
                  <h3 class="mb-4" aria-hidden="true">Pilih Program Bimbel</h3>
                  <p class="text-muted mb-4" id="step1-desc">Pilih kombinasi mata pelajaran dan tipe program yang Anda inginkan.</p>
                  
                  <div class="row" role="radiogroup" aria-required="true" aria-labelledby="step1-heading" aria-describedby="step1-desc">
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="matematika-grup" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-calculator" aria-hidden="true"></i>
                        <h4>Matematika - Grup</h4>
                        <p>Belajar matematika dalam kelompok</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="matematika-privat" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h4>Matematika - Privat</h4>
                        <p>Belajar matematika privat 1-on-1</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="inggris-grup" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-language" aria-hidden="true"></i>
                        <h4>Bahasa Inggris - Grup</h4>
                        <p>Belajar bahasa Inggris dalam kelompok</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="inggris-privat" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h4>Bahasa Inggris - Privat</h4>
                        <p>Belajar bahasa Inggris privat 1-on-1</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="mandarin-grup" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-globe-asia" aria-hidden="true"></i>
                        <h4>Bahasa Mandarin - Grup</h4>
                        <p>Belajar bahasa Mandarin dalam kelompok</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="mandarin-privat" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h4>Bahasa Mandarin - Privat</h4>
                        <p>Belajar bahasa Mandarin privat 1-on-1</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="mapel-grup" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h4>Mapel - Grup</h4>
                        <p>Belajar mata pelajaran lain dalam kelompok</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="program-card" role="radio" tabindex="0" aria-checked="false" data-program="mapel-privat" onclick="selectProgram(this)" onkeydown="handleProgramKey(event, this)">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h4>Mapel - Privat</h4>
                        <p>Belajar mata pelajaran lain privat 1-on-1</p>
                      </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="program" id="selectedProgram" required aria-required="true" aria-label="Program yang dipilih">
                  <div id="program-error" class="invalid-feedback" role="alert" style="display: none;">
                    Silakan pilih program terlebih dahulu
                  </div>
                </fieldset>

                <!-- Step 2: Data Diri -->
                <fieldset class="wizard-content" id="step2" role="tabpanel" aria-labelledby="step2-heading" hidden>
                  <legend class="visually-hidden" id="step2-heading">Data Diri Pengguna</legend>
                  <h3 class="mb-4" aria-hidden="true">Data Diri Pengguna</h3>
                  <div class="row">
                    <!-- Baris 1: Nama Lengkap (full width) -->
                    <div class="col-md-12 mb-3">
                      <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required aria-required="true" autocomplete="name">
                      <div class="invalid-feedback">Nama lengkap wajib diisi</div>
                    </div>
                    
                    <!-- Baris 2: Alamat (full width) -->
                    <div class="col-md-12 mb-3">
                      <label for="alamat_rumah" class="form-label">Alamat <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <textarea name="alamat_rumah" id="alamat_rumah" class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required aria-required="true" autocomplete="street-address"></textarea>
                      <div class="invalid-feedback">Alamat wajib diisi</div>
                    </div>
                    
                    <!-- Baris 3: Tanggal Lahir & No WhatsApp -->
                    <div class="col-md-6 mb-3">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required aria-required="true" autocomplete="bday">
                      <div class="invalid-feedback">Tanggal lahir wajib diisi</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="no_wa" class="form-label">No WhatsApp <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="tel" name="no_wa" id="no_wa" class="form-control" placeholder="08xxxxxxxxxx" required aria-required="true" autocomplete="tel" pattern="[0-9]{10,13}" inputmode="numeric">
                      <div class="form-text">Contoh: 081234567890</div>
                      <div class="invalid-feedback">Nomor WhatsApp wajib diisi dengan benar</div>
                    </div>
                    
                    <!-- Baris 4: Asal Sekolah & Kelas -->
                    <div class="col-md-6 mb-3">
                      <label for="asal_sekolah" class="form-label">Asal Sekolah <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="Nama sekolah" required aria-required="true" autocomplete="organization">
                      <div class="invalid-feedback">Asal sekolah wajib diisi</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="kelas" class="form-label">Kelas <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Contoh: 6A / X IPA" required aria-required="true">
                      <div class="form-text">Masukkan kelas saat ini</div>
                      <div class="invalid-feedback">Kelas wajib diisi</div>
                    </div>
                    
                    <!-- Baris 5: Nama Orang Tua & No WA Orang Tua -->
                    <div class="col-md-6 mb-3">
                      <label for="nama_orangtua" class="form-label">Nama Orang Tua <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="text" name="nama_orangtua" id="nama_orangtua" class="form-control" placeholder="Nama orang tua" required aria-required="true" autocomplete="name">
                      <div class="invalid-feedback">Nama orang tua wajib diisi</div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="wa_orangtua" class="form-label">No WA Orang Tua <span class="text-danger" aria-label="wajib diisi">*</span></label>
                      <input type="tel" name="wa_orangtua" id="wa_orangtua" class="form-control" placeholder="08xxxxxxxxxx" required aria-required="true" autocomplete="tel" pattern="[0-9]{10,13}" inputmode="numeric">
                      <div class="form-text">Contoh: 081234567890</div>
                      <div class="invalid-feedback">Nomor WA orang tua wajib diisi dengan benar</div>
                    </div>
                  </div>
                </fieldset>

                <!-- Step 3: Jadwal -->
                <fieldset class="wizard-content" id="step3" role="tabpanel" aria-labelledby="step3-heading" hidden>
                  <legend class="visually-hidden" id="step3-heading">Pilih Jadwal Belajar</legend>
                  <h3 class="mb-4" aria-hidden="true">Pilih Jadwal Belajar</h3>
                  <p class="text-muted mb-4" id="step3-desc">Pilih hari dan jam yang sesuai dengan ketersediaan waktu Anda.</p>
                  
                  <!-- Hari Pertemuan -->
                  <div class="jadwal-section">
                    <h4><i class="fa fa-calendar" aria-hidden="true"></i> Hari Pertemuan</h4>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="hariPertama" class="form-label">Pertemuan 1 <span class="text-danger" aria-label="wajib diisi">*</span></label>
                        <select name="hari_pertama" id="hariPertama" class="form-select form-select-lg" required aria-required="true" onchange="updateJadwalPreview()">
                          <option value="">-- Pilih Hari Pertama --</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                        </select>
                        <div class="invalid-feedback">Pilih hari pertemuan pertama</div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="hariKedua" class="form-label">Pertemuan 2 <span class="text-danger" aria-label="wajib diisi">*</span></label>
                        <select name="hari_kedua" id="hariKedua" class="form-select form-select-lg" required aria-required="true" onchange="updateJadwalPreview()">
                          <option value="">-- Pilih Hari Kedua --</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                        </select>
                        <div class="invalid-feedback">Pilih hari pertemuan kedua</div>
                      </div>
                    </div>
                  </div>

                  <!-- Jam Pertemuan -->
                  <div class="jadwal-section">
                    <h4><i class="fa fa-clock" aria-hidden="true"></i> Jam Belajar</h4>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="jamBelajar" class="form-label">Pilih Jam <span class="text-danger" aria-label="wajib diisi">*</span></label>
                        <select name="jam" id="jamBelajar" class="form-select form-select-lg" required aria-required="true" onchange="updateJadwalPreview()">
                          <option value="">-- Pilih Jam --</option>
                          <option value="10:00-11:30">10:00 - 11:30</option>
                          <option value="12:00-13:30">12:00 - 13:30</option>
                          <option value="14:00-15:30">14:00 - 15:30</option>
                          <option value="16:00-17:30">16:00 - 17:30</option>
                          <option value="18:30-20:00">18:30 - 20:00</option>
                        </select>
                        <div class="invalid-feedback">Pilih jam belajar</div>
                      </div>
                    </div>
                  </div>

                  <!-- Preview Jadwal -->
                  <div class="jadwal-preview" id="jadwalPreview" style="display: none;" role="status" aria-live="polite">
                    <h5><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Jadwal yang Anda Pilih:</h5>
                    <p id="jadwalText">-</p>
                  </div>
                  
                  <input type="hidden" name="jadwal" id="selectedJadwal" required aria-required="true">
                  <div id="jadwal-error" class="alert alert-danger" role="alert" style="display: none;">
                    Hari pertama dan kedua tidak boleh sama
                  </div>
                </fieldset>

                <!-- Step 4: Konfirmasi -->
                <fieldset class="wizard-content" id="step4" role="tabpanel" aria-labelledby="step4-heading" hidden>
                  <legend class="visually-hidden" id="step4-heading">Konfirmasi Pendaftaran</legend>
                  <h3 class="mb-4" aria-hidden="true">Konfirmasi Pendaftaran</h3>
                  <p class="text-muted mb-4">Pastikan data yang Anda masukkan sudah benar sebelum mengirim.</p>
                  
                  <div class="confirmation-summary" role="region" aria-label="Ringkasan data pendaftaran">
                    <!-- Urutan sesuai alur wizard: Program -> Data Diri -> Jadwal -->
                    <div class="summary-item" style="background: #f0f7ff; border-radius: 5px; padding: 10px;">
                      <span class="summary-label"><i class="fa fa-book" style="color: #7b6ada;" aria-hidden="true"></i> Program</span>
                      <span class="summary-value" id="summaryProgram" style="color: #5a4aba; font-weight: 700;">-</span>
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
                      <span class="summary-label"><i class="fa fa-clock" style="color: #ff9800;" aria-hidden="true"></i> Jadwal</span>
                      <span class="summary-value" id="summaryJadwal" style="color: #e65100; font-weight: 700;">-</span>
                    </div>
                  </div>
                  
                  <div class="alert alert-info mt-4" role="alert">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> 
                    Dengan mengklik "Daftar Sekarang", Anda menyetujui bahwa data yang dimasukkan sudah benar.
                  </div>
                </fieldset>

                <!-- Wizard Buttons -->
                <div class="wizard-buttons">
                  <button type="button" class="btn-wizard btn-wizard-prev" id="btnPrev" onclick="prevStep()" style="visibility: hidden;">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Sebelumnya
                  </button>
                  <button type="button" class="btn-wizard btn-wizard-next" id="btnNext" onclick="nextStep()">
                    Selanjutnya <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </button>
                  <button type="submit" class="btn-wizard btn-wizard-next" id="btnSubmit" style="display: none;">
                    <i class="fa fa-check" aria-hidden="true"></i> Daftar Sekarang
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Multi-Step Registration Form End -->

  <!-- Modern Footer -->
  <footer class="main-footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <!-- Brand Column -->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="footer-brand">
            <h2 style="font-size: 24px; font-weight: 700;">Bimbel Jadi Cerdas</h2>
            <p class="footer-tagline">Membantu siswa mencapai potensi terbaik melalui pembelajaran berkualitas.</p>
            <div class="footer-social">
              <a href="https://wa.me/6285747323211" target="_blank" rel="noopener noreferrer" class="social-link whatsapp" aria-label="WhatsApp Bimbel Jadi Cerdas">
                <i class="fab fa-whatsapp" aria-hidden="true"></i>
              </a>
              <a href="#" class="social-link instagram" aria-label="Instagram Bimbel Jadi Cerdas">
                <i class="fab fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="#" class="social-link facebook" aria-label="Facebook Bimbel Jadi Cerdas">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
              </a>
              <a href="#" class="social-link youtube" aria-label="YouTube Bimbel Jadi Cerdas">
                <i class="fab fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <nav class="footer-links" aria-label="Menu navigasi footer">
            <h5>Menu</h5>
            <ul>
              <li><a href="#top"><i class="fa fa-chevron-right" aria-hidden="true"></i> Home</a></li>
              <li><a href="#services"><i class="fa fa-chevron-right" aria-hidden="true"></i> Program</a></li>
              <li><a href="#courses"><i class="fa fa-chevron-right" aria-hidden="true"></i> Kegiatan</a></li>
              <li><a href="#team"><i class="fa fa-chevron-right" aria-hidden="true"></i> Pengajar</a></li>
              <li><a href="#about-us-section"><i class="fa fa-chevron-right" aria-hidden="true"></i> About Us</a></li>
              <li><a href="#contact"><i class="fa fa-chevron-right" aria-hidden="true"></i> Daftar</a></li>
            </ul>
          </nav>
        </div>

        <!-- Programs -->
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <nav class="footer-links" aria-label="Program bimbel">
            <h5>Program Bimbel</h5>
            <ul>
              <li><a href="<?= site_url('daftar-kelas?mapel=matematika') ?>"><i class="fa fa-calculator" aria-hidden="true"></i> Matematika</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=inggris') ?>"><i class="fa fa-language" aria-hidden="true"></i> Bahasa Inggris</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=mandarin') ?>"><i class="fa fa-globe-asia" aria-hidden="true"></i> Bahasa Mandarin</a></li>
              <li><a href="<?= site_url('daftar-kelas?mapel=mapel') ?>"><i class="fa fa-book" aria-hidden="true"></i> Mapel Lainnya</a></li>
              <li><a href="<?= site_url('daftar-kelas') ?>"><i class="fa fa-users" aria-hidden="true"></i> Kelas Grup</a></li>
              <li><a href="<?= site_url('daftar-kelas') ?>"><i class="fa fa-user" aria-hidden="true"></i> Kelas Privat</a></li>
            </ul>
          </nav>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-3 col-md-6">
          <div class="footer-contact">
            <h5>Hubungi Kami</h5>
            <div class="contact-item">
              <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
              <div>
                <span>Alamat</span>
                <p>JL. RA Kartini 107<br>Pekalongan, Jawa Tengah</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fab fa-whatsapp" aria-hidden="true"></i>
              <div>
                <span>WhatsApp</span>
                <a href="https://wa.me/6285747323211" target="_blank" rel="noopener noreferrer">+62 857-4732-3211</a>
              </div>
            </div>
            <div class="contact-item">
              <i class="fa fa-clock" aria-hidden="true"></i>
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
              Made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> in Pekalongan
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

  <!-- Custom JavaScript for Accessibility, Toast, Wizard, and Form -->
  <script>
    // Toast Notification System
    function showToast(message, type = 'success', duration = 5000) {
      const container = document.getElementById('toastContainer');
      const toast = document.createElement('div');
      toast.className = `toast ${type}`;
      toast.setAttribute('role', 'status');
      toast.setAttribute('aria-live', 'polite');
      
      const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
      const title = type === 'success' ? 'Berhasil!' : 'Error!';
      
      toast.innerHTML = `
        <div class="toast-icon"><i class="fa ${icon}" aria-hidden="true"></i></div>
        <div class="toast-content">
          <div class="toast-title">${title}</div>
          <div class="toast-message">${message}</div>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()" aria-label="Tutup notifikasi">&times;</button>
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

    // Form Wizard Logic - Accessibility Enhanced
    let currentStep = 1;
    const totalSteps = 4;

    function updateWizard() {
      // Update step indicators
      document.querySelectorAll('.wizard-step').forEach((step, index) => {
        const stepNum = index + 1;
        step.classList.remove('active', 'completed');
        step.setAttribute('aria-selected', stepNum === currentStep ? 'true' : 'false');
        step.setAttribute('tabindex', stepNum === currentStep ? '0' : '-1');
        
        if (stepNum < currentStep) {
          step.classList.add('completed');
          step.querySelector('.step-number').innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
          step.setAttribute('aria-label', `Langkah ${stepNum}: ${step.querySelector('.step-label').textContent} - Selesai`);
        } else if (stepNum === currentStep) {
          step.classList.add('active');
          step.querySelector('.step-number').innerHTML = stepNum;
          step.setAttribute('aria-label', `Langkah ${stepNum}: ${step.querySelector('.step-label').textContent} - Sedang aktif`);
        } else {
          step.querySelector('.step-number').innerHTML = stepNum;
          step.setAttribute('aria-label', `Langkah ${stepNum}: ${step.querySelector('.step-label').textContent} - Belum selesai`);
        }
      });

      // Show/hide content
      document.querySelectorAll('.wizard-content').forEach((content, index) => {
        const isActive = index + 1 === currentStep;
        content.classList.toggle('active', isActive);
        content.hidden = !isActive;
        if (isActive) {
          content.removeAttribute('hidden');
          // Focus management for screen readers
          const firstFocusable = content.querySelector('input, select, textarea, button, [tabindex]:not([tabindex="-1"])');
          if (firstFocusable) {
            firstFocusable.focus();
          }
        }
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
          field.setAttribute('aria-invalid', 'true');
        } else {
          field.classList.remove('is-invalid');
          field.setAttribute('aria-invalid', 'false');
        }
      });

      // Additional validation for step 1 (program)
      if (step === 1 && !document.getElementById('selectedProgram').value) {
        document.getElementById('program-error').style.display = 'block';
        showToast('Silakan pilih program terlebih dahulu', 'error');
        return false;
      } else {
        document.getElementById('program-error').style.display = 'none';
      }

      // Additional validation for step 3 (jadwal)
      if (step === 3) {
        const hariPertama = document.getElementById('hariPertama').value;
        const hariKedua = document.getElementById('hariKedua').value;
        const jam = document.getElementById('jamBelajar').value;
        const jadwalError = document.getElementById('jadwal-error');
        
        if (!hariPertama || !hariKedua || !jam) {
          showToast('Silakan lengkapi pemilihan hari dan jam terlebih dahulu', 'error');
          return false;
        }
        
        if (hariPertama === hariKedua) {
          jadwalError.style.display = 'block';
          showToast('Hari pertama dan kedua tidak boleh sama', 'error');
          return false;
        } else {
          jadwalError.style.display = 'none';
        }
      }

      if (!valid) {
        showToast('Mohon lengkapi semua field yang wajib diisi', 'error');
      }

      return valid;
    }

    // Enhanced Program Selection with Keyboard Support
    function selectProgram(element) {
      document.querySelectorAll('.program-card').forEach(card => {
        card.classList.remove('selected');
        card.setAttribute('aria-checked', 'false');
      });
      element.classList.add('selected');
      element.setAttribute('aria-checked', 'true');
      document.getElementById('selectedProgram').value = element.dataset.program;
      document.getElementById('program-error').style.display = 'none';
    }

    function handleProgramKey(event, element) {
      if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        selectProgram(element);
      }
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
        
        // Check if same day
        if (hariPertama === hariKedua) {
          document.getElementById('jadwal-error').style.display = 'block';
        } else {
          document.getElementById('jadwal-error').style.display = 'none';
        }
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
      document.getElementById('summaryNama').textContent = document.getElementById('nama_lengkap').value || '-';
      document.getElementById('summaryAlamat').textContent = document.getElementById('alamat_rumah').value || '-';
      document.getElementById('summaryTglLahir').textContent = document.getElementById('tanggal_lahir').value || '-';
      document.getElementById('summaryNoWA').textContent = document.getElementById('no_wa').value || '-';
      document.getElementById('summarySekolah').textContent = document.getElementById('asal_sekolah').value || '-';
      document.getElementById('summaryKelas').textContent = document.getElementById('kelas').value || '-';
      document.getElementById('summaryOrtu').textContent = document.getElementById('nama_orangtua').value || '-';
      document.getElementById('summaryWaOrtu').textContent = document.getElementById('wa_orangtua').value || '-';
      
      // Jadwal
      document.getElementById('summaryJadwal').textContent = document.getElementById('selectedJadwal').value || '-';
    }

    // Form submission
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Simulate form submission
      const formData = new FormData(this);
      
      // Show loading state
      const submitBtn = document.getElementById('btnSubmit');
      submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Memproses...';
      submitBtn.disabled = true;
      submitBtn.setAttribute('aria-busy', 'true');
      
      // Simulate API call
      setTimeout(() => {
        showToast('Pendaftaran berhasil ditambahkan', 'success');
        submitBtn.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> Daftar Sekarang';
        submitBtn.disabled = false;
        submitBtn.setAttribute('aria-busy', 'false');
        
        // Reset form after success
        setTimeout(() => {
          this.reset();
          currentStep = 1;
          document.querySelectorAll('.program-card').forEach(card => {
            card.classList.remove('selected');
            card.setAttribute('aria-checked', 'false');
          });
          document.getElementById('jadwalPreview').style.display = 'none';
          updateWizard();
        }, 2000);
      }, 1500);
    });

    // Remove invalid class on input/select
    document.querySelectorAll('input, select, textarea').forEach(input => {
      input.addEventListener('input', function() {
        this.classList.remove('is-invalid');
        this.setAttribute('aria-invalid', 'false');
      });
      input.addEventListener('change', function() {
        this.classList.remove('is-invalid');
        this.setAttribute('aria-invalid', 'false');
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
