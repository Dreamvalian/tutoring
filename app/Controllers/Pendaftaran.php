<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\ProgramModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $programModel = new ProgramModel();

        $data = [
            'program' => $programModel->findAll()
        ];

        return view('pendaftaran/index', $data);
    }

    public function simpan()
    {
        $penggunaModel = new PenggunaModel();

        $penggunaModel->insert([
            'username'       => $this->request->getPost('username'),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'no_wa'          => $this->request->getPost('no_wa'),
            'id_program'     => $this->request->getPost('id_program'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'asal_sekolah'   => $this->request->getPost('asal_sekolah'),
            'kelas'          => $this->request->getPost('kelas'),
            'nama_orangtua'  => $this->request->getPost('nama_orangtua'),
            'wa_orangtua'    => $this->request->getPost('wa_orangtua'),
            'alamat_rumah'   => $this->request->getPost('alamat_rumah'),
        ]);

        return redirect()->to('/pendaftaran')->with('success', 'Pendaftaran berhasil!');
    }
}
