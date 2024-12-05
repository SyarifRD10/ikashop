<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');


$routes->group('user', function ($routes) {
    $routes->get('/', 'user::index');
    $routes->post('masuk', 'user::masuk');
    $routes->get('keluar', 'user::keluar');
});

//produk
// $routes->group('produk', function ($routes) {
// });

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->post('/produk/create', 'Produk::store');
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('/produk/update/(:num)', 'Produk::ubah/$1');
$routes->get('/produk/delete/(:num)', 'Produk::hapus/$1');

//kategori_produk
$routes->get('kategori', 'KategoriProdukController::index');
$routes->get('kategori/tambah', 'KategoriProdukController::tambah');
$routes->post('kategori/create', 'KategoriProdukController::create');
// $routes->post('kategori/create', 'KategoriProdukController::store');
$routes->get('kategori/edit/(:num)', 'KategoriProdukController::edit/$1');
$routes->post('kategori/update/(:num)', 'KategoriProdukController::ubah/$1');
$routes->get('kategori/delete/(:num)', 'KategoriProdukController::hapus/$1');

//detail penjualan
$routes->get('/detail_penjualan', 'DetailPenjualan::index');
$routes->post('/detail_penjualan/create', 'DetailPenjualan::create');
$routes->post('/detail_penjualan/store', 'DetailPenjualan::store');
$routes->get('/detail_penjualan/edit/(:num)', 'DetailPenjualan::edit/$1');
$routes->post('/detail_penjualan/update/(:num)', 'DetailPenjualan::ubah/$1');
$routes->get('/detail_penjualan/delete/(:num)', 'DetailPenjualan::hapus/$1');

//stok barang
$routes->get('stok_barang', 'StokBarang::index');
$routes->get('stok_barang/create', 'StokBarang::tambah');
$routes->get('stok_barang/create/(:num)', 'StokBarang::create/$1');
$routes->post('stok_barang/store', 'StokBarang::store');
$routes->get('stok_barang/edit/(:num)', 'StokBarang::edit/$1');
$routes->post('stok_barang/update/(:num)', 'StokBarang::update/$1');
$routes->delete('stok_barang/delete/(:num)', 'StokBarang::delete/$1');
$routes->get('/stok_barang/create', 'StokBarang::tambah');
$routes->get('/stok_barang/create/(:num)', 'StokBarang::create/$1');
$routes->post('/stok_barang/store', 'StokBarang::simpan');
$routes->get('/stok_barang/edit/(:num)', 'StokBarang::edit/$1');
$routes->post('/stok_barang/update/(:num)', 'StokBarang::ubah/$1');
$routes->get('/stok_barang/delete/(:num)', 'StokBarang::hapus/$1');
$routes->get('/stok_barang/report', 'StokBarang::report');
$routes->post('/stok_barang/report', 'StokBarang::laporan');

//penjualan
$routes->get('/penjualan', 'PenjualanController::index');
$routes->get('/penjualan/create', 'PenjualanController::create');
$routes->post('/penjualan/store', 'PenjualanController::store');
$routes->get('/penjualan/detail/(:num)', 'PenjualanController::detail/$1');
$routes->get('/penjualan/edit/(:num)', 'PenjualanController::edit/$1');
$routes->post('/penjualan/update/(:num)', 'PenjualanController::update/$1');
$routes->get('/penjualan/delete/(:num)', 'PenjualanController::delete/$1');


//pelanggan
$routes->group('pelanggan', function ($routes) {
    $routes->get('/', 'Pelanggan::index');
    $routes->get('pelanggan/tambah', 'Pelanggan::tambah');
    $routes->post('pelanggan/create', 'Pelanggan::create');
    $routes->post('pelanggan/create', 'Pelanggan::store');
    $routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1');
    $routes->get('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');
});

//supplier
$routes->group('supplier', function ($routes) {
    $routes->get('/', 'Supplier::index');
    $routes->get('tambah', 'Supplier::tambah');
    $routes->post('create', 'Supplier::simpan');
    // $routes->post('store', 'Supplier::store');
    $routes->get('edit/(:num)', 'Supplier::edit/$1');
    $routes->post('update/(:num)', 'Supplier::ubah/$1');
    $routes->get('delete/(:num)', 'Supplier::delete/$1');
});

//laporan penjualan
$routes->group('laporan_penjualan', function ($routes) {
    $routes->get('/', 'LaporanPenjualan::index');
    $routes->get('laporan_penjualan/tambah', 'LaporanPenjualan::tambah');
    $routes->post('laporan_penjualan/create', 'LaporanPenjualan::create');
    $routes->post('laporan_penjualan/store', 'LaporanPenjualan::store');
    $routes->get('cetak', 'LaporanPenjualan::cetak');
});



$routes->get('pengguna', 'PenggunaController:index');
$routes->get('pengguna/create', 'PenggunaController:create');
$routes->post('pengguna/store', 'PenggunaController:store');
$routes->get('pengguna/edit/(:num)', 'PenggunaController:edit/$1');
$routes->post('pengguna/update/(:num)', 'PenggunaController:update/$1');
$routes->get('pengguna/delete/(:num)', 'PenggunaController:delete/$1');
