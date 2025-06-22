<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->setDefaultController('Home');
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');
$routes->get('home', 'Home::index');

// AUTH
$routes->get('auth', 'Auth::index');
$routes->get('auth/login', 'Auth::login');
$routes->get('auth/login-user', 'Auth::login');
$routes->post('auth/cek_login_user', 'Auth::cek_login_user');
$routes->get('auth/logout', 'Auth::logout');

// Login Siswa
$routes->get('auth/loginSiswa', 'Auth::loginSiswa');
$routes->post('auth/cekLoginSiswa', 'Auth::cekLoginSiswa');

// Admin
$routes->get('admin', 'Admin::index');
$routes->get('admin/setting', 'Admin::setting');
$routes->post('admin/saveSetting', 'Admin::saveSetting');

// TA (Tahun Ajaran)
$routes->get('ta', 'Ta::index');
$routes->post('ta/insertData', 'Ta::insertData');
$routes->post('ta/editData/(:num)', 'Ta::editData/$1');
$routes->get('ta/deleteData/(:num)', 'Ta::deleteData/$1');
$routes->get('ta/statusAktif/(:num)', 'Ta::statusAktif/$1');
$routes->get('ta/statusNonAktif/(:num)', 'Ta::statusNonAktif/$1');

// Pendaftaran
$routes->get('pendaftaran', 'Pendaftaran::index');
$routes->post('pendaftaran/simpan', 'Pendaftaran::simpanPendaftaran');

// Pekerjaan
$routes->get('pekerjaan', 'Pekerjaan::index');
$routes->post('pekerjaan/insertData', 'Pekerjaan::insertData');
$routes->post('pekerjaan/editData/(:num)', 'Pekerjaan::editData/$1');
$routes->get('pekerjaan/deleteData/(:num)', 'Pekerjaan::deleteData/$1');

// Pendidikan
$routes->get('pendidikan', 'Pendidikan::index');
$routes->post('pendidikan/insertData', 'Pendidikan::insertData');
$routes->post('pendidikan/editData/(:num)', 'Pendidikan::editData/$1');
$routes->get('pendidikan/deleteData/(:num)', 'Pendidikan::deleteData/$1');

// Agama
$routes->get('agama', 'Agama::index');
$routes->post('agama/insertData', 'Agama::insertData');
$routes->post('agama/editData/(:num)', 'Agama::editData/$1');
$routes->get('agama/deleteData/(:num)', 'Agama::deleteData/$1');

// Penghasilan
$routes->get('penghasilan', 'Penghasilan::index');
$routes->post('penghasilan/insertData', 'Penghasilan::insertData');
$routes->post('penghasilan/editData/(:num)', 'Penghasilan::editData/$1');
$routes->get('penghasilan/deleteData/(:num)', 'Penghasilan::deleteData/$1');

// User
$routes->get('user', 'User::index');
$routes->post('user/insertData', 'User::insertData');
$routes->post('user/editData/(:num)', 'User::editData/$1');
$routes->get('user/deleteData/(:num)', 'User::deleteData/$1');

// Login shortcut
$routes->get('/login', 'Auth::login');
$routes->get('Auth/loginSiswa', 'Auth::loginSiswa');


$routes->post('Auth/cek_login_siswa', 'Auth::cek_login_siswa');
$routes->get('Siswa', 'Siswa::index');
$routes->get('Auth/logout_siswa', 'Auth::logout_siswa');
$routes->get('baner', 'Baner::index');
$routes->post('baner/insertData', 'Baner::insertData');
$routes->post('baner/editData/(:num)', 'Baner::editData/$1');
$routes->get('baner/deleteData/(:num)', 'Baner::deleteData/$1');
$routes->get('Admin/Beranda', 'Admin::Beranda'); // ✅ aman dan konsisten
$routes->get('Admin/setting', 'Admin::setting');
$routes->post('Admin/saveBeranda', 'Admin::saveBeranda');
$routes->get('/', 'Home::index');
$routes->get('lampiran', 'Lampiran::index');











