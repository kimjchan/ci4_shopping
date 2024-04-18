<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/gs_detail/(:num)', 'Goods::index/$1');
$routes->get('/join', 'Home::join');
$routes->get('/login', 'Home::login');
$routes->get('/cart', 'Goods::cart');
$routes->get('/base', 'Basic::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/gsRegister', 'Admin::gs_register');
$routes->get('/gsList', 'Admin::gs_list');
$routes->get('/cateList', 'Admin::cate_list');
$routes->get('/cateRegister', 'Admin::cate_register');
$routes->get('/cateAdapt', 'Admin::cate_adapt');

$routes->get('/logout','Process::logout');
$routes->post('/login_process','Process::login');
$routes->post('/gs_register','Process::register_gs');
$routes->post('/cate_register','Process::register_cate');
$routes->post('/adapt_register','Process::adpat_cate');



