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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['filter'=>'Auth']);
$routes->get('/test','Test::index');
$routes->get('/login','Login\Login::login');
$routes->get('/logout','Login\Login::logout');
$routes->get('/Example','Exam::index');
$routes->get('/admin','Admin\Admin::index',['filter'=>'AdmAuth']);
$routes->get('/admin/login','Admin\Admin::login');
$routes->get('/admin/addUser','Admin\Admin::userADD',['filter'=>'AdmAuth']);
$routes->get('/admin/getGroups','Admin\Admin::getGroups',['filter'=>'AdmAuth']);
$routes->get('/admin/getObjects','Admin\Admin::getObjects',['filter'=>'AdmAuth']);
$routes->get('/admin/getAvaluableRoles','Admin\Admin::getAvaluableRoles',['filter'=>'AdmAuth']);
$routes->get('/admin/createUser','Admin\Admin::createUser',['filter'=>'AdmAuth']);
$routes->get('/admin/list','Admin\Admin::getList',['filter'=>'AdmAuth']);
$routes->get('/admin/delete','Admin\Admin::deleteOP',['filter'=>'AdmAuth']);
$routes->get('/admin/createObject','Admin\Admin::createObject',['filter'=>'AdmAuth']);
$routes->get('/admin/updateObject','Admin\Admin::updateObject',['filter'=>'AdmAuth']);
$routes->get('/login/newPassword','Login\Login::newPassword');
$routes->get('/admin/getRolesByGroupID','Admin\Admin::getRolesByGroupID',['filter'=>'AdmAuth']);
$routes->get('/admin/addRole','Admin\Admin::addRole',['filter'=>'AdmAuth']);
$routes->get('/admin/editRole','Admin\Admin::editRole',['filter'=>'AdmAuth']);
$routes->get('/admin/deleteRole','Admin\Admin::deleteRole',['filter'=>'AdmAuth']);

$routes->post('/Login/checkpair','Login\Login::checkpair');
$routes->post('/Login/checkcode','Login\Login::checkcode');

$routes->post('/Login/checkpairAdmin','Login\Login::checkpairAdmin');
$routes->post('/Login/checkcodeAdmin','Login\Login::checkcodeAdmin');

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
	
$routes->get('/planfakt','API\User::index');
$routes->post('/planfakt','API\User::getInfo');
$routes->post('/API/User/getPeriod','API\User::getDatePeriod');
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
