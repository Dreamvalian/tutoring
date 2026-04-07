<?php

namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\PengajarModel;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class PengajarModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    
    protected $seed = TestSeeder::class;
    
    protected PengajarModel $model;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new PengajarModel();
    }
    
    public function testInsertPengajar()
    {
        $data = [
            'nama_pengajar' => 'Miss Test Baru',
            'mata_pelajaran' => 'Matematika - Grup',
            'id_admin' => 2,
            'email' => 'testbaru@test.com',
            'no_hp' => '08555555555',
            'foto' => 'test_photo.jpg'
        ];
        
        $id = $this->model->insert($data);
        
        $this->assertNotFalse($id);
        $this->seeInDatabase('pengajar', ['email' => 'testbaru@test.com']);
    }
    
    public function testGetAllPengajar()
    {
        $result = $this->model->findAll();
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
    }
    
    public function testGetPengajarById()
    {
        $pengajar = $this->model->first();
        
        $this->assertNotNull($pengajar);
        $this->assertArrayHasKey('nama_pengajar', $pengajar);
        $this->assertArrayHasKey('email', $pengajar);
    }
    
    public function testUpdatePengajar()
    {
        $pengajar = $this->model->where('email', 'shintya@test.com')->first();
        
        $updateData = [
            'nama_pengajar' => 'Miss Shintya Updated',
            'no_hp' => '08111111111'
        ];
        
        $result = $this->model->update($pengajar['id_pengajar'], $updateData);
        
        $this->assertTrue($result);
        $this->seeInDatabase('pengajar', [
            'email' => 'shintya@test.com',
            'nama_pengajar' => 'Miss Shintya Updated'
        ]);
    }
    
    public function testDeletePengajar()
    {
        $pengajar = $this->model->where('email', 'andry@test.com')->first();
        
        $result = $this->model->delete($pengajar['id_pengajar']);
        
        $this->assertTrue($result);
        $this->dontSeeInDatabase('pengajar', ['email' => 'andry@test.com']);
    }
    
    public function testPengajarHasRequiredFields()
    {
        $result = $this->model->find(1);
        
        $requiredFields = ['nama_pengajar', 'mata_pelajaran', 'id_admin', 'email', 'no_hp'];
        
        foreach ($requiredFields as $field) {
            $this->assertArrayHasKey($field, $result);
        }
    }
    
    public function testInsertPengajarWithoutFoto()
    {
        $data = [
            'nama_pengajar' => 'Teacher Without Photo',
            'mata_pelajaran' => 'Bahasa Mandarin - Grup',
            'id_admin' => 2,
            'email' => 'nophoto@test.com',
            'no_hp' => '08666666666',
            'foto' => null
        ];
        
        $id = $this->model->insert($data);
        
        $this->assertNotFalse($id);
        $result = $this->model->find($id);
        $this->assertNull($result['foto']);
    }
}
