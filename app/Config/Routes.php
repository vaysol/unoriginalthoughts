<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*  Admin panel routes starts */

$routes->get('/admin', 'Admin\Admin::index');
$routes->get('/admin/login', 'Admin\Login::index');
$routes->post('/admin/login_check', 'Admin\Login::login_check');
$routes->get('/admin/logout', 'Admin\Login::logout');

//Dashboard
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');


//Banner
$routes->get('/admin/banners', 'Admin\Banners::index');
$routes->get('/admin/banner/add', 'Admin\Banners::add');
$routes->get('/admin/banner/edit/(:any)', 'Admin\Banners::edit/$1');
$routes->post('/admin/banner/save', 'Admin\Banners::save');
$routes->get('/admin/banner/delete/(:any)', 'Admin\Banners::delete/$1');

//Product Category
$routes->get('/admin/product-categories', 'Admin\ProductCategory::index');
$routes->get('/admin/product-categories/add', 'Admin\ProductCategory::add');
$routes->get('/admin/product-categories/edit/(:any)', 'Admin\ProductCategory::edit/$1');
$routes->post('/admin/product-categories/save', 'Admin\ProductCategory::save');
$routes->get('/admin/product-categories/delete/(:any)', 'Admin\ProductCategory::delete/$1');

//Product Category
$routes->get('/admin/portfolios', 'Admin\Portfolio::index');
$routes->get('/admin/portfolio/add', 'Admin\Portfolio::add');
$routes->get('/admin/portfolio/edit/(:any)', 'Admin\Portfolio::edit/$1');
$routes->post('/admin/portfolio/save', 'Admin\Portfolio::save');
$routes->get('/admin/portfolio/delete/(:any)', 'Admin\Portfolio::delete/$1');

// Enquiry
$routes->get('/admin/enquiry', 'Admin\Enquiry::index');

//Product Category
$routes->get('/admin/products', 'Admin\Products::index');
$routes->get('/admin/product/add', 'Admin\Products::add');
$routes->get('/admin/product/edit/(:any)', 'Admin\Products::edit/$1');
$routes->post('/admin/product/save', 'Admin\Products::save');
$routes->get('/admin/product/delete/(:any)', 'Admin\Products::delete/$1');

//PortfolioItem
$routes->get('/admin/portfolio-items', 'Admin\PortfolioItem::index');
$routes->get('/admin/portfolio-item/add', 'Admin\PortfolioItem::add');
$routes->get('/admin/portfolio-item/edit/(:any)', 'Admin\PortfolioItem::edit/$1');
$routes->post('/admin/portfolio-item/save', 'Admin\PortfolioItem::save');
$routes->get('/admin/portfolio-item/delete/(:any)', 'Admin\PortfolioItem::delete/$1');


/*  Admin panel routes ends */

$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/portfolio', 'Home::portfolio');
$routes->get('/products', 'Home::products');
$routes->get('/products-view', 'Home::product_inner');
$routes->get('/contact', 'Home::contact');
$routes->get('/faqs', 'Home::faqs');
$routes->get('/privacy-policy', 'Home::privacy_policy');
$routes->get('/shipping-policy', 'Home::shipping_policy');
$routes->get('/return-and-refund-policy', 'Home::return_policy');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
