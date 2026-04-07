# Bimbel Application Testing Suite

Panduan lengkap untuk menjalankan automated testing pada aplikasi Bimbel CodeIgniter 4.

## Struktur Test

```
tests/
├── app/
│   ├── Controllers/     # Controller tests
│   │   ├── AdminControllerTest.php
│   │   ├── HomeControllerTest.php
│   │   └── LoginControllerTest.php
│   └── Models/          # Model tests
│       ├── PengajarModelTest.php
│       ├── PendaftarModelTest.php
│       └── ProgramModelTest.php
├── _support/
│   └── Database/
│       └── Seeds/
│           └── TestSeeder.php    # Database seeder untuk testing
├── IntegrationTest.php           # Integration tests
├── run-tests.php                 # PHP test runner
├── run-tests.bat                 # Windows batch test runner
├── run-phpunit.sh                # Unix shell test runner
└── TESTING_README.md            # This file
```

## Cara Menjalankan Test

### 1. Menjalankan Semua Test

**Windows:**
```bash
tests\run-tests.bat
```

atau dengan PHPUnit langsung:
```bash
vendor\bin\phpunit
```

**Linux/Mac:**
```bash
./tests/run-phpunit.sh
```

atau dengan PHPUnit langsung:
```bash
./vendor/bin/phpunit
```

### 2. Menjalankan Test Spesifik

**Model Tests Only:**
```bash
vendor\bin\phpunit --testsuite models
```

**Controller Tests Only:**
```bash
vendor\bin\phpunit --testsuite controllers
```

**Integration Tests Only:**
```bash
vendor\bin\phpunit --testsuite integration
```

### 3. Menjalankan Test Individual

```bash
vendor\bin\phpunit tests\app\Models\PengajarModelTest.php
vendor\bin\phpunit tests\app\Controllers\HomeControllerTest.php
```

## Daftar Test yang Tersedia

### Model Tests (20 test cases)

#### PengajarModelTest
- `testInsertPengajar()` - Test insert data pengajar
- `testGetAllPengajar()` - Test mengambil semua data pengajar
- `testGetPengajarById()` - Test mengambil data pengajar by ID
- `testUpdatePengajar()` - Test update data pengajar
- `testDeletePengajar()` - Test delete data pengajar
- `testPengajarHasRequiredFields()` - Test field yang wajib ada
- `testInsertPengajarWithoutFoto()` - Test insert tanpa foto

#### PendaftarModelTest
- `testInsertPendaftar()` - Test insert data pendaftar
- `testGetAllPendaftar()` - Test mengambil semua data pendaftar
- `testGetPendaftarWithProgram()` - Test join dengan tabel program
- `testUpdatePendaftar()` - Test update data pendaftar
- `testDeletePendaftar()` - Test delete data pendaftar
- `testPendaftarPasswordIsHashed()` - Test password ter-hash
- `testPendaftarHasAllRequiredFields()` - Test field yang wajib ada

#### ProgramModelTest
- `testInsertProgram()` - Test insert data program
- `testGetAllPrograms()` - Test mengambil semua data program
- `testUpdateProgram()` - Test update data program
- `testDeleteProgram()` - Test delete data program
- `testProgramHasRequiredFields()` - Test field yang wajib ada
- `testGetProgramByNama()` - Test mengambil program by nama

### Controller Tests (31 test cases)

#### AdminControllerTest
- `testIndexPageAccessible()` - Test akses halaman dashboard
- `testPengajarIndexPage()` - Test halaman data pengajar
- `testPendaftarIndexPage()` - Test halaman data pendaftar
- `testProgramIndexPage()` - Test halaman data program
- `testGetDataPengajarJson()` - Test endpoint JSON pengajar
- `testGetDataPendaftarJson()` - Test endpoint JSON pendaftar
- `testGetDataProgramJson()` - Test endpoint JSON program
- `testSimpanPengajarWithoutPhoto()` - Test simpan pengajar tanpa foto
- `testUpdatePengajar()` - Test update pengajar
- `testSimpanProgram()` - Test simpan program
- `testUpdateProgram()` - Test update program
- `testHapusPengajar()` - Test hapus pengajar
- `testHapusProgram()` - Test hapus program
- `testGetDetailPengajarJson()` - Test detail pengajar JSON
- `testGetDetailProgramJson()` - Test detail program JSON

#### HomeControllerTest
- `testIndexPageLoads()` - Test halaman utama load dengan benar
- `testIndexPageHasPrograms()` - Test program ditampilkan di landing page
- `testIndexPageHasTeachers()` - Test pengajar ditampilkan di landing page
- `testRegisterPendaftarSuccess()` - Test pendaftaran berhasil
- `testRegisterPendaftarStoresCorrectData()` - Test data tersimpan dengan benar
- `testRegisterPendaftarPasswordIsHashed()` - Test password ter-hash SHA1
- `testLandingPageContactSection()` - Test section kontak
- `testLandingPageAboutSection()` - Test section tentang kami
- `testLandingPageFooter()` - Test footer

#### LoginControllerTest
- `testLoginPageLoads()` - Test halaman login load
- `testLoginWithValidCredentials()` - Test login dengan kredensial valid
- `testLoginWithInvalidUsername()` - Test login dengan username salah
- `testLoginWithInvalidPassword()` - Test login dengan password salah
- `testLoginWithEmptyFields()` - Test login dengan field kosong
- `testLogoutClearsSession()` - Test logout menghapus session
- `testProtectedRouteRedirectsToLogin()` - Test redirect ke login jika belum login

### Integration Tests (11 test cases)

- `testDatabaseConnection()` - Test koneksi database
- `testAllTablesExist()` - Test semua tabel tersedia
- `testForeignKeyConstraint()` - Test constraint foreign key
- `testProgramRelations()` - Test relasi program
- `testDataIntegrity()` - Test integritas data
- `testFileUploadDirectoryExists()` - Test direktori upload tersedia
- `testEncryptionConfiguration()` - Test konfigurasi enkripsi
- `testSessionConfiguration()` - Test konfigurasi session
- `testBaseURLConfiguration()` - Test konfigurasi base URL
- `testEmailConfiguration()` - Test konfigurasi email

## Konfigurasi Database untuk Testing

Test menggunakan database yang sama dengan aplikasi (sesuai `.env`):

```
database.tests.hostname = localhost
database.tests.database = bimbel
database.tests.username = root
database.tests.password = 
database.tests.DBDriver = MySQLi
```

**Catatan:** Test seeder akan:
1. Menonaktifkan foreign key checks
2. Mengosongkan tabel pengguna, pengajar, program
3. Mengisi data test
4. Mengaktifkan kembali foreign key checks

## Test Seeder Data

TestSeeder akan membuat data test berikut:

### Admin
- ID: 2
- Username: testadmin
- Password: password123 (SHA1 hash)

### Program (3 program)
1. Matematika - Grup (Senin & Kamis, 15:00)
2. Matematika - Privat (Selasa & Jumat, 15:00)
3. Bahasa Inggris - Grup (Rabu & Sabtu, 10:00)

### Pengajar (2 pengajar)
1. Miss Shintya - Matematika - Grup
2. Mr Andry - Bahasa Inggris - Grup

### Pendaftar (2 pendaftar)
1. Aulia Test - Program Matematika
2. Kenzo Test - Program Bahasa Inggris

## Troubleshooting

### Error: "Unknown database 'bimbel'"
Pastikan database `bimbel` sudah dibuat di MySQL dan konfigurasi di `.env` sudah benar.

### Error: "Can't find a route for..."
Beberapa controller test memerlukan konfigurasi routing tambahan. Model tests sudah berjalan dengan baik.

### Error: "Cannot truncate a table referenced in a foreign key constraint"
TestSeeder sudah menangani ini dengan menonaktifkan foreign key checks sebelum truncate.

### Coverage Driver Warning
Warning "No code coverage driver available" tidak mempengaruhi hasil test. Untuk coverage, install Xdebug.

## Hasil Test Terakhir

**Model Tests:** ✓ 20 tests, 58 assertions - ALL PASSING

**Controller Tests:** Mixed results (beberapa test memerlukan penyesuaian environment)

**Integration Tests:** Berjalan sesuai konfigurasi database

## Menambahkan Test Baru

1. Buat file test di folder yang sesuai (`tests/app/Models/` atau `tests/app/Controllers/`)
2. Gunakan namespace yang benar
3. Extend `CIUnitTestCase`
4. Gunakan `DatabaseTestTrait` untuk test yang membutuhkan database
5. Set `$seed = TestSeeder::class` untuk mengisi data test

Contoh:
```php
<?php
namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\YourModel;
use Tests\Support\Database\Seeds\TestSeeder;

final class YourModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $seed = TestSeeder::class;
    
    public function testSomething(): void
    {
        // Your test code
    }
}
```

## Continuous Integration

Untuk CI/CD pipeline, gunakan:
```bash
vendor/bin/phpunit --testsuite models --no-coverage
```

Ini akan menjalankan model tests yang sudah stabil dan reliable.
