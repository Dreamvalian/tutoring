<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::utama');
$routes->get('/login', 'Sb2::login');
$routes->get('/dashboard', 'Sb2::dashboard');
$routes->get('/daftar-mengajar', 'Sb2::daftarMengajar');
$routes->get('/tables', 'Sb2::daftarMengajar');
$routes->get('/register', 'Sb2::register');
$routes->post('/register', 'Auth::register');
$routes->get('/forgot-password', 'Sb2::forgotPassword');
$routes->post('/login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/buttons', 'Sb2::buttons');
$routes->get('/cards', 'Sb2::cards');
$routes->get('/charts', 'Sb2::charts');
$routes->get('/utilities-animation', 'Sb2::utilitiesAnimation');
$routes->get('/utilities-border', 'Sb2::utilitiesBorder');
$routes->get('/utilities-color', 'Sb2::utilitiesColor');
$routes->get('/utilities-other', 'Sb2::utilitiesOther');
$routes->get('/blank', 'Sb2::blank');
$routes->get('/page-404', 'Sb2::page404');

$routes->get('/bimbel', 'Home::utama');
$routes->post('/pendaftaran/umum', 'Home::simpanPendaftarUmum');
$routes->get('/pendaftaran', 'Pendaftaran::index');
$routes->post('/pendaftaran/simpan', 'Pendaftaran::simpan');


// Admin dashboard and actions
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/pendaftar', 'Admin::pendaftar');
$routes->get('/admin/pengajar', 'Admin::pengajar');
$routes->get('/admin/program', 'Admin::program');
$routes->post('/admin/simpanPengajar', 'Admin::simpanPengajar');
$routes->post('/admin/updatePengajar/(:num)', 'Admin::updatePengajar/$1');
$routes->get('/admin/hapusPengajar/(:num)', 'Admin::hapusPengajar/$1');
$routes->post('/admin/simpanPendaftar', 'Admin::simpanPendaftar');
$routes->post('/admin/pendaftar/simpan', 'Admin::simpanPendaftar');
$routes->post('/admin/pendaftar/update/(:num)', 'Admin::updatePendaftar/$1');
$routes->get('/admin/pendaftar/hapus/(:num)', 'Admin::hapusPendaftar/$1');
$routes->post('/admin/program/simpan', 'Admin::simpanProgram');
$routes->post('/admin/program/update/(:num)', 'Admin::updateProgram/$1');
$routes->get('/admin/program/hapus/(:num)', 'Admin::hapusProgram/$1');

// Public registration form
$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar-kelas', 'Home::daftarKelas');
