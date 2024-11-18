<?php

$routes->setDefaultNamespace('App\Modules');
$routes->setDefaultController('Frontpage\Controllers\Frontpage');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// Group for Authentication Module
// Group for Admin Module
$routes->group('admin', ['namespace' => 'Modules\Administrator\Controllers'], function ($routes) {
    $routes->get('(:any)', 'Administrator::index/$1');
});

$routes->group('postdata', ["namespace" => "Modules\Postdata\Controllers"], function ($routes) {
    $routes->post('public_post/(:segment)/(:segment)', 'Postdata::public_post/$1/$2');
    $routes->post('admin_post/(:segment)/(:segment)', 'Postdata::admin_post/$1/$2');
    $routes->post('user_post/(:segment)/(:segment)', 'Postdata::user_post/$1/$2');
});

// $routes->group('modal', ['namespace' => 'Modules\Modal\Controllers'], function ($routes) {
//     $routes->get('admin/(:any)', 'Modal::admin/$1');
//     $routes->get('member/(:any)', 'Modal::member/$1');
// });
$routes->group('cronjob', ['namespace' => 'Modules\Cronjob\Controllers'], function ($routes) {
    $routes->get('start_bonus_royalti', 'Cronjob::bonus_royalti');
});

$routes->group('', ['namespace' => 'Modules\Authentication\Controllers'], function ($routes) {
    $routes->get('login', 'Authentication::login');
    $routes->get('signup', 'Authentication::register');
    $routes->get('logout', 'Authentication::logout');
    $routes->get('signup/(:any)/(:any)', 'Authentication::register/$1/$2');
});


// Group for Dashboard Module
// $routes->group('', ['namespace' => 'Modules\Dashboard\Controllers'], function($routes) {
//     $routes->get('/', 'Dashboard::view_page/dashboard');
//     $routes->get('(:any)', 'Dashboard::view_page/$1');
// });


// Frontpage as the default controller
$routes->get('/', 'Frontpage\Controllers\Frontpage::index');

//MODULES 

$routes->group('produk', ["namespace" => "Modules\Products\Controllers"], function ($routes) {
    $routes->get('modal/(:any)', 'Products::modal/$1');
    $routes->get('(:any)', 'Products::view_page/$1');
    $routes->post('postdata/(:segment)/(:segment)', 'Products::postdata/$1/$2');

});
