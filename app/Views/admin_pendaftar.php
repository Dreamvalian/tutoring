<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data Pendaftar</title>

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

        <li class="nav-item active">
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

        <li class="nav-item">
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
                <span class="ml-3 font-weight-bold text-primary">Data Pendaftar</span>
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
                <h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php $isEdit = isset($editPendaftar); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?= $isEdit ? 'Ubah Pendaftar' : 'Tambah Pendaftar' ?>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= $isEdit ? site_url('admin/pendaftar/update/' . $editPendaftar['id_pengguna']) : site_url('admin/pendaftar/simpan') ?>" method="POST">
                            <?php if (!$isEdit) : ?>
                                <input type="hidden" name="source" value="admin">
                            <?php endif; ?>
                            
                            <!-- Step 1: Program -->
                            <h5 class="text-primary mb-3"><i class="fas fa-book mr-2"></i>Program Bimbel</h5>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Program <span class="text-danger">*</span></label>
                                    <?php $selectedProgram = $isEdit ? $editPendaftar['id_program'] : ''; ?>
                                    <?php if (!empty($programs)) : ?>
                                        <select name="id_program" class="form-control" required>
                                            <option value="">-- Pilih Program --</option>
                                            <?php foreach ($programs as $program) : ?>
                                                <option value="<?= $program['id_program'] ?>" <?= (string) $selectedProgram === (string) $program['id_program'] ? 'selected' : '' ?>>
                                                    <?= esc($program['nama_program']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php else : ?>
                                        <div class="alert alert-warning mb-0">
                                            <i class="fas fa-exclamation-triangle mr-2"></i>
                                            Belum ada program. <a href="<?= site_url('admin/program') ?>" class="alert-link">Tambah program</a> terlebih dahulu.
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <!-- Step 2: Data Diri -->
                            <h5 class="text-primary mb-3"><i class="fas fa-user mr-2"></i>Data Diri</h5>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" required value="<?= $isEdit ? esc($editPendaftar['nama_lengkap']) : '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Alamat <span class="text-danger">*</span></label>
                                    <textarea name="alamat_rumah" class="form-control" rows="2" placeholder="Alamat lengkap" required><?= $isEdit ? esc($editPendaftar['alamat_rumah']) : '' ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required value="<?= $isEdit ? esc($editPendaftar['tanggal_lahir']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No WhatsApp <span class="text-danger">*</span></label>
                                    <input type="text" name="no_wa" class="form-control" placeholder="08xxxxxxxxxx" required value="<?= $isEdit ? esc($editPendaftar['no_wa']) : '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Asal Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal sekolah" required value="<?= $isEdit ? esc($editPendaftar['asal_sekolah']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kelas <span class="text-danger">*</span></label>
                                    <input type="text" name="kelas" class="form-control" placeholder="Contoh: 6A / X IPA" required value="<?= $isEdit ? esc($editPendaftar['kelas']) : '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Orang Tua <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_orangtua" class="form-control" placeholder="Nama orang tua" required value="<?= $isEdit ? esc($editPendaftar['nama_orangtua']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No WA Orang Tua <span class="text-danger">*</span></label>
                                    <input type="text" name="wa_orangtua" class="form-control" placeholder="08xxxxxxxxxx" required value="<?= $isEdit ? esc($editPendaftar['wa_orangtua']) : '' ?>">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">
                                <i class="fas fa-save mr-2"></i><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Pendaftar' ?>
                            </button>
                            <?php if ($isEdit) : ?>
                                <a href="<?= site_url('admin/pendaftar') ?>" class="btn btn-secondary mt-3">Batal</a>
                            <?php endif; ?>
                            <?= csrf_field() ?>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel Pendaftar</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Program</th>
                                        <th>Nama</th>
                                        <th>No WA</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pendaftar)) : ?>
                                        <?php
                                            $programMap = [];
                                            foreach ($programs as $program) {
                                                $programMap[$program['id_program']] = $program['nama_program'];
                                            }
                                        ?>
                                        <?php foreach ($pendaftar as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['id_pengguna']) ?></td>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        <?= esc($programMap[$row['id_program']] ?? ($row['id_program'] ? $row['id_program'] : 'Belum ditentukan')) ?>
                                                    </span>
                                                </td>
                                                <td><?= esc($row['nama_lengkap']) ?></td>
                                                <td><?= esc($row['no_wa']) ?></td>
                                                <td><?= esc($row['kelas']) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailPendaftar<?= $row['id_pengguna'] ?>">
                                                        Detail
                                                    </button>
                                                    <a href="<?= site_url('admin/pendaftar?edit=' . $row['id_pengguna']) ?>" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <a href="<?= site_url('admin/pendaftar/hapus/' . $row['id_pengguna']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pendaftar ini?')">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada data pendaftar.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if (!empty($pendaftar)) : ?>
                    <?php foreach ($pendaftar as $row) : ?>
                        <div class="modal fade" id="detailPendaftar<?= $row['id_pengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailPendaftarLabel<?= $row['id_pengguna'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailPendaftarLabel<?= $row['id_pengguna'] ?>">
                                            Detail Pendaftar
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="text-primary mb-3"><i class="fas fa-book mr-2"></i>Program</h6>
                                        <p><strong>Program:</strong> <?= esc($programMap[$row['id_program']] ?? ($row['id_program'] ? $row['id_program'] : 'Belum ditentukan')) ?></p>
                                        
                                        <hr class="my-3">
                                        <h6 class="text-primary mb-3"><i class="fas fa-user mr-2"></i>Data Diri</h6>
                                        <p><strong>Nama Lengkap:</strong> <?= esc($row['nama_lengkap']) ?></p>
                                        <p><strong>Alamat:</strong> <?= esc($row['alamat_rumah']) ?></p>
                                        <p><strong>Tanggal Lahir:</strong> <?= esc($row['tanggal_lahir']) ?></p>
                                        <p><strong>No WhatsApp:</strong> <?= esc($row['no_wa']) ?></p>
                                        <p><strong>Asal Sekolah:</strong> <?= esc($row['asal_sekolah']) ?></p>
                                        <p><strong>Kelas:</strong> <?= esc($row['kelas']) ?></p>
                                        <p><strong>Nama Orang Tua:</strong> <?= esc($row['nama_orangtua']) ?></p>
                                        <p><strong>No WA Orang Tua:</strong> <?= esc($row['wa_orangtua']) ?></p>
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
            { "orderable": false, "targets": [5] } // Aksi column not sortable
        ],
        "language": {
            "emptyTable": "Tidak ada data pendaftar",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ pendaftar",
            "search": "Cari:"
        }
    });
});
</script>

</body>
</html>
