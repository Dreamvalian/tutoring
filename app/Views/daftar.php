<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Bimbel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        .card {
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: none;
        }
        .form-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .form-section h5 {
            color: #7b6ada;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .form-section h5 i {
            margin-right: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #7b6ada 0%, #9b8ae5 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 106, 218, 0.4);
        }
    </style>
</head>
<body>

<div class="container" style="max-width: 600px;">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Form Pendaftaran Bimbel</h3>

        <form action="<?= site_url('admin/simpanPendaftar') ?>" method="POST">
            <input type="hidden" name="source" value="public">

            <!-- Step 1: Program -->
            <div class="form-section">
                <h5><i class="fas fa-book"></i>Program Bimbel</h5>
                <?php if (!empty($programs)) : ?>
                    <div class="mb-3">
                        <label class="form-label">Pilih Program <span class="text-danger">*</span></label>
                        <select name="id_program" class="form-select" required>
                            <option value="">-- Pilih Program --</option>
                            <?php foreach ($programs as $program) : ?>
                                <option value="<?= $program['id_program'] ?>">
                                    <?= esc($program['nama_program']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Belum ada program tersedia. Silakan hubungi admin.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Step 2: Data Diri -->
            <div class="form-section">
                <h5><i class="fas fa-user"></i>Data Diri</h5>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat_rumah" class="form-control" rows="2" placeholder="Alamat lengkap" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" name="no_wa" class="form-control" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                        <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal sekolah" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="kelas" class="form-control" placeholder="Contoh: 6A / X IPA" required>
                    </div>
                </div>

                <div class="row">
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

            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-paper-plane mr-2"></i>Daftar Sekarang
            </button>
            <?= csrf_field() ?>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</body>
</html>
