<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use App\Models\PendaftarModel;
use App\Models\PengajarModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Home extends BaseController
{
    /**
     * Halaman utama / landing page
     */
    public function index(): string
    {
        $pengajarModel = new PengajarModel();
        $data['pengajar'] = $pengajarModel->orderBy('nama_pengajar', 'ASC')->findAll();
        return view('index', $data);
    }

    /**
     * Alias untuk halaman utama
     */
    public function utama(): string
    {
        return $this->index();
    }

    /**
     * Halaman daftar kelas dengan semua program
     */
    public function daftarKelas(): string
    {
        return view('daftar_kelas');
    }

    /**
     * Form pendaftaran lama (untuk backward compatibility)
     * Redirect ke halaman utama dengan anchor ke form pendaftaran
     */
    public function daftar()
    {
        $programs = (new ProgramModel())->orderBy('nama_program', 'ASC')->findAll();
        return view('daftar', ['programs' => $programs]);
    }

    /**
     * Proses penyimpanan pendaftaran dari form umum
     */
    public function simpanPendaftarUmum()
    {
        $model = new PendaftarModel();
        $noWa = $this->request->getPost('no_wa');
        $programId = $this->request->getPost('id_program');

        if (empty($programId)) {
            return redirect()->back()->with('error', 'Program wajib dipilih.');
        }

        $data = [
            'username'       => $noWa,
            'password'       => password_hash($noWa, PASSWORD_DEFAULT),
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'alamat_rumah'   => $this->request->getPost('alamat_rumah'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'no_wa'          => $noWa,
            'asal_sekolah'   => $this->request->getPost('asal_sekolah'),
            'kelas'          => $this->request->getPost('kelas'),
            'nama_orangtua'  => $this->request->getPost('nama_orangtua'),
            'wa_orangtua'    => $this->request->getPost('wa_orangtua'),
            'id_program'     => $programId,
        ];

        try {
            $model->insert($data);
        } catch (DatabaseException $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Pendaftaran berhasil ditambahkan');
    }

}
