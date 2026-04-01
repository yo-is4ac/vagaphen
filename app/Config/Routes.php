<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('enterprises', ['namespace' => 'App\Controllers\Enterprise'], function ($routes) {
    $routes->group('vacancies', function ($routes) {
        $routes->post('/', 'VacancyController::store');
        $routes->get('/', 'VacancyController::index');
    });
});
