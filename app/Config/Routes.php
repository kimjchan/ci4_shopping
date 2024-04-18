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


$routes->get('/logout','Process::logout');
$routes->post('/login_process','Process::login');
$routes->post('/gs_register','Process::register_gs');


