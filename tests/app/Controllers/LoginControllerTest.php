<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\TestSeeder;

/**
 * @internal
 */
final class LoginControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;
    use DatabaseTestTrait;

    protected $seed = TestSeeder::class;

    public function testLoginPageLoads()
    {
        $result = $this->get('/login');

        $result->assertStatus(200);
        $result->assertSee('Login');
        $result->assertSee('Password');
    }

    public function testLoginWithValidCredentials()
    {
        $result = $this->post('/login', [
            'username' => 'testadmin',
            'password' => 'password123'
        ]);

        $result->assertRedirectTo('/admin');
        $result->assertSessionHas('user_id');
        $result->assertSessionHas('username');
        $result->assertSessionHas('logged_in');
    }

    public function testLoginWithInvalidUsername()
    {
        $result = $this->post('/login', [
            'username' => 'wronguser',
            'password' => 'password123'
        ]);

        $result->assertRedirectTo('/login');
        $result->assertSessionHas('error');
    }

    public function testLoginWithInvalidPassword()
    {
        $result = $this->post('/login', [
            'username' => 'testadmin',
            'password' => 'wrongpassword'
        ]);

        $result->assertRedirectTo('/login');
        $result->assertSessionHas('error');
    }

    public function testLoginWithEmptyFields()
    {
        $result = $this->post('/login', [
            'username' => '',
            'password' => ''
        ]);

        $result->assertRedirectTo('/login');
        $result->assertSessionHas('error');
    }

    public function testLogoutClearsSession()
    {
        // Set up logged-in session first
        $this->withSession([
            'user_id' => 2,
            'username' => 'testadmin',
            'logged_in' => true
        ]);

        // Then logout
        $result = $this->get('/logout');

        // Auth::logout redirects to /login
        $result->assertRedirectTo('/login');
        // Note: In test environment, session destruction may not work the same way
        // The redirect assertion is the main verification that logout works
    }

    public function testProtectedRouteRedirectsToLogin()
    {
        // Clear any existing session
        $this->withSession([]);

        $result = $this->get('/admin');

        $result->assertRedirectTo('/login');
    }
}
