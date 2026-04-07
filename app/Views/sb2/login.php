<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login Admin Bimbel Jadi Cerdas">
    <meta name="author" content="Bimbel Jadi Cerdas">

    <title>Login - Bimbel Jadi Cerdas</title>

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

        /* Login Card */
        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
            min-height: 500px;
        }

        /* Left Side - Image */
        .login-image {
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
        .login-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        .login-image::after {
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
        .login-image .brand-logo {
            font-size: 70px;
            color: #fff;
            margin-bottom: 25px;
            z-index: 1;
            text-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .login-image h2 {
            color: #fff;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            z-index: 1;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .login-image p {
            color: rgba(255,255,255,0.95);
            font-size: 14px;
            text-align: center;
            z-index: 1;
            line-height: 1.8;
        }

        /* Right Side - Form */
        .login-form {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form .header {
            text-align: center;
            margin-bottom: 35px;
        }
        .login-form .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .login-form .header p {
            color: #666;
            font-size: 14px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 20px;
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
        }
        .password-toggle:hover {
            color: #7b6ada;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .custom-checkbox input {
            width: 18px;
            height: 18px;
            accent-color: #7b6ada;
            cursor: pointer;
        }
        .custom-checkbox label {
            font-size: 13px;
            color: #666;
            cursor: pointer;
            margin: 0;
        }
        .forgot-link {
            font-size: 13px;
            color: #7b6ada;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .forgot-link:hover {
            color: #6b5aca;
            text-decoration: underline;
        }

        /* Login Button */
        .btn-login {
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
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 106, 218, 0.5);
        }
        .btn-login:active {
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
            .login-card {
                flex-direction: column;
                max-width: 400px;
            }
            .login-image {
                padding: 30px 20px;
                min-height: 180px;
            }
            .login-image .brand-logo {
                font-size: 40px;
            }
            .login-image h2 {
                font-size: 22px;
            }
            .login-form {
                padding: 30px 25px;
            }
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

    <!-- Login Card -->
    <div class="login-card">
        <!-- Left Side -->
        <div class="login-image">
            <div class="brand-logo">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h2>Bimbel Jadi Cerdas</h2>
            <p>Platform pembelajaran terbaik<br>untuk masa depan cerah<br><br><i class="fas fa-star" style="color: #ffd700;"></i> <i class="fas fa-star" style="color: #ffd700;"></i> <i class="fas fa-star" style="color: #ffd700;"></i> <i class="fas fa-star" style="color: #ffd700;"></i> <i class="fas fa-star" style="color: #ffd700;"></i></p>
        </div>

        <!-- Right Side -->
        <div class="login-form">
            <div class="header">
                <h1>Selamat Datang!</h1>
                <p>Silakan login untuk masuk ke dashboard</p>
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

            <form action="<?= site_url('login') ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" 
                           placeholder="Username" required autofocus>
                    <i class="fas fa-user form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" 
                           id="passwordInput" placeholder="Password" required>
                    <i class="fas fa-lock form-icon"></i>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword()"></i>
                </div>

                <div class="remember-me">
                    <div class="custom-checkbox">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="<?= site_url('forgot-password') ?>" class="forgot-link">
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </button>
                <?= csrf_field() ?>
            </form>

            <div class="divider">
                <span>atau</span>
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
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
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

        // Add animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const loginCard = document.querySelector('.login-card');
            loginCard.style.opacity = '0';
            loginCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                loginCard.style.transition = 'all 0.6s ease';
                loginCard.style.opacity = '1';
                loginCard.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>

</html>
