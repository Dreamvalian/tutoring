<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class HomeControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;
    use DatabaseTestTrait;

    protected $seed = TestSeeder::class;

    public function testIndexPageLoads()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Bimbel Jadi Cerdas');
    }

    public function testIndexPageHasPrograms()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Matematika');
        $result->assertSee('Bahasa Inggris');
    }

    public function testIndexPageHasTeachers()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Pengajar');
    }

    public function testRegisterPendaftarSuccess()
    {
        $data = [
            'nama_lengkap' => 'Test Registration',
            'alamat_rumah' => 'Jl. Test Registrasi No. 99',
            'tanggal_lahir' => '2007-08-25',
            'no_wa' => '085555556601',
            'asal_sekolah' => 'SMA Registrasi',
            'kelas' => 'XI IPA',
            'nama_orangtua' => 'Ortu Registrasi',
            'wa_orangtua' => '089999998801'
        ];

        $result = $this->post('/pendaftaran/umum', $data);

        $result->assertRedirect();
        $result->assertSessionHas('success');
    }

    public function testRegisterPendaftarStoresCorrectData()
    {
        $noWa = '087654321001';
        $data = [
            'nama_lengkap' => 'Data Verification Test',
            'alamat_rumah' => 'Jl. Verify No. 123',
            'tanggal_lahir' => '2009-05-10',
            'no_wa' => $noWa,
            'asal_sekolah' => 'SMA Verify',
            'kelas' => 'X',
            'nama_orangtua' => 'Ortu Verify',
            'wa_orangtua' => '081111112202'
        ];

        $result = $this->post('/pendaftaran/umum', $data);

        $result->assertRedirect();
        $result->assertSessionHas('success');

        // Verify in database
        $this->seeInDatabase('pengguna', [
            'no_wa' => $noWa,
            'nama_lengkap' => 'Data Verification Test',
            'username' => $noWa
        ]);
    }

    public function testRegisterPendaftarPasswordIsHashed()
    {
        $noWa = '088888877701';
        $data = [
            'nama_lengkap' => 'Password Test',
            'alamat_rumah' => 'Jl. Password Test',
            'tanggal_lahir' => '2008-01-01',
            'no_wa' => $noWa,
            'asal_sekolah' => 'SMA Password',
            'kelas' => 'IX',
            'nama_orangtua' => 'Ortu Password',
            'wa_orangtua' => '082222221101'
        ];

        $result = $this->post('/pendaftaran/umum', $data);
        $result->assertSessionHas('success');

        $db = \Config\Database::connect();
        $row = $db->table('pengguna')->where('no_wa', $noWa)->get()->getRow();

        $this->assertEquals(sha1($noWa), $row->password);
    }

    public function testLandingPageContactSection()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Hubungi Kami');
        $result->assertSee('WhatsApp');
    }

    public function testLandingPageAboutSection()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('About Us');
    }

    public function testLandingPageFooter()
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('JL. RA Kartini');
    }
}
