<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Website Pages
$routes->get('/', 'Website::index');
$routes->get('about', 'Website::about');
$routes->get('news', 'Website::news');
$routes->get('shop', 'Website::shop');
$routes->get('faq', 'Website::faq');
$routes->get('shipping', 'Website::shipping');
$routes->get('returns', 'Website::returns');
$routes->get('contact', 'Website::contact');
$routes->get('checkout', 'Website::checkout');

// Product Pages
$routes->get('collections/local/drop26', 'ProductPages::drop26');
$routes->get('collections/local/drop25', 'ProductPages::drop25');
$routes->get('collections/collab/DDD', 'ProductPages::ddd');
$routes->get('collections/collab/Manga26', 'ProductPages::manga26');

// Admin Routes (already perfect)
$routes->get('admin', 'Admin::login');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/orders', 'Admin::orders');
$routes->get('admin/products', 'Admin::products');
$routes->get('admin/users', 'Admin::users');