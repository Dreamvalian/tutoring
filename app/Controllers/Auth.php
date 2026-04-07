<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function prosesLogin(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $adminModel = new AdminModel();
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        if ($username === '' || $password === '') {
            $session->setFlashdata('error', 'Username dan password wajib diisi.');
            return redirect()->to('/login');
        }

        $data = $adminModel->where('username', $username)->first();
        if ($data && isset($data['password'])) {
            if (password_verify($password, $data['password'])) {
                $session->regenerate();
                $session->set([
                    'user_id' => $data['id_admin'],
                    'username' => $data['username'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/admin');
            }
        }

        $session->setFlashdata('error', 'Username atau password salah.');
        return redirect()->to('/login');
    }

    public function register(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $adminModel = new AdminModel();

        $secret = getenv('ADMIN_REGISTER_SECRET');
        $inputSecret = (string) $this->request->getPost('register_secret');
        if (!$secret) {
            $session->setFlashdata('error', 'ADMIN_REGISTER_SECRET belum diset di .env.');
            return redirect()->to('/register');
        }
        if ($inputSecret !== $secret) {
            $session->setFlashdata('error', 'Kode admin salah.');
            return redirect()->to('/register');
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');
        $passwordConfirm = (string) $this->request->getPost('password_confirm');

        if ($username === '' || $password === '' || $passwordConfirm === '') {
            $session->setFlashdata('error', 'Username dan password wajib diisi.');
            return redirect()->to('/register');
        }

        if ($password !== $passwordConfirm) {
            $session->setFlashdata('error', 'Konfirmasi password tidak sama.');
            return redirect()->to('/register');
        }

        $existing = $adminModel->where('username', $username)->first();
        if ($existing) {
            $session->setFlashdata('error', 'Username sudah terdaftar.');
            return redirect()->to('/register');
        }

        $adminModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        $session->setFlashdata('success', 'Registrasi admin berhasil, silakan login.');
        return redirect()->to('/login');
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
