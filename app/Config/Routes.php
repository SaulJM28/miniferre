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
$routes->get('form-producto',  'Product::form');
$routes->get('form-producto/(:any)',  'Product::form/$1');
$routes->post('agregar-producto', 'Product::create');
$routes->post('editar-producto', 'Product::update');
$routes->post('eliminar-producto', 'Product::delete');