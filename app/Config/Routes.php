<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Website Pages
$routes->get('/', 'Website::index');
$routes->get('about', 'Website::about');
$routes->get('news', 'Website::news');
$routes->get('faq', 'Website::faq');
$routes->get('shipping', 'Website::shipping');
$routes->get('returns', 'Website::returns');
$routes->get('contact', 'Website::contact');

<<<<<<< Updated upstream
=======
$routes->get('checkout', 'Website::checkout');
$routes->post('checkout/place-order', 'Website::placeOrder');

// AUTH Pages
$routes->get('login', 'Website::login');
$routes->post('login', 'Website::loginPost');
$routes->get('register', 'Website::register');
$routes->post('register', 'Website::registerPost');

$routes->get('profile', 'Website::profile');
$routes->post('profile/cancel-order/(:num)', 'Website::cancelOrder/$1');
$routes->get('logout', 'Website::logout');

>>>>>>> Stashed changes
// Product Pages
$routes->get('shop', 'ProductPages::shop');
$routes->get('collections/(:any)', 'ProductPages::collection/$1');
$routes->get('search', 'ProductPages::search');

// Admin Routes
$routes->get('admin', 'Admin::index');
$routes->post('admin/login', 'Admin::login');
$routes->get('admin/dashboard', 'Admin::dashboard');
<<<<<<< Updated upstream
$routes->get('admin/orders', 'Admin::orders');
$routes->get('admin/products', 'Admin::products');
$routes->get('admin/users', 'Admin::users');
=======
$routes->get('admin/logout', 'Admin::logout');
$routes->get('admin/reports', 'Admin::reports');

// Admin ORDER CRUD Routes
$routes->get('admin/orders', 'OrderCRUD::index');
$routes->post('admin/orders/update/(:num)', 'OrderCRUD::update/$1');
$routes->post('admin/orders/delete/(:num)', 'OrderCRUD::delete/$1');

// Admin PRODUCT CRUD Routes
$routes->get('admin/products', 'ProductCRUD::index');
$routes->get('admin/products/create', 'ProductCRUD::create');
$routes->post('admin/products/store', 'ProductCRUD::store');
$routes->post('admin/products/update/(:num)', 'ProductCRUD::update/$1');
$routes->post('admin/products/delete/(:num)', 'ProductCRUD::delete/$1');

// Admin USER CRUD Routes
$routes->get('admin/users', 'UserCRUD::index');
$routes->get('admin/users/create', 'UserCRUD::create');
$routes->post('admin/users/store', 'UserCRUD::store');
$routes->post('admin/users/update/(:num)', 'UserCRUD::update/$1');
$routes->post('admin/users/delete/(:num)', 'UserCRUD::delete/$1');
>>>>>>> Stashed changes
