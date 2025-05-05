<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('error', 'ErrorController::index'); // Route for error page
$routes->get('login', 'LoginController::index'); // Route for login page
$routes->post('login/submit', 'LoginController::submit');
$routes->get('dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('logout', 'LoginController::logout');

$routes->get('/', 'Home::index');
$routes->get('member-registration','Home::memberRegistration');
$routes->post('member/register', 'MemberController::register');

$routes->get('success', 'MemberController::success');
// $routes->get('members', 'MemberController::listMembers'); // List all members
// $routes->get('member/(:num)', 'MemberController::viewMember/$1'); // View specific member by ID

// $routes->get('locations', 'LocationController::listLocations'); // List all members


$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('members', 'MemberController::listMembers'); // List all members
    $routes->get('member/(:num)', 'MemberController::viewMember/$1'); // View specific member by ID
    $routes->get('locations', 'LocationController::listLocations'); // List all locations
});



$routes->group('admin/', ['filter' => 'auth'], function($routes) {
    $routes->get('members', 'DashboardController::members'); // List all members
    $routes->get('member/(:num)', 'DashboardController::viewMember/$1'); // View specific member by ID
    $routes->get('locations', 'LocationController::listLocations'); // List all locations
});