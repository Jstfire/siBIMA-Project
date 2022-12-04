<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/ListOrmawa', 'ListOrmawa::index');
$routes->get('/ListUKM', 'ListUKM::index');

$routes->get('/DetailOrmawa', 'ListOrmawa::detailOrmawa');
$routes->get('/DetailUKM', 'ListUKM::detailUKM');
$routes->get('/DetailBidangDivisi', 'ListBidangDivisi::index');
$routes->get('/UnggahLPJ', 'UnggahLPJ::index');
$routes->get('/JadwalKegiatan', 'JadwalKegiatan::index');
$routes->get('/Login', 'Login::index', ['filter' => 'authLogin']);
$routes->get('/Logout', 'Logout::index');
$routes->match(['get', 'post'], '/Login/LoginAuth', 'Login::loginAuth');

$routes->get('/DashboardAdmin', 'DashboardAdmin::index', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'], '/DashboardAdmin/ListAkun', 'DashboardAdmin::listAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin/TambahAkun', 'DashboardAdmin::tambahAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/TambahAkunPost', 'DashboardAdmin::tambahAkunPost', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/UpdateAkun', 'DashboardAdmin::updateAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/DeleteAkun', 'DashboardAdmin::deleteAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin/ListProposal', 'DashboardAdmin::listProposal', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin/ListLPJ', 'DashboardAdmin::listLPJ', ['filter' => 'authGuard', 'filter' => 'authAdmin']);

//BPH
$routes->get('DashboardBPH', 'DashboardBPH::index');
$routes->get('DashboardBPH/ListProposal', 'DashboardBPH::list_proposal');

//proposal
$routes->get('/PengajuanProposal', 'PengajuanProposal::index');
$routes->get('pengajuan_proposal', 'PengajuanProposal::index');

//kegiatan
$routes->get('kegiatan/add', 'Kegiatan::add', ['filter' => 'authGuard']);
$routes->post('kegiatan/add_act', 'Kegiatan::add_act', ['filter' => 'authGuard']);
$routes->get('kegiatan/detail/(:segment)','Kegiatan::detail/$1', ['filter' => 'authGuard']);
$routes->get('kegiatan/edit/(:segment)','Kegiatan::edit/$1', ['filter' => 'authGuard']);
$routes->post('kegiatan/edit_act/(:segment)','Kegiatan::edit_act/$1', ['filter' => 'authGuard']);
$routes->get('kegiatan/delete/(:segment)','Kegiatan::delete/$1', ['filter' => 'authGuard']);

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
