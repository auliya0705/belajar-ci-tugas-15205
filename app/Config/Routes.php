<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login','AuthController::login'); //menampilkan halaman login
$routes->post('login','AuthController::login'); //mengirim data user login , ['filter' => 'redirect']
$routes->get('logout','AuthController::logout'); //akhiri sesi

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('productcategory', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProductCategoryController::index');
    $routes->post('', 'ProductCategoryController::create');
    $routes->post('edit/(:any)', 'ProductCategoryController::edit/$1');
    $routes->get('delete/(:any)', 'ProductCategoryController::delete/$1');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index'); //untuk menampilkan isi keranjang belanja
    $routes->post('', 'TransaksiController::cart_add'); //untuk menambah produk ke keranjang belanja
    $routes->post('edit', 'TransaksiController::cart_edit'); //untuk mengubah jumlah produk di keranjang belanja
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1'); //untuk menghapus produk dari keranjang belanja
    $routes->get('clear', 'TransaksiController::cart_clear'); //untuk mengosongkan keranjang belanja
});

$routes->get('faq','Home::faq', ['filter' => 'auth']);
$routes->get('profile','Home::profile', ['filter' => 'auth']);
$routes->get('contact','Home::contact', ['filter' => 'auth']);