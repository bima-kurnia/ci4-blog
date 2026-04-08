<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//
// Home
//
$routes->get('/', 'Home::index');
$routes->get('/post/(:segment)', 'Home::detail/$1'); 
$routes->get('/category/(:segment)', 'Home::category/$1');
$routes->get('/search', 'Home::search');
//

//
// Auth
//
$routes->get('/register', 'Auth::register');
$routes->post('/save-register', 'Auth::saveRegister');

$routes->get('/login', 'Auth::login');
$routes->post('/process-login', 'Auth::processLogin');

$routes->get('/logout', 'Auth::logout');
//

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

//
// Posts
//
$routes->get('/posts', 'Post::index', ['filter' => 'auth']);
$routes->get('/posts/create', 'Post::create', ['filter' => 'auth']);
$routes->post('/posts/store', 'Post::store', ['filter' => 'auth']);
$routes->get('/posts/edit/(:num)', 'Post::edit/$1', ['filter' => 'auth']);
$routes->post('/posts/update/(:num)', 'Post::update/$1', ['filter' => 'auth']);
$routes->get('/posts/delete/(:num)', 'Post::delete/$1', ['filter' => 'auth']);
//


//
// API
//
$routes->get('/api/posts', 'Post::apiIndex');
$routes->get('/api/posts/(:num)', 'Post::apiDetail/$1');
$routes->post('/api/posts', 'Post::apiCreate');
//
