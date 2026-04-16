<?php

namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\PendaftarModel;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class PendaftarModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    
    protected $seed = TestSeeder::class;
    
    protected PendaftarModel $model;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new PendaftarModel();
    }
    
    public function testInsertPendaftar()
    {
        $data = [
            'username' => '08155555555',
            'password' => password_hash('08155555555', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Test Pendaftar Baru',
            'no_wa' => '08155555555',
            'id_program' => 2,
            'tanggal_lahir' => '2006-03-15',
            'asal_sekolah' => 'SMA Test Baru',
            'kelas' => 'XII IPS',
            'nama_orangtua' => 'Orang Tua Test',
            'wa_orangtua' => '08266666666',
            'alamat_rumah' => 'Jl. Test Baru No. 789'
        ];
        
        $id = $this->model->insert($data);
        
        $this->assertNotFalse($id);
        $this->seeInDatabase('pengguna', ['no_wa' => '08155555555']);
    }
    
    public function testGetAllPendaftar()
    {
        $result = $this->model->findAll();
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }
    
    public function testGetPendaftarWithProgram()
    {
        $result = $this->model->select('pengguna.*, program.nama_program')
            ->join('program', 'program.id_program = pengguna.id_program', 'left')
            ->findAll();
        
        $this->assertIsArray($result);
        foreach ($result as $row) {
            $this->assertArrayHasKey('nama_program', $row);
        }
    }
    
    public function testUpdatePendaftar()
    {
        $pendaftar = $this->model->where('no_wa', '08111111111')->first();
        
        $updateData = [
            'nama_lengkap' => 'Aulia Test Updated',
            'kelas' => 'XII IPA'
        ];
        
        $result = $this->model->update($pendaftar['id_pengguna'], $updateData);
        
        $this->assertTrue($result);
        $this->seeInDatabase('pengguna', [
            'no_wa' => '08111111111',
            'nama_lengkap' => 'Aulia Test Updated'
        ]);
    }
    
    public function testDeletePendaftar()
    {
        $pendaftar = $this->model->where('no_wa', '08333333333')->first();
        
        $result = $this->model->delete($pendaftar['id_pengguna']);
        
        $this->assertTrue($result);
        $this->dontSeeInDatabase('pengguna', ['no_wa' => '08333333333']);
    }
    
    public function testPendaftarPasswordIsHashed()
    {
        $noWa = '08777777777';
        $data = [
            'username' => $noWa,
            'password' => password_hash($noWa, PASSWORD_DEFAULT),
            'nama_lengkap' => 'Test Password',
            'no_wa' => $noWa
        ];
        
        $id = $this->model->insert($data);
        $result = $this->model->find($id);
        
        $this->assertTrue(password_verify($noWa, $result['password']));
    }
    
    public function testPendaftarHasAllRequiredFields()
    {
        $result = $this->model->find(1);
        
        $requiredFields = [
            'username', 'password', 'nama_lengkap', 'no_wa', 
            'id_program', 'tanggal_lahir', 'asal_sekolah', 
            'kelas', 'nama_orangtua', 'wa_orangtua', 'alamat_rumah'
        ];
        
        foreach ($requiredFields as $field) {
            $this->assertArrayHasKey($field, $result);
        }
    }
}
