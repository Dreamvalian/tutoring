<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data Pengajar</title>

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

        <li class="nav-item active">
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
                <span class="ml-3 font-weight-bold text-primary">Data Pengajar</span>
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
                <h1 class="h3 mb-4 text-gray-800">Data Pengajar</h1>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php $isEdit = isset($editPengajar); ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <?= $isEdit ? 'Ubah Pengajar' : 'Tambah Pengajar' ?>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= $isEdit ? site_url('admin/updatePengajar/' . $editPengajar['id_pengajar']) : site_url('admin/simpanPengajar') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_pengajar" class="form-control" placeholder="Nama pengajar" required value="<?= $isEdit ? esc($editPengajar['nama_pengajar']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mata Pelajaran <span class="text-danger">*</span></label>
                                    <?php $selectedProgram = $isEdit ? $editPengajar['mata_pelajaran'] : ''; ?>
                                    <select name="mata_pelajaran" class="form-control" required>
                                        <option value="">-- Pilih Program --</option>
                                        <?php foreach ($programs as $program) : ?>
                                            <option value="<?= esc($program['nama_program']) ?>" <?= $selectedProgram === $program['nama_program'] ? 'selected' : '' ?>>
                                                <?= esc($program['nama_program']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required value="<?= $isEdit ? esc($editPengajar['email']) : '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No HP <span class="text-danger">*</span></label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required value="<?= $isEdit ? esc($editPengajar['no_hp']) : '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Foto <span class="text-danger">*</span></label>
                                    <input type="file" name="foto" class="form-control-file" accept=".jpg,.jpeg,.png" <?= $isEdit ? '' : 'required' ?> onchange="previewImage(this)">
                                    <small class="text-muted">Format: JPG/PNG. Max: 5MB</small>
                                    <?php if ($isEdit && $editPengajar['foto']) : ?>
                                        <div class="mt-2">
                                            <img src="<?= base_url('uploads/pengajar/' . $editPengajar['foto']) ?>" alt="Foto Pengajar" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            <small class="d-block text-muted">Foto saat ini</small>
                                        </div>
                                    <?php endif; ?>
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i><?= $isEdit ? 'Simpan Perubahan' : 'Tambah Pengajar' ?>
                            </button>
                            <?php if ($isEdit) : ?>
                                <a href="<?= site_url('admin/pengajar') ?>" class="btn btn-secondary"><i class="fas fa-times mr-2"></i>Batal</a>
                            <?php endif; ?>
                            <?= csrf_field() ?>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel Pengajar</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pengajar)) : ?>
                                        <?php foreach ($pengajar as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['id_pengajar']) ?></td>
                                                <td>
                                                    <?php if ($row['foto']) : ?>
                                                        <img src="<?= base_url('uploads/pengajar/' . $row['foto']) ?>" alt="<?= esc($row['nama_pengajar']) ?>" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                    <?php else : ?>
                                                        <div class="text-center" style="width: 60px; height: 60px; background: #e0e0e0; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fas fa-user text-muted"></i>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= esc($row['nama_pengajar']) ?></td>
                                                <td><?= esc($row['mata_pelajaran']) ?></td>
                                                <td><?= esc($row['email']) ?></td>
                                                <td><?= esc($row['no_hp']) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailPengajar<?= $row['id_pengajar'] ?>">
                                                        Detail
                                                    </button>
                                                    <a href="<?= site_url('admin/pengajar?edit=' . $row['id_pengajar']) ?>" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <a href="<?= site_url('admin/hapusPengajar/' . $row['id_pengajar']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pengajar ini?')">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada data pengajar.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if (!empty($pengajar)) : ?>
                    <?php foreach ($pengajar as $row) : ?>
                        <div class="modal fade" id="detailPengajar<?= $row['id_pengajar'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailPengajarLabel<?= $row['id_pengajar'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailPengajarLabel<?= $row['id_pengajar'] ?>">
                                            Detail Pengajar
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center mb-3">
                                            <?php if ($row['foto']) : ?>
                                                <img src="<?= base_url('uploads/pengajar/' . $row['foto']) ?>" alt="<?= esc($row['nama_pengajar']) ?>" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            <?php else : ?>
                                                <div class="mx-auto" style="width: 150px; height: 150px; background: #e0e0e0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-user fa-4x text-muted"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <p><strong>Nama:</strong> <?= esc($row['nama_pengajar']) ?></p>
                                        <p><strong>Mata Pelajaran:</strong> <?= esc($row['mata_pelajaran']) ?></p>
                                        <p><strong>Email:</strong> <?= esc($row['email']) ?></p>
                                        <p><strong>No HP:</strong> <?= esc($row['no_hp']) ?></p>
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
            { "orderable": false, "targets": [1, 6] } // Foto and Aksi columns not sortable
        ],
        "language": {
            "emptyTable": "Tidak ada data pengajar",
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ pengajar",
            "search": "Cari:"
        }
    });
});

// Preview image before upload
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-thumbnail';
            img.style.maxWidth = '150px';
            img.style.maxHeight = '150px';
            preview.appendChild(img);

            const small = document.createElement('small');
            small.className = 'd-block text-muted mt-1';
            small.textContent = 'Preview foto baru';
            preview.appendChild(small);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</body>
</html>
