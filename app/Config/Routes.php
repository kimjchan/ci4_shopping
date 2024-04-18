<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/gs_detail/(:num)', 'Home::gs_detail/$1');
$routes->get('/join', 'Home::join');
$routes->get('/login', 'Home::login');
$routes->get('/cart', 'Home::cart');
$routes->get('/base', 'Basic::index');