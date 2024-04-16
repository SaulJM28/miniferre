<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Sesion::index');
$routes->get('inicio', 'Home::index');
$routes->post('iniciar-sesion', 'Sesion::logIn');
