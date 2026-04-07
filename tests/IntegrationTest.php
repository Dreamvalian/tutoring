<?php

namespace Tests;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * Integration Test Suite
 * Runs all major system integration tests
 * 
 * @internal
 */
final class IntegrationTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    
    protected $seed = TestSeeder::class;
    
    public function testDatabaseConnection()
    {
        $db = \Config\Database::connect();
        $this->assertTrue($db->connID !== null);
    }
    
    public function testAllTablesExist()
    {
        $tables = ['admin', 'pengajar', 'program', 'pengguna'];
        $db = \Config\Database::connect();
        
        foreach ($tables as $table) {
            $result = $db->tableExists($table);
            $this->assertTrue($result, "Table {$table} should exist");
        }
    }
    
    public function testForeignKeyConstraint()
    {
        $db = \Config\Database::connect();
        
        // Check pengajar has valid id_admin
        $pengajar = $db->table('pengajar')->get()->getResult();
        
        foreach ($pengajar as $p) {
            $admin = $db->table('admin')->where('id_admin', $p->id_admin)->get()->getRow();
            $this->assertNotNull($admin, "Pengajar {$p->nama_pengajar} should have valid admin");
        }
    }
    
    public function testProgramRelations()
    {
        $db = \Config\Database::connect();
        
        // Check pengguna with program
        $pengguna = $db->table('pengguna')->where('id_program IS NOT NULL', null, false)->get()->getResult();
        
        foreach ($pengguna as $p) {
            $program = $db->table('program')->where('id_program', $p->id_program)->get()->getRow();
            $this->assertNotNull($program, "Pengguna {$p->nama_lengkap} should have valid program");
        }
    }
    
    public function testDataIntegrity()
    {
        $pengajarModel = new \App\Models\PengajarModel();
        $programModel = new \App\Models\ProgramModel();
        $pendaftarModel = new \App\Models\PendaftarModel();
        
        // Test counts
        $this->assertGreaterThan(0, $pengajarModel->countAll());
        $this->assertGreaterThan(0, $programModel->countAll());
        $this->assertGreaterThan(0, $pendaftarModel->countAll());
    }
    
    public function testFileUploadDirectoryExists()
    {
        $uploadPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pengajar';
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        
        $this->assertDirectoryExists($uploadPath);
        $this->assertDirectoryIsWritable($uploadPath);
    }
    
    public function testEncryptionConfiguration()
    {
        $config = new \Config\Encryption();
        $this->assertNotNull($config->key);
    }
    
    public function testSessionConfiguration()
    {
        $config = new \Config\Session();
        $this->assertNotNull($config->driver);
        $this->assertNotNull($config->cookieName);
    }
    
    public function testBaseURLConfiguration()
    {
        $config = new \Config\App();
        $this->assertNotNull($config->baseURL);
        $this->assertNotEmpty($config->baseURL);
    }
    
    public function testEmailConfiguration()
    {
        $config = new \Config\Email();
        $this->assertNotNull($config->fromEmail);
        $this->assertNotNull($config->fromName);
    }
}
