<?php

namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\ProgramModel;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class ProgramModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    
    protected $seed = TestSeeder::class;
    
    protected ProgramModel $model;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new ProgramModel();
    }
    
    public function testInsertProgram()
    {
        $data = [
            'nama_program' => 'Bahasa Mandarin - Grup',
            'jml_pertemuan' => '2x',
            'nama_hari' => 'Senin & Rabu',
            'waktu' => '09:00:00',
            'durasi' => '60 menit',
            'id_admin' => 2
        ];
        
        $id = $this->model->insert($data);
        
        $this->assertNotFalse($id);
        $this->seeInDatabase('program', ['nama_program' => 'Bahasa Mandarin - Grup']);
    }
    
    public function testGetAllPrograms()
    {
        $result = $this->model->findAll();
        
        $this->assertIsArray($result);
        $this->assertCount(3, $result);
    }
    
    public function testUpdateProgram()
    {
        $program = $this->model->where('nama_program', 'Matematika - Grup')->first();
        
        $updateData = [
            'waktu' => '16:00:00',
            'durasi' => '120 menit'
        ];
        
        $result = $this->model->update($program['id_program'], $updateData);
        
        $this->assertTrue($result);
        $this->seeInDatabase('program', [
            'nama_program' => 'Matematika - Grup',
            'waktu' => '16:00:00'
        ]);
    }
    
    public function testDeleteProgram()
    {
        $program = $this->model->where('nama_program', 'Bahasa Inggris - Grup')->first();
        
        $result = $this->model->delete($program['id_program']);
        
        $this->assertTrue($result);
        $this->dontSeeInDatabase('program', ['nama_program' => 'Bahasa Inggris - Grup']);
    }
    
    public function testProgramHasRequiredFields()
    {
        $result = $this->model->find(1);
        
        $requiredFields = ['nama_program', 'jml_pertemuan', 'nama_hari', 'waktu', 'durasi', 'id_admin'];
        
        foreach ($requiredFields as $field) {
            $this->assertArrayHasKey($field, $result);
        }
    }
    
    public function testGetProgramByNama()
    {
        $result = $this->model->where('nama_program', 'Matematika - Grup')->first();
        
        $this->assertNotNull($result);
        $this->assertEquals('Senin & Kamis', $result['nama_hari']);
        $this->assertEquals('15:00:00', $result['waktu']);
    }
}
