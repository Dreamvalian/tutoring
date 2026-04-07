<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data Program</title>

    <link href="<?= base_url('sb2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?= base_url('sb2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('sb2/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Bimbel</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin') ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/pendaftar') ?>">
                <i class="fas fa-users"></i>
                <span>Data Pendaftar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/pengajar') ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Data Pengajar</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('admin/program') ?>">
                <i class="fas fa-book"></i>
                <span>Data Program</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">
                <span class="ml-3 font-weight-bold text-primary">Data Program Bimbel</span>
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

            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Data Program Bimbel</h1>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php $isEdit = isset($editProgram); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?= $isEdit ? 'Ubah Program' : 'Tambah Program' ?>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= $isEdit ? site_url('admin/program/update/' . $editProgram['id_program']) : site_url('admin/program/simpan') ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Program</label>
                                    <input type="text" name="nama_program" class="form-control" placeholder="Contoh: Matematika SD" required value="<?= $isEdit ? esc($editProgram['nama_program']) : '' ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Jumlah Pertemuan</label>
                                    <input type="text" name="jml_pertemuan" class="form-control" placeholder="Contoh: 2x" required value="<?= $isEdit ? esc($editProgram['jml_pertemuan']) : '' ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Durasi</label>
                                    <input type="text" name="durasi" class="form-control" placeholder="Contoh: 90 menit" required value="<?= $isEdit ? esc($editProgram['durasi']) : '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Hari</label>
                                    <input type="text" name="nama_hari" class="form-control" placeholder="Contoh: Senin, Rabu, Jumat" required value="<?= $isEdit ? esc($editProgram['nama_hari']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Waktu</label>
                                    <input type="time" name="waktu" class="form-control" placeholder="Contoh: 16:00" required value="<?= $isEdit ? esc($editProgram['waktu']) : '' ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Program' ?>
                            </button>
                            <?php if ($isEdit) : ?>
                                <a href="<?= site_url('admin/program') ?>" class="btn btn-secondary">Batal</a>
                            <?php endif; ?>
                            <?= csrf_field() ?>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel Program</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Program</th>
                                        <th>Jumlah Pertemuan</th>
                                        <th>Nama Hari</th>
                                        <th>Waktu</th>
                                        <th>Durasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($programs)) : ?>
                                        <?php foreach ($programs as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['id_program']) ?></td>
                                                <td><?= esc($row['nama_program']) ?></td>
                                                <td><?= esc($row['jml_pertemuan']) ?></td>
                                                <td><?= esc($row['nama_hari']) ?></td>
                                                <td><?= esc($row['waktu']) ?></td>
                                                <td><?= esc($row['durasi']) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailProgram<?= $row['id_program'] ?>">
                                                        Detail
                                                    </button>
                                                    <a href="<?= site_url('admin/program?edit=' . $row['id_program']) ?>" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <a href="<?= site_url('admin/program/hapus/' . $row['id_program']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data program ini?')">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada data program.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php if (!empty($programs)) : ?>
                    <?php foreach ($programs as $row) : ?>
                        <?php
                            $pengajarList = [];
                            foreach ($pengajar as $pgj) {
                                if ((string) $pgj['mata_pelajaran'] === (string) $row['nama_program']) {
                                    $pengajarList[] = $pgj;
                                }
                            }
                            $pendaftarList = [];
                            foreach ($pendaftar as $pnd) {
                                if ((string) $pnd['id_program'] === (string) $row['id_program']) {
                                    $pendaftarList[] = $pnd;
                                }
                            }
                        ?>
                        <div class="modal fade" id="detailProgram<?= $row['id_program'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailProgramLabel<?= $row['id_program'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailProgramLabel<?= $row['id_program'] ?>">
                                            Detail Program: <?= esc($row['nama_program']) ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <strong>Jumlah Pertemuan:</strong> <?= esc($row['jml_pertemuan']) ?><br>
                                            <strong>Hari:</strong> <?= esc($row['nama_hari']) ?><br>
                                            <strong>Waktu:</strong> <?= esc($row['waktu']) ?><br>
                                            <strong>Durasi:</strong> <?= esc($row['durasi']) ?>
                                        </div>

                                        <h6 class="font-weight-bold text-primary">Pengajar</h6>
                                        <?php if (!empty($pengajarList)) : ?>
                                            <ul class="mb-3">
                                                <?php foreach ($pengajarList as $pgj) : ?>
                                                    <li><?= esc($pgj['nama_pengajar']) ?> (<?= esc($pgj['email']) ?>)</li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else : ?>
                                            <p class="text-muted">Belum ada pengajar untuk program ini.</p>
                                        <?php endif; ?>

                                        <h6 class="font-weight-bold text-primary">Pendaftar</h6>
                                        <?php if (!empty($pendaftarList)) : ?>
                                            <ul class="mb-0">
                                                <?php foreach ($pendaftarList as $pnd) : ?>
                                                    <li><?= esc($pnd['nama_lengkap']) ?> (<?= esc($pnd['no_wa']) ?>)</li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else : ?>
                                            <p class="text-muted">Belum ada pendaftar untuk program ini.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Ac 2025 Bimbel Jadi Cerdas</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="<?= base_url('sb2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('sb2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('sb2/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('sb2/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('sb2/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
$(function () {
    $('#dataTable').DataTable({
        "order": [[0, 'asc']], // Default sort by ID (column index 0)
        "columnDefs": [
            { "orderable": false, "targets": [6] } // Aksi column not sortable
        ],
        "language": {
            "emptyTable": "Tidak ada data program",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ program",
            "search": "Cari:"
        }
    });
});
</script>

</body>
</html>
