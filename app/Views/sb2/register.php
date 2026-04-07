<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Register Admin Bimbel Jadi Cerdas">
    <meta name="author" content="Bimbel Jadi Cerdas">

    <title>Register - Bimbel Jadi Cerdas</title>

    <!-- Custom fonts -->
    <link href="<?= base_url('sb2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?= base_url('sb2/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .bg-animation .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }
        .circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        .circle:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            left: 80%;
            animation-delay: 2s;
        }
        .circle:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 40%;
            left: 80%;
            animation-delay: 4s;
        }
        .circle:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 20%;
            animation-delay: 6s;
        }
        .circle:nth-child(5) {
            width: 50px;
            height: 50px;
            top: 20%;
            left: 70%;
            animation-delay: 8s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.6;
            }
        }

        /* Register Card */
        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
            min-height: 550px;
        }

        /* Left Side - Image */
        .register-image {
            flex: 1;
            background: linear-gradient(135deg, rgba(123, 106, 218, 0.95) 0%, rgba(107, 90, 202, 0.95) 100%),
                        url('<?= base_url('assets/images/banner-bg.jpg') ?>') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        .register-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        .register-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></svg>');
            background-size: 30px 30px;
            opacity: 0.3;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .register-image .brand-logo {
            font-size: 70px;
            color: #fff;
            margin-bottom: 25px;
            z-index: 1;
            text-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .register-image h2 {
            color: #fff;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            z-index: 1;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .register-image p {
            color: rgba(255,255,255,0.95);
            font-size: 14px;
            text-align: center;
            z-index: 1;
            line-height: 1.8;
        }

        /* Right Side - Form */
        .register-form {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            max-height: 90vh;
        }
        .register-form .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-form .header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .register-form .header p {
            color: #666;
            font-size: 14px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 18px;
            position: relative;
        }
        .form-control {
            height: 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 10px 15px 10px 45px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        .form-control:focus {
            border-color: #7b6ada;
            box-shadow: 0 0 0 4px rgba(123, 106, 218, 0.1);
            background: #fff;
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        .form-control:focus + .form-icon {
            color: #7b6ada;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
            z-index: 10;
        }
        .password-toggle:hover {
            color: #7b6ada;
        }

        /* Password Strength */
        .password-strength {
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
            display: none;
        }
        .password-strength.show {
            display: block;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        .password-strength-bar.weak {
            width: 33%;
            background: #dc3545;
        }
        .password-strength-bar.medium {
            width: 66%;
            background: #ffc107;
        }
        .password-strength-bar.strong {
            width: 100%;
            background: #28a745;
        }
        .password-strength-text {
            font-size: 11px;
            margin-top: 5px;
            text-align: right;
        }

        /* Register Button */
        .btn-register {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #7b6ada 0%, #9b8ae5 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(123, 106, 218, 0.4);
            margin-top: 10px;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 106, 218, 0.5);
        }
        .btn-register:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #999;
            font-size: 12px;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
        }
        .divider span {
            padding: 0 15px;
        }

        /* Links */
        .auth-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
        }
        .auth-links a {
            color: #7b6ada;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .auth-links a:hover {
            color: #6b5aca;
            text-decoration: underline;
        }

        /* Back to Home */
        .back-home {
            text-align: center;
            margin-top: 20px;
        }
        .back-home a {
            color: #666;
            font-size: 13px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }
        .back-home a:hover {
            color: #7b6ada;
        }

        /* Alert */
        .alert {
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 13px;
            margin-bottom: 20px;
            border: none;
        }
        .alert-danger {
            background: #ffe6e6;
            color: #dc3545;
        }
        .alert-success {
            background: #e6f7e6;
            color: #28a745;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-card {
                flex-direction: column;
                max-width: 400px;
            }
            .register-image {
                padding: 30px 20px;
                min-height: 180px;
            }
            .register-image .brand-logo {
                font-size: 40px;
            }
            .register-image h2 {
                font-size: 22px;
            }
            .register-form {
                padding: 30px 25px;
                max-height: none;
            }
        }

        /* Scrollbar for form */
        .register-form::-webkit-scrollbar {
            width: 6px;
        }
        .register-form::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .register-form::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        .register-form::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Register Card -->
    <div class="register-card">
        <!-- Left Side -->
        <div class="register-image">
            <div class="brand-logo">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2>Buat Akun Baru</h2>
            <p>Daftar sebagai admin<br>Bimbel Jadi Cerdas<br><br><i class="fas fa-shield-alt" style="color: #ffd700;"></i> Akses Panel Admin</p>
        </div>

        <!-- Right Side -->
        <div class="register-form">
            <div class="header">
                <h1>Register Admin</h1>
                <p>Isi form di bawah untuk membuat akun</p>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('register') ?>" method="POST" id="registerForm">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" 
                           placeholder="Username" required autofocus>
                    <i class="fas fa-user form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="register_secret" class="form-control" 
                           placeholder="Kode Admin" required>
                    <i class="fas fa-key form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" 
                           id="passwordInput" placeholder="Password" required oninput="checkPasswordStrength()">
                    <i class="fas fa-lock form-icon"></i>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('passwordInput')"></i>
                </div>

                <div class="password-strength" id="passwordStrength">
                    <div class="password-strength-bar" id="strengthBar"></div>
                </div>
                <div class="password-strength-text" id="strengthText"></div>

                <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control" 
                           id="confirmPasswordInput" placeholder="Konfirmasi Password" required>
                    <i class="fas fa-lock form-icon"></i>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('confirmPasswordInput')"></i>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus mr-2"></i> Register Account
                </button>
                <?= csrf_field() ?>
            </form>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="auth-links">
                <a href="<?= site_url('login') ?>">
                    <i class="fas fa-sign-in-alt"></i> Sudah punya akun?
                </a>
                <a href="<?= site_url('forgot-password') ?>">
                    Lupa password?
                </a>
            </div>

            <div class="back-home">
                <a href="<?= site_url('/') ?>">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('sb2/vendor/jquery/jquery.min.js') ?>"></script>
    <script>
        // Toggle Password Visibility
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = event.target;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Check Password Strength
        function checkPasswordStrength() {
            const password = document.getElementById('passwordInput').value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            const strengthContainer = document.getElementById('passwordStrength');

            if (password.length === 0) {
                strengthContainer.classList.remove('show');
                strengthText.textContent = '';
                return;
            }

            strengthContainer.classList.add('show');

            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthBar.className = 'password-strength-bar';
            
            if (strength <= 1) {
                strengthBar.classList.add('weak');
                strengthText.textContent = 'Lemah';
                strengthText.style.color = '#dc3545';
            } else if (strength === 2) {
                strengthBar.classList.add('medium');
                strengthText.textContent = 'Sedang';
                strengthText.style.color = '#ffc107';
            } else {
                strengthBar.classList.add('strong');
                strengthText.textContent = 'Kuat';
                strengthText.style.color = '#28a745';
            }
        }

        // Form Validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('passwordInput').value;
            const confirmPassword = document.getElementById('confirmPasswordInput').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return false;
            }
        });

        // Add animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const registerCard = document.querySelector('.register-card');
            registerCard.style.opacity = '0';
            registerCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                registerCard.style.transition = 'all 0.6s ease';
                registerCard.style.opacity = '1';
                registerCard.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>

</html>
