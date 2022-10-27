<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// home
$routes->get('/home', 'Masyarakat\Home::home');
$routes->get('/warga/home', 'Masyarakat\Home::view');

// Berita
$routes->get('/warga/berita/baca', 'Masyarakat\Berita::index');
$routes->get('/warga/berita/baca/(:num)', 'Masyarakat\Berita::read/$1');
$routes->get('/berita/index', 'Masyarakat\Berita::home');
$routes->get('/berita/add', 'Masyarakat\Berita::create');
$routes->get('/berita/edit/(:num)', 'Masyarakat\Berita::edit/$1');
$routes->post('/berita/add', 'Masyarakat\Berita::save');
$routes->post('/berita/update/(:num)', 'Masyarakat\Berita::update/$1');
$routes->get('/berita/delete/(:num)', 'Masyarakat\Berita::delete/$1');
$routes->get('/berita/detail/(:num)', 'Masyarakat\Berita::detail/$1');

// akun
$routes->get('/akun/add', 'Masyarakat\Petugas\Akun::add');
$routes->post('/akun/add', 'Masyarakat\Petugas\Akun::save');
$routes->get('/akun/index', 'Masyarakat\Petugas\Akun::index');
$routes->post('/akun/update', 'Masyarakat\Petugas\Akun::update');

// surat
$routes->get('/surat/index', 'Masyarakat\Surat::home');
$routes->get('/surat/tolak', 'Masyarakat\Surat::tolak');
$routes->get('/surat/terima', 'Masyarakat\Surat::terima');
$routes->get('/surat/verifikasi', 'Masyarakat\Surat::verifikasi');
$routes->post('/surat/verifikasi', 'Masyarakat\Surat::konfirmasi');
$routes->get('/surat/add', 'Masyarakat\Surat::create');
$routes->post('/surat/add', 'Masyarakat\Surat::save');
$routes->post('/surat/create', 'Masyarakat\Surat::store');
$routes->get('/surat/delete/(:num)', 'Masyarakat\Surat::delete/$1');
$routes->get('/surat/alasan/(:num)', 'Masyarakat\Surat::alasan/$1');

// masyarakat
$routes->get('/masyarakat/upload', 'Masyarakat\Petugas\Masyarakat::upload');
$routes->post('/masyarakat/import', 'Masyarakat\Petugas\Masyarakat::import');
$routes->post('/masyarakat/KTP', 'Masyarakat\Petugas\Masyarakat::ktp');
$routes->post('/masyarakat/KK', 'Masyarakat\Petugas\Masyarakat::kk');
$routes->get('/masyarakat/input', 'Masyarakat\Petugas\Masyarakat::input');
$routes->get('/masyarakat/index', 'Masyarakat\Petugas\Masyarakat::index');
$routes->get('/masyarakat/edit', 'Masyarakat\Petugas\Masyarakat::edit');
$routes->put('/masyarakat/KTP', 'Masyarakat\Petugas\Masyarakat::ktp_update');
$routes->put('/masyarakat/KK', 'Masyarakat\Petugas\Masyarakat::kk_update');
$routes->get('/masyarakat/delete/(:num)', 'Masyarakat\Petugas\Masyarakat::delete/$1');

// dokumen
$routes->get('/dokumen/upload', 'Masyarakat\Petugas\Dokumen::upload');
$routes->post('/dokumen/upload', 'Masyarakat\Petugas\Dokumen::save');
$routes->get('/dokumen/index', 'Masyarakat\Petugas\Dokumen::index');
$routes->get('/dokumen/delete/(:num)', 'Masyarakat\Petugas\Dokumen::delete/$1');

// index
$routes->get('/', 'Masyarakat\Home::index');
$routes->post('/', 'Masyarakat\Home::cek');

// Login
$routes->get('/petugas/login', 'Login::index');
$routes->get('/admin/login', 'Login::show');
$routes->get('/login', 'Login::display');
$routes->post('/login', 'Login::auth');


$routes->get('/logout', 'Login::logout');


// Admin
// Dashboard
$routes->get('/dashboard', 'Admin\Home::index');

// Berita
$routes->get('/admin/berita', 'Admin\Berita::index');
$routes->get('/admin/listberita', 'Admin\Berita::hallistberita');
$routes->get('/admin/buatberita', 'Admin\Berita::haladdberita');
$routes->get('/admin/usangberita', 'Admin\Berita::historyberita');

// Surat
$routes->get('/admin/surat', 'Admin\Surat::index');
$routes->get('/admin/suratpending', 'Admin\Surat::hallistsuratpending');
$routes->get('/admin/suratselesai', 'Admin\Surat::hallistsuratselesai');
$routes->get('/admin/suratditolak', 'Admin\Surat::hallistsurattolak');

// Masyarakat
$routes->get('/admin/chartmasyarakat', 'Admin\Masyarakat::halchart');
$routes->get('/admin/dokumenmasyarakat', 'Admin\Masyarakat::haldokumen');

// Print Surat
$routes->get('/admin/skck', 'Admin\Surat::pengantarskck');

// User 
$routes->get('/admin/user', 'Admin\User::hallistuser');
$routes->get('/admin/adduser', 'Admin\User::haladduser');

// Kades
$routes->get('/admin/rekapsurat', 'Admin\Surat::indexkades');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
