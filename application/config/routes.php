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

$route['default_controller'] = "shopshow";
$route['404_override'] = '';

// for css images
//$route['(:any).font'] = "view/index/fonts/root/$1";
//$route['(:any).css'] = "view/index/css/root/$1";
//$route['(:any).jpg'] = "view/index/images/root/$1";
//$route['(:any).js'] = "view/index/js/root/$1";

$route['css/(:any)'] = "view/index/css/root/$1";
$route['images/(:any)'] = "view/index/images/root/$1";
$route['js/(:any)'] = "view/index/js/root/$1";

$route['member/css/(:any)'] = "view/index/css/member/$1";
$route['member/images/(:any)'] = "view/index/images/member/$1";
$route['member/js/(:any)'] = "view/index/js/member/$1";



/* End of file routes.php */
/* Location: ./application/config/routes.php */