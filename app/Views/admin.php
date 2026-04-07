<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard Admin Bimbel Jadi Cerdas</title>

    <!-- Fonts -->
    <link href="<?= base_url('sb2/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="<?= base_url('sb2/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">

    <!-- SIDEBAR -->
    <!-- SIDEBAR -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- BRAND -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Bimbel</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- DASHBOARD -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('admin') ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- DATA PENDAFTAR -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pendaftar') ?>">
            <i class="fas fa-users"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <!-- DATA PENGAJAR -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pengajar') ?>">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Data Pengajar</span>
        </a>
    </li>

    <!-- DATA PROGRAM -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/program') ?>">
            <i class="fas fa-book"></i>
            <span>Data Program</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- END SIDEBAR -->

    <!-- END SIDEBAR -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <!-- TOPBAR -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">
                <span class="ml-3 font-weight-bold text-primary">
                    Dashboard Bimbel Jadi Cerdas
                </span>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                Admin, <?= esc(session('username') ?? 'User') ?>
                            </span>
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= site_url('logout') ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- CONTENT -->
            <div class="container-fluid">

                <!-- HEADING -->
                <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                <!-- CARD RINGKASAN -->
                <div class="row">

                    <!-- JUMLAH SISWA -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Siswa
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">70</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ASISTEN -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Asisten Pengajar
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- GRAFIK -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Grafik Pertumbuhan Bimbel per Tahun (2022–2026)
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="grafikTahunan"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END CONTENT -->

        </div>

        <!-- FOOTER -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>© 2025 Bimbel Jadi Cerdas</span>
                </div>
            </div>
        </footer>

    </div>
</div>

<!-- JS -->
<script src="<?= base_url('sb2/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?= base_url('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('sb2/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
<script src="<?= base_url('sb2/js/sb-admin-2.min.js')?>"></script>

<!-- CHART JS -->
<script src="<?= base_url('sb2/vendor/chart.js/Chart.min.js')?>"></script>

<script>
var ctx = document.getElementById("grafikTahunan");
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['2022','2023','2024','2025','2026'],
        datasets: [{
            label: 'Jumlah Siswa',
            data: [15, 25, 37, 54, 70],
            backgroundColor: 'rgba(78,115,223,0.15)',
            borderColor: 'rgba(78,115,223,1)',
            borderWidth: 3,
            pointRadius: 5,
            lineTension: 0.4
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: { beginAtZero: true }
            }]
        }
    }
});
</script>

</body>
</html>
