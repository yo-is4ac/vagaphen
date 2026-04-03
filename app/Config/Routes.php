<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function ($routes) {
  $routes->group('vacancies', function ($routes) {
    $routes->post('/', 'Api\VacancyController::store');
    $routes->get('/', 'Api\VacancyController::index');
  });

  $routes->group('candidates', function ($routes) {
    $routes->post('/', 'Api\CandidateController::store');
  });
});
