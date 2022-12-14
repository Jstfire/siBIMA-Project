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

$routes->get('/DetailOrmawa/(:segment)', 'ListOrmawa::detailOrmawa/$1');
$routes->get('/DetailUKM/(:segment)', 'ListUKM::detailUKM/$1');
$routes->get('/DetailBidangDivisi/(:segment)', 'ListBidangDivisi::index/$1');
$routes->get('/UnggahLPJ', 'UnggahLPJ::index');
$routes->get('/JadwalKegiatan', 'JadwalKegiatan::index');
$routes->get('/Login', 'Login::index', ['filter' => 'authLogin']);
$routes->get('/Logout', 'Logout::index');
$routes->match(['get', 'post'], '/Login/LoginAuth', 'Login::loginAuth');

$routes->get('/DashboardAdmin/ProgresKegiatan', 'DashboardAdmin::progresKegiatan', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'], '/DashboardAdmin/ListAkun', 'DashboardAdmin::listAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin', 'DashboardAdmin::tambahAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/TambahAkunPost', 'DashboardAdmin::tambahAkunPost', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/UpdateAkun', 'DashboardAdmin::updateAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/DashboardAdmin/DeleteAkun', 'DashboardAdmin::deleteAkun', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin/ListProposal', 'DashboardAdmin::listProposal', ['filter' => 'authGuard', 'filter' => 'authAdmin']);
$routes->get('/DashboardAdmin/ListLPJ', 'DashboardAdmin::listLPJ', ['filter' => 'authGuard', 'filter' => 'authAdmin']);

//UPK BAAK
$routes->get('/DashboardUPKBAAK/ListProposal', 'DashboardUPKBAAK::listProposal', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->get('/DashboardUPKBAAK/SerahProposal/(:segment)', 'DashboardUPKBAAK::serahKeWadir3/$1', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->get('/DashboardUPKBAAK/cancelSerahProposal/(:segment)', 'DashboardUPKBAAK::cancelSerahKeWadir3/$1', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->get('/DashboardUPKBAAK/ListLPJ', 'DashboardUPKBAAK::listLPJ', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->get('/DashboardUPKBAAK', 'DashboardUPKBAAK::progresKegiatan', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->match(['get', 'post'],'/DashboardUPKBAAK/AccProposalUPKBAAK', 'DashboardUPKBAAK::setujuUPKBAAK', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);
$routes->match(['get', 'post'],'/DashboardUPKBAAK/RefuseProposalUPKBAAK', 'DashboardUPKBAAK::tolakUPKBAAK', ['filter' => 'authGuard', 'filter' => 'authUPKBAAK']);

//Wadir 3
$routes->get('/DashboardWadir3/ListProposal', 'DashboardWadir3::listProposal', ['filter' => 'authGuard', 'filter' => 'authWadir3']);
$routes->get('/DashboardWadir3/ListLPJ', 'DashboardWadir3::listLPJ', ['filter' => 'authGuard', 'filter' => 'authWadir3']);
$routes->get('/DashboardWadir3', 'DashboardWadir3::progresKegiatan', ['filter' => 'authGuard', 'filter' => 'authWadir3']);
$routes->match(['get', 'post'],'/DashboardWadir3/AccProposalWadir3', 'DashboardWadir3::setujuWadir3', ['filter' => 'authGuard', 'filter' => 'authWadir3']);
$routes->match(['get', 'post'],'/DashboardWadir3/RefuseProposalWadir3', 'DashboardWadir3::tolakWadir3', ['filter' => 'authGuard', 'filter' => 'authWadir3']);

//BPH
$routes->get('DashboardBPH', 'DashboardBPH::index', ['filter' => 'authGuard', 'filter' => 'authBPH']);
$routes->get('DashboardBPH/ListProposal', 'DashboardBPH::list_proposal', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('/DashboardBPH/ListLPJ', 'DashboardBPH::listLPJ', ['filter' => 'authGuard', 'filter' => 'authBPH']);
$routes->get('/DashboardBPH/anggota', 'DashboardBPH::anggota', ['filter' => 'authGuard', 'filter' => 'authBPH']);
$routes->post('/DashboardBPH/add_anggota', 'DashboardBPH::add_anggota', ['filter' => 'authGuard', 'filter' => 'authBPH']);
$routes->get('/DashboardBPH/profile', 'DashboardBPH::profile', ['filter' => 'authGuard', 'filter' => 'authBPH']);
$routes->post('/DashboardBPH/edit_profile', 'DashboardBPH::edit_profile', ['filter' => 'authGuard', 'filter' => 'authBPH']);

//proposal
$routes->get('/PengajuanProposal', 'PengajuanProposal::index', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('pengajuan_proposal', 'PengajuanProposal::index', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->post('proposal/add', 'PengajuanProposal::add', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('proposal/download/(:segment)', 'PengajuanProposal::download/$1', ['filter' => 'authGuard']);
$routes->get('proposal/detail/(:segment)', 'PengajuanProposal::detail/$1', ['filter' => 'authGuard']);
$routes->get('proposal/edit/(:segment)', 'PengajuanProposal::edit/$1', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->post('proposal/edit_act/(:segment)', 'PengajuanProposal::edit_act/$1', ['filter' =>'authGuard', 'filter' => 'authBPH']);

//kegiatan
$routes->get('kegiatan/add', 'Kegiatan::add', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->post('kegiatan/add_act', 'Kegiatan::add_act', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('kegiatan/detail/(:segment)','Kegiatan::detail/$1', ['filter' => 'authGuard']);
$routes->get('kegiatan/edit/(:segment)','Kegiatan::edit/$1', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->post('kegiatan/edit_act/(:segment)','Kegiatan::edit_act/$1', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('kegiatan/delete/(:segment)','Kegiatan::delete/$1', ['filter' =>'authGuard', 'filter' => 'authBPH']);
$routes->get('kegiatan/list/(:segment)', 'Kegiatan::list_per_organisasi/$1', ['filter' => 'authGuard']);

//lpj
$routes->get('lpj/download/(:segment)', 'LPJ::download/$1', ['filter' => 'authGuard']);
$routes->post('lpj/upload/(:segment)', 'LPJ::upload/$1', ['filter' => 'authGuard']);

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
