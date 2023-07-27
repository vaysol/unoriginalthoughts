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

//Admin Users
$routes->get('/admin/admin-users', 'Admin\AdminUser::index');
$routes->get('/admin/admin-user/add', 'Admin\AdminUser::add');
$routes->get('/admin/admin-user/edit/(:any)', 'Admin\AdminUser::edit/$1');
$routes->post('/admin/admin-user/save', 'Admin\AdminUser::save');
$routes->get('/admin/admin-user/delete/(:any)', 'Admin\AdminUser::delete/$1');

//Admin Roles
$routes->get('/admin/admin-roles', 'Admin\AdminRoles::index');
$routes->get('/admin/admin-role/add', 'Admin\AdminRoles::add');
$routes->get('/admin/admin-role/edit/(:any)', 'Admin\AdminRoles::edit/$1');
$routes->post('/admin/admin-role/save', 'Admin\AdminRoles::save');
$routes->get('/admin/admin-role/delete/(:any)', 'Admin\AdminRoles::delete/$1');


//Banner
$routes->get('/admin/banners', 'Admin\Banners::index');
$routes->get('/admin/banner/add', 'Admin\Banners::add');
$routes->get('/admin/banner/edit/(:any)', 'Admin\Banners::edit/$1');
$routes->post('/admin/banner/save', 'Admin\Banners::save');
$routes->get('/admin/banner/delete/(:any)', 'Admin\Banners::delete/$1');

//Testimonials
$routes->get('/admin/testimonials', 'Admin\Testimonial::index');
$routes->get('/admin/testimonial/add', 'Admin\Testimonial::add');
$routes->get('/admin/testimonial/edit/(:any)', 'Admin\Testimonial::edit/$1');
$routes->post('/admin/testimonial/save', 'Admin\Testimonial::save');
$routes->get('/admin/testimonial/delete/(:any)', 'Admin\Testimonial::delete/$1');

// Blog
$routes->get('/admin/blogs', 'Admin\Blogs::index');
$routes->get('/admin/blog/add', 'Admin\Blogs::add');
$routes->get('/admin/blog/edit/(:any)', 'Admin\Blogs::edit/$1');
$routes->post('/admin/blog/save', 'Admin\Blogs::save');
$routes->get('/admin/blog/delete/(:any)', 'Admin\Blogs::delete/$1');

// News and events
$routes->get('/admin/news-events', 'Admin\NewsAndEvents::index');
$routes->get('/admin/news-event/add', 'Admin\NewsAndEvents::add');
$routes->get('/admin/news-event/edit/(:any)', 'Admin\NewsAndEvents::edit/$1');
$routes->post('/admin/news-event/save', 'Admin\NewsAndEvents::save');
$routes->get('/admin/news-event/delete/(:any)', 'Admin\NewsAndEvents::delete/$1');

// Research papers
$routes->get('/admin/research-papers', 'Admin\ResearchPapers::index');
$routes->get('/admin/research-paper/add', 'Admin\ResearchPapers::add');
$routes->get('/admin/research-paper/edit/(:any)', 'Admin\ResearchPapers::edit/$1');
$routes->post('/admin/research-paper/save', 'Admin\ResearchPapers::save');
$routes->get('/admin/research-paper/delete/(:any)', 'Admin\ResearchPapers::delete/$1');

// Case-Studies papers
$routes->get('/admin/case-studies', 'Admin\CaseStudies::index');
$routes->get('/admin/case-study/add', 'Admin\CaseStudies::add');
$routes->get('/admin/case-study/edit/(:any)', 'Admin\CaseStudies::edit/$1');
$routes->post('/admin/case-study/save', 'Admin\CaseStudies::save');
$routes->get('/admin/case-study/delete/(:any)', 'Admin\CaseStudies::delete/$1');

//Blog-Category
$routes->get('/admin/blog-categories', 'Admin\BlogCategories::index');
$routes->get('/admin/blog-category/add', 'Admin\BlogCategories::add');
$routes->get('/admin/blog-category/edit/(:any)', 'Admin\BlogCategories::edit/$1');
$routes->post('/admin/blog-category/save', 'Admin\BlogCategories::save');
$routes->get('/admin/blog-category/delete/(:any)', 'Admin\BlogCategories::delete/$1');

//Doctors
$routes->get('/admin/doctors', 'Admin\Doctors::index');
$routes->get('/admin/doctor/add', 'Admin\Doctors::add');
$routes->get('/admin/doctor/edit/(:any)', 'Admin\Doctors::edit/$1');
$routes->post('/admin/doctor/save', 'Admin\Doctors::save');
$routes->get('/admin/doctor/delete/(:any)', 'Admin\Doctors::delete/$1');

//Specialities
$routes->get('/admin/specialities', 'Admin\Specialities::index');
$routes->get('/admin/speciality/add', 'Admin\Specialities::add');
$routes->get('/admin/speciality/edit/(:any)', 'Admin\Specialities::edit/$1');
$routes->post('/admin/speciality/save', 'Admin\Specialities::save');
$routes->get('/admin/speciality/delete/(:any)', 'Admin\Specialities::delete/$1');


//Subscription
$routes->get('/admin/subscriptions', 'Admin\Subscription::index');
$routes->get('/admin/subscription/delete/(:any)', 'Admin\Subscription::delete/$1');

//Partner With Us
$routes->get('/admin/partner-with-us', 'Admin\PartnerWithUs::index');
$routes->get('/admin/partner-with-us/delete/(:any)', 'Admin\PartnerWithUs::delete/$1');

//Careers 
$routes->get('/admin/careers', 'Admin\Careers::index');
$routes->get('/admin/careers/delete/(:any)', 'Admin\Careers::delete/$1');

//Contact Us
$routes->get('/admin/contact-us', 'Admin\ContactUs::index');
$routes->get('/admin/contact-us/delete/(:any)', 'Admin\ContactUs::delete/$1');
$routes->get('/admin/contact-us/print/(:any)', 'Admin\ContactUs::print_the_record_by_id/$1');

//Leaders
$routes->get('/admin/leaders', 'Admin\Leaders::index');
$routes->get('/admin/leader/add', 'Admin\Leaders::add');
$routes->get('/admin/leader/edit/(:any)', 'Admin\Leaders::edit/$1');
$routes->post('/admin/leader/save', 'Admin\Leaders::save');
$routes->get('/admin/leader/delete/(:any)', 'Admin\Leaders::delete/$1');

//Home Matrix
$routes->get('/admin/home-matrixes', 'Admin\HomeMatrix::index');
$routes->get('/admin/home-matrix/edit/(:any)', 'Admin\HomeMatrix::edit/$1');
$routes->post('/admin/home-matrix/save', 'Admin\HomeMatrix::save');

//Jobs
$routes->get('/admin/jobs', 'Admin\Jobs::index');
$routes->get('/admin/job/add', 'Admin\Jobs::add');
$routes->get('/admin/job/edit/(:any)', 'Admin\Jobs::edit/$1');
$routes->post('/admin/job/save', 'Admin\Jobs::save');
$routes->get('/admin/job/delete/(:any)', 'Admin\Jobs::delete/$1');

// Excel Sheet Download 
$routes->get('/admin/download_excel', 'Admin\ExcelSheet::careers_list_download');

/*  Admin panel routes ends */

$routes->get('/', 'Home::index');

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
