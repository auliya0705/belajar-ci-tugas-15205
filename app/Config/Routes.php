<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login','AuthController::login'); //menampilkan halaman login
$routes->post('login','AuthController::login', ['filter' => 'redirect']); //mengirim data user login , ['filter' => 'redirect']
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

$routes->group('diskon', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'DiskonController::index');
    $routes->post('', 'DiskonController::create');
    $routes->post('edit/(:any)', 'DiskonController::edit/$1');
    $routes->get('delete/(:any)', 'DiskonController::delete/$1');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->get('pembelian', 'PembelianController::index', ['filter' => 'auth']);
$routes->get('pembelian/updateStatus/(:num)', 'PembelianController::updateStatus/$1', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('faq','FaqController::index', ['filter' => 'auth']);
// $routes->get('profile','ProfileController::index', ['filter' => 'auth']);
$routes->get('contact','ContactController::index', ['filter' => 'auth']);
$routes->resource('api', ['controller' => 'apiController']);