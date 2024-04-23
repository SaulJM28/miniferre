<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Sesion::index');
$routes->get('inicio', 'Home::index');
$routes->post('iniciar-sesion', 'Sesion::logIn');
//productos
$routes->get('productos', 'Product::index');
$routes->get('lista-productos', 'Product::store');