<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * My Routes
 */
// $route['admin/index'] = 'admin/index';


/**
 * End My Routes
 */


$route['default_controller'] = 'user/index';

$route['pages/view'] = 'pages/view';
// $route['pages/(:any)'] = 'pages/view/$1';
// $route['default_controller'] = 'pages/view';
// $route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
