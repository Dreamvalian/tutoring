<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        
        // Clear existing data in correct order (child tables first)
        $this->db->table('pengguna')->truncate();
        $this->db->table('pengajar')->truncate();
        $this->db->table('program')->truncate();
        
        // Insert test admin
        $this->db->table('admin')->truncate();
        $this->db->table('admin')->insert([
            'id_admin' => 2,
            'username' => 'testadmin',
            'password' => sha1('password123')
        ]);
        
        // Insert test programs
        $programs = [
            [
                'id_program' => 1,
                'nama_program' => 'Matematika - Grup',
                'jml_pertemuan' => '2x',
                'nama_hari' => 'Senin & Kamis',
                'waktu' => '15:00:00',
                'durasi' => '90 menit',
                'id_admin' => 2
            ],
            [
                'id_program' => 2,
                'nama_program' => 'Matematika - Privat',
                'jml_pertemuan' => '2x',
                'nama_hari' => 'Selasa & Jumat',
                'waktu' => '15:00:00',
                'durasi' => '90 menit',
                'id_admin' => 2
            ],
            [
                'id_program' => 3,
                'nama_program' => 'Bahasa Inggris - Grup',
                'jml_pertemuan' => '2x',
                'nama_hari' => 'Rabu & Sabtu',
                'waktu' => '10:00:00',
                'durasi' => '60 menit',
                'id_admin' => 2
            ]
        ];
        $this->db->table('program')->insertBatch($programs);
        
        // Insert test pengajar
        $pengajar = [
            [
                'nama_pengajar' => 'Miss Shintya',
                'mata_pelajaran' => 'Matematika - Grup',
                'id_admin' => 2,
                'email' => 'shintya@test.com',
                'no_hp' => '08123456789',
                'foto' => null
            ],
            [
                'nama_pengajar' => 'Mr Andry',
                'mata_pelajaran' => 'Bahasa Inggris - Grup',
                'id_admin' => 2,
                'email' => 'andry@test.com',
                'no_hp' => '08987654321',
                'foto' => null
            ]
        ];
        $this->db->table('pengajar')->insertBatch($pengajar);
        
        // Insert test pendaftar
        $pendaftar = [
            [
                'username' => '08111111111',
                'password' => sha1('08111111111'),
                'nama_lengkap' => 'Aulia Test',
                'no_wa' => '08111111111',
                'id_program' => 1,
                'tanggal_lahir' => '2005-01-15',
                'asal_sekolah' => 'SMA Test 1',
                'kelas' => 'XI IPA',
                'nama_orangtua' => 'Orang Tua Aulia',
                'wa_orangtua' => '08222222222',
                'alamat_rumah' => 'Jl. Test No. 123'
            ],
            [
                'username' => '08333333333',
                'password' => sha1('08333333333'),
                'nama_lengkap' => 'Kenzo Test',
                'no_wa' => '08333333333',
                'id_program' => 3,
                'tanggal_lahir' => '2008-06-20',
                'asal_sekolah' => 'SMP Test 2',
                'kelas' => 'VIII',
                'nama_orangtua' => 'Orang Tua Kenzo',
                'wa_orangtua' => '08444444444',
                'alamat_rumah' => 'Jl. Test No. 456'
            ]
        ];
        $this->db->table('pengguna')->insertBatch($pendaftar);
        
        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
