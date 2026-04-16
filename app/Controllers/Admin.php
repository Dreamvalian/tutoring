<?php
namespace App\Controllers;

use App\Models\PendaftarModel;
use App\Models\PengajarModel;
use App\Models\ProgramModel;

class Admin extends BaseController {
    public function index() {
        $data['pendaftar'] = (new PendaftarModel())->orderBy('id_pengguna','DESC')->findAll();
        $data['pengajar'] = (new PengajarModel())->orderBy('id_pengajar','DESC')->findAll();
        return view('admin', $data);
    }

    public function pendaftar() {
        $model = new PendaftarModel();
        $data['pendaftar'] = $model->orderBy('id_pengguna','DESC')->findAll();
        $data['programs'] = (new ProgramModel())->orderBy('nama_program', 'ASC')->findAll();

        $editId = $this->request->getGet('edit');
        if ($editId) {
            $data['editPendaftar'] = $model->find($editId);
        }

        return view('admin_pendaftar', $data);
    }

    public function pengajar() {
        $model = new PengajarModel();
        $data['pengajar'] = $model->orderBy('id_pengajar','DESC')->findAll();
        $data['programs'] = (new ProgramModel())->orderBy('nama_program', 'ASC')->findAll();

        $editId = $this->request->getGet('edit');
        if ($editId) {
            $data['editPengajar'] = $model->find($editId);
        }

        return view('admin_pengajar', $data);
    }

    public function program() {
        $model = new ProgramModel();
        $data['programs'] = $model->orderBy('id_program','DESC')->findAll();
        $data['pengajar'] = (new PengajarModel())->orderBy('nama_pengajar', 'ASC')->findAll();
        $data['pendaftar'] = (new PendaftarModel())->orderBy('nama_lengkap', 'ASC')->findAll();

        $editId = $this->request->getGet('edit');
        if ($editId) {
            $data['editProgram'] = $model->find($editId);
        }

        return view('admin_program', $data);
    }

    // Pengajar CRUD
    public function simpanPengajar()
    {
        $model = new PengajarModel();
        $adminId = (int) session()->get('user_id');

        if (!$adminId) {
            return redirect()->to('/login');
        }

        // Verify admin exists (FK constraint protection)
        $adminExists = (new \App\Models\AdminModel())->find($adminId);
        if (!$adminExists) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan. Silakan login ulang.');
        }

        // Validasi input
        $nama = $this->request->getPost('nama_pengajar');
        $mapel = $this->request->getPost('mata_pelajaran');
        $email = $this->request->getPost('email');
        $noHp = $this->request->getPost('no_hp');

        if (empty($nama) || empty($mapel) || empty($email) || empty($noHp)) {
            return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi!');
        }

        // Handle upload foto
        $fotoName = null;
        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi ukuran (max 5MB)
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file terlalu besar. Maksimal 5MB.');
            }

            // Validasi extension file
            $ext = strtolower($file->getClientExtension());
            $allowedExts = ['jpg', 'jpeg', 'png'];

            if (!in_array($ext, $allowedExts)) {
                return redirect()->back()->with('error', 'Format file tidak valid. Hanya JPG/PNG yang diizinkan.');
            }

            // Verifikasi MIME type sebenarnya dari file (bukan dari client)
            $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg'];
            $actualMime = $file->getMimeType();
            if (!in_array($actualMime, $allowedMimes)) {
                return redirect()->back()->with('error', 'File bukan gambar yang valid.');
            }

            // Buat folder jika belum ada
            $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pengajar' . DIRECTORY_SEPARATOR;
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Generate nama file unik
            $fotoName = $file->getRandomName();
            $file->move($uploadPath, $fotoName);
        }

        $data = [
            'nama_pengajar' => $nama,
            'mata_pelajaran' => $mapel,
            'id_admin' => $adminId,
            'email' => $email,
            'no_hp' => $noHp,
            'foto' => $fotoName,
        ];

        // Insert ke database
        $insertId = $model->insert($data, false);

        if ($insertId) {
            return redirect()->to('/admin/pengajar')->with('success', 'Pengajar berhasil ditambahkan.');
        } else {
            $errors = $model->errors();
            $dbError = $model->db->error();
            $errorMsg = $errors ? implode(', ', $errors) : ($dbError['message'] ?? 'Unknown error');

            // Hapus foto jika insert gagal
            if ($fotoName && is_file(FCPATH . 'uploads/pengajar/' . $fotoName)) {
                unlink(FCPATH . 'uploads/pengajar/' . $fotoName);
            }

            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data: ' . $errorMsg);
        }
    }

    public function updatePengajar($id = null) {
        $model = new PengajarModel();
        if (!$id) {
            return redirect()->to('/admin/pengajar');
        }

        $existing = $model->find($id);
        if (!$existing) {
            return redirect()->to('/admin/pengajar');
        }

        $namaPengajar = trim((string) $this->request->getPost('nama_pengajar'));
        $mataPelajaran = (string) $this->request->getPost('mata_pelajaran');
        $email = trim((string) $this->request->getPost('email'));
        $noHp = trim((string) $this->request->getPost('no_hp'));

        if ($namaPengajar === '') {
            $namaPengajar = $existing['nama_pengajar'];
        }
        if ($mataPelajaran === '') {
            $mataPelajaran = $existing['mata_pelajaran'];
        }
        if ($email === '') {
            $email = $existing['email'];
        }
        if ($noHp === '') {
            $noHp = $existing['no_hp'];
        }

        // Handle upload foto baru
        $fotoName = $existing['foto']; // Default: gunakan foto lama
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi ukuran (max 5MB)
            if ($file->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file terlalu besar. Maksimal 5MB.');
            }
            
            // Validasi extension file
            $ext = strtolower($file->getClientExtension());
            $allowedExts = ['jpg', 'jpeg', 'png'];
            if (!in_array($ext, $allowedExts)) {
                return redirect()->back()->with('error', 'Format file tidak valid. Hanya JPG/PNG yang diizinkan.');
            }
            
            // Buat folder jika belum ada
            $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pengajar' . DIRECTORY_SEPARATOR;
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Hapus foto lama jika ada
            if ($existing['foto'] && file_exists($uploadPath . $existing['foto'])) {
                unlink($uploadPath . $existing['foto']);
            }
            
            // Generate nama file unik
            $fotoName = $file->getRandomName();
            $file->move($uploadPath, $fotoName);
        }

        $result = $model->update($id, [
            'nama_pengajar' => $namaPengajar,
            'mata_pelajaran' => $mataPelajaran,
            'email' => $email,
            'no_hp' => $noHp,
            'foto' => $fotoName,
        ]);
        
        if ($result) {
            return redirect()->to('/admin/pengajar')->with('success', 'Data pengajar berhasil diperbarui');
        } else {
            $errors = $model->errors();
            $errorMsg = $errors ? implode(', ', $errors) : 'Unknown error';
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $errorMsg);
        }
    }

    public function hapusPengajar($id = null) {
        $model = new PengajarModel();
        $pengajar = $model->find($id);
        
        // Hapus foto jika ada
        if ($pengajar && $pengajar['foto']) {
            $fotoPath = FCPATH . 'uploads/pengajar/' . $pengajar['foto'];
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        
        $model->delete($id);
        return redirect()->to('/admin/pengajar')->with('success', 'Pengajar berhasil dihapus');
    }

    public function simpanProgram() {
        $model = new ProgramModel();
        $adminId = (int) session()->get('user_id');
        if (!$adminId) {
            return redirect()->to('/login');
        }

        // Verify admin exists (FK constraint protection)
        $adminExists = (new \App\Models\AdminModel())->find($adminId);
        if (!$adminExists) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan. Silakan login ulang.');
        }

        $namaProgram = $this->request->getPost('nama_program');
        if (empty($namaProgram)) {
            return redirect()->back()->with('error', 'Nama program wajib diisi.');
        }

        $model->insert([
            'nama_program'  => $namaProgram,
            'jml_pertemuan' => $this->request->getPost('jml_pertemuan'),
            'nama_hari'     => $this->request->getPost('nama_hari'),
            'waktu'         => $this->request->getPost('waktu'),
            'durasi'        => $this->request->getPost('durasi'),
            'id_admin'      => $adminId,
        ]);

        return redirect()->to('/admin/program')->with('success', 'Program berhasil ditambahkan.');
    }

    public function updateProgram($id = null) {
        $model = new ProgramModel();
        $model->update($id, [
            'nama_program' => $this->request->getPost('nama_program'),
            'jml_pertemuan' => $this->request->getPost('jml_pertemuan'),
            'nama_hari' => $this->request->getPost('nama_hari'),
            'waktu' => $this->request->getPost('waktu'),
            'durasi' => $this->request->getPost('durasi'),
        ]);

        return redirect()->to('/admin/program');
    }

    public function hapusProgram($id = null) {
        $model = new ProgramModel();
        $model->delete($id);
        return redirect()->to('/admin/program');
    }

    // Pendaftaran view: store pendaftar entries
    public function simpanPendaftar() {
        $model = new PendaftarModel();
        $nama = $this->request->getPost('nama_lengkap');
        if (!$nama) {
            $nama = $this->request->getPost('nama');
        }
        $programId = $this->request->getPost('id_program');
        if ($programId === null || $programId === '') {
            $programName = $this->request->getPost('program');
            if ($programName) {
                $program = (new ProgramModel())->where('nama_program', $programName)->first();
                if ($program) {
                    $programId = $program['id_program'];
                }
            }
        }
        if ($programId === null || $programId === '') {
            return redirect()->back()->with('error', 'Program wajib dipilih.');
        }

        $noWa = $this->request->getPost('no_wa');

        // Urutan sesuai wizard: Program -> Data Diri (Nama, Alamat, Tgl Lahir, No WA, Sekolah, Kelas, Nama Ortu, WA Ortu)
        $model->insert([
            'username'       => $noWa,
            'password'       => password_hash($noWa, PASSWORD_DEFAULT),
            'id_program'     => $programId,
            'nama_lengkap'   => $nama,
            'alamat_rumah'   => $this->request->getPost('alamat_rumah'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'no_wa'          => $noWa,
            'asal_sekolah'   => $this->request->getPost('asal_sekolah'),
            'kelas'          => $this->request->getPost('kelas'),
            'nama_orangtua'  => $this->request->getPost('nama_orangtua'),
            'wa_orangtua'    => $this->request->getPost('wa_orangtua'),
        ]);
        $source = $this->request->getPost('source');
        if ($source === 'admin') {
            return redirect()->to('/admin/pendaftar')->with('success', 'Pendaftaran berhasil ditambahkan.');
        }

        return redirect()->to('/daftar')->with('success', 'Pendaftaran berhasil!');
    }

    public function updatePendaftar($id = null) {
        $model = new PendaftarModel();
        // Urutan sesuai wizard: Program -> Data Diri (Nama, Alamat, Tgl Lahir, No WA, Sekolah, Kelas, Nama Ortu, WA Ortu)
        $model->update($id, [
            'id_program' => $this->request->getPost('id_program'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_wa' => $this->request->getPost('no_wa'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'kelas' => $this->request->getPost('kelas'),
            'nama_orangtua' => $this->request->getPost('nama_orangtua'),
            'wa_orangtua' => $this->request->getPost('wa_orangtua'),
        ]);
        return redirect()->to('/admin/pendaftar')->with('success','Data pendaftar berhasil diperbarui');
    }

    public function hapusPendaftar($id = null) {
        $model = new PendaftarModel();
        $model->delete($id);
        return redirect()->to('/admin/pendaftar');
    }
}

