<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Rute Utama & Login
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

// 2. Rute Barang (Publik) - URUTAN PENTING!

// A. Rute Spesifik (Detail & Ajuan) harus di ATAS rute Kategori
$routes->get('barang/detail/(:num)', 'Barang::detail/$1');
$routes->get('barang/ajuan/(:num)', 'Barang::ajuan/$1');   // Halaman Form
$routes->post('barang/simpan_ajuan', 'Barang::simpan_ajuan'); // Proses Simpan

// B. Baru Rute Lihat Barang per Lab (karena pakai :segment)
$routes->get('barang/(:segment)', 'Barang::index/$1');

// C. Rute Lihat Semua Barang (Default)
$routes->get('barang', 'Barang::index');


// 3. Rute Khusus Admin (Wajib Login)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    // CRUD Barang
    $routes->get('tambah', 'Barang::tambah');       
    $routes->post('simpan', 'Barang::simpan');      
    
    $routes->get('edit/(:num)', 'Barang::edit/$1');     
    $routes->post('update/(:num)', 'Barang::update/$1');
    
    $routes->get('hapus/(:num)', 'Barang::hapus/$1');   
});