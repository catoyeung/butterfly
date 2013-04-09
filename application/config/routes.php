<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'pages/index';

$route['^(api)/(.+)/(.+)$'] = "api/$2/$3";
$route['^(hk|cn)$'] = 'default_controller';
$route['^(hk|cn)/(.+)/(.+)$'] = "$2/$3";

/*$route['^(hk|cn)/manage/(:any)$'] = 'manage/$1';
$route['^(hk|cn)/account/(:any)$'] = 'account/$1';
$route['^(hk|cn)/notice/(:any)$'] = 'notice/$1';
$route['^(hk|cn)/post/(:any)$'] = 'post/$1';
$route['^(hk|cn)/user/(:any)$'] = 'user/$1';
$route['^(hk|cn)/enquiry/(:any)$'] = 'enquiry/$1';
$route['^(hk|cn)/brand/(:any)$'] = 'brand/$1';
$route['^(hk|cn)/district/(:any)$'] = 'district/$1';
$route['^(hk|cn)/ad_source/(:any)$'] = 'ad_source/$1';
$route['^(hk|cn)/treatment_type/(:any)$'] = 'treatment_type/$1';
$route['^(hk|cn)/enquiry_content/(:any)$'] = 'enquiry_content/$1';
$route['^(hk|cn)/authentication_by_post/(:any)$'] = 'authentication_by_post/$1';*/
// this route need to be put at last because
// routes are load from top to bottom





/*
$route['customer'] = 'customer/index';
$route['customer/(:any)'] = 'customer/$1';*/



$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */