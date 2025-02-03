<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('member-registration','Home::memberRegistration');
$routes->post('member/register', 'MemberController::register');

$routes->get('success', 'MemberController::success');
$routes->get('members', 'MemberController::listMembers'); // List all members
$routes->get('member/(:num)', 'MemberController::viewMember/$1'); // View specific member by ID

$routes->get('locations', 'LocationController::listLocations'); // List all members
