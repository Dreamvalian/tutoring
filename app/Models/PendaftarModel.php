<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = [
        'username',
        'password',
        'nama_lengkap',
        'no_wa',
        'id_program',
        'tanggal_lahir',
        'asal_sekolah',
        'kelas',
        'nama_orangtua',
        'wa_orangtua',
        'alamat_rumah'
    ];
    protected $useTimestamps = false;
}
