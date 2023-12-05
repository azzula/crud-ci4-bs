<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/post', 'PostController::index');
$routes->get('/post/create', 'PostController::create');
$routes->post('/post/store', 'PostController::store');
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
$routes->post('/post/update/(:num)', 'PostController::update/$1');
$routes->get('/post/remove/(:num)', 'PostController::remove/$1');
$routes->post('/post/delete/(:num)', 'PostController::delete/$1');
