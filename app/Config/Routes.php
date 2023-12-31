<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\ErrorController::index');
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('404', 'ErrorController::index');
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'UserController::index');
});
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
});
// Pasar
$routes->group('pasar', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'PasarController::index');
    $routes->post('store', 'PasarController::store');
    $routes->post('update/(:any)', 'PasarController::update/$1');
    $routes->post('delete/(:any)', 'PasarController::delete/$1');
    // $routes->get('pedagang/(:any)', 'PasarController::pedagang/$1');
    $routes->get('get-data-pasar', 'PasarController::getDataPasar');
});
// Pedagang
$routes->group('pedagang', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'PedagangController::index');
    $routes->get('laporan', 'PedagangController::laporan');
    $routes->get('perpasar/(:any)', 'PedagangController::laporanPerPasar/$1');
    $routes->post('store', 'PedagangController::store');
    $routes->post('update/(:any)', 'PedagangController::update/$1');
    $routes->get('pasar/(:any)', 'PedagangController::pasar/$1');
    $routes->post('delete/(:any)', 'PedagangController::delete/$1');
});
// Blok
$routes->group('blok', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'BlokController::index');
    $routes->post('store', 'BlokController::store');
    $routes->post('update/(:any)', 'BlokController::update/$1');
    $routes->post('delete/(:any)', 'BlokController::delete/$1');
});
// Klasifikasi
$routes->group('klasifikasi', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'KlasifikasiController::index');
    $routes->post('store', 'KlasifikasiController::store');
    $routes->post('update/(:any)', 'KlasifikasiController::update/$1');
    $routes->post('delete/(:any)', 'KlasifikasiController::delete/$1');
});



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
