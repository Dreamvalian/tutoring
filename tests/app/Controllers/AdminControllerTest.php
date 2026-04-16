<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class AdminControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;
    use DatabaseTestTrait;

    protected $seed = TestSeeder::class;

    protected function setUp(): void
    {
        parent::setUp();

        // Set up admin session using withSession() for proper test session handling
        $this->withSession([
            'user_id' => 2,
            'username' => 'testadmin',
            'logged_in' => true
        ]);
    }

    public function testIndexPageAccessible()
    {
        $result = $this->get('/admin');

        $result->assertStatus(200);
        $result->assertSee('Dashboard');
    }

    public function testPengajarIndexPage()
    {
        $result = $this->get('/admin/pengajar');

        $result->assertStatus(200);
        $result->assertSee('Data Pengajar');
        $result->assertSee('Miss Shintya');
    }

    public function testPendaftarIndexPage()
    {
        $result = $this->get('/admin/pendaftar');

        $result->assertStatus(200);
        $result->assertSee('Data Pendaftar');
        $result->assertSee('Aulia Test');
    }

    public function testProgramIndexPage()
    {
        $result = $this->get('/admin/program');

        $result->assertStatus(200);
        $result->assertSee('Data Program');
        $result->assertSee('Matematika - Grup');
    }

    public function testSimpanPengajarWithoutPhoto()
    {
        $result = $this->post('/admin/simpanPengajar', [
            'nama_pengajar' => 'Test Teacher HTTP',
            'mata_pelajaran' => 'Matematika - Grup',
            'email' => 'httptest@test.com',
            'no_hp' => '087788889999'
        ]);

        $result->assertRedirectTo('/admin/pengajar');
        $result->assertSessionHas('success');
    }

    public function testUpdatePengajar()
    {
        $pengajarModel = new \App\Models\PengajarModel();
        $pengajar = $pengajarModel->where('email', 'shintya@test.com')->first();

        $result = $this->post('/admin/updatePengajar/' . $pengajar['id_pengajar'], [
            'nama_pengajar' => 'Updated Via HTTP',
            'mata_pelajaran' => 'Bahasa Inggris - Grup',
            'email' => 'shintya@test.com',
            'no_hp' => '08123456789'
        ]);

        $result->assertRedirect();
        $result->assertSessionHas('success');
    }

    public function testSimpanProgram()
    {
        $result = $this->post('/admin/program/simpan', [
            'nama_program' => 'Test Program HTTP',
            'jml_pertemuan' => '2x',
            'nama_hari' => 'Selasa & Kamis',
            'waktu' => '13:00:00',
            'durasi' => '90 menit'
        ]);

        $result->assertRedirectTo('/admin/program');
        $result->assertSessionHas('success');
    }

    public function testUpdateProgram()
    {
        $programModel = new \App\Models\ProgramModel();
        $program = $programModel->where('nama_program', 'Matematika - Grup')->first();

        $result = $this->post('/admin/program/update/' . $program['id_program'], [
            'nama_program' => 'Matematika - Grup Updated',
            'jml_pertemuan' => '2x',
            'nama_hari' => 'Senin & Kamis',
            'waktu' => '16:00:00',
            'durasi' => '120 menit'
        ]);

        $result->assertRedirectTo('/admin/program');
    }

    public function testHapusPengajar()
    {
        $pengajarModel = new \App\Models\PengajarModel();
        $pengajar = $pengajarModel->where('email', 'andry@test.com')->first();

        $result = $this->get('/admin/hapusPengajar/' . $pengajar['id_pengajar']);

        $result->assertRedirect();
        $result->assertSessionHas('success');
    }

    public function testHapusProgram()
    {
        $programModel = new \App\Models\ProgramModel();
        $program = $programModel->where('nama_program', 'Matematika - Privat')->first();

        $result = $this->get('/admin/program/hapus/' . $program['id_program']);

        $result->assertRedirectTo('/admin/program');
    }
}
