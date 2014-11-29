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


// GENERAL 
$route['default_controller'] = "login";
$route['404_override'] = '';


// PROJECT CONTROLLER
$route['project/new_project'] = "project_controller/new_project";
$route['project/index_project/(:num)'] = "project_controller/index_project/$1";
$route['project/edit_project/(:num)'] = "project_controller/edit_project/$1";
$route['project/delete_project/(:num)'] = "project_controller/delete_project/$1";


//USER CONTROLLER
$route['user/index'] = "user_controller/index";
$route['user/projectList'] = "user_controller/index";
$route['user/candidate/(:num)'] = "user_controller/send_candidacy/$1";
$route['user/list_all'] = "user_controller/all_projects_list";
$route['user/list_contributor'] = "user_controller/display_project_list_contributor";
$route['user/list_follower'] = "user_controller/display_project_list_follower";
$route['user/list_candidature'] = "user_controller/display_project_list_candidature";
$route['user/list_invitation'] = "user_controller/display_project_list_invitation";
$route['user/display_resume'] = "user_controller/display_resume";


// USERSTORIES CONTROLLER
$route['userstory/new_userstory'] = "userstory_controller/new_userstory";

$route['project/(:num)/new_userstory'] = "userstory_controller/new_userstory";
$route['project/(:num)/userstory/index_userstory/(:num)'] = "userstory_controller/index_userstory/$2";
$route['project/(:num)/userstory/delete_userstory/(:num)'] = "userstory_controller/delete_userstory/$2";
$route['project/(:num)/userstory/edit_userstory/(:num)'] = "userstory_controller/edit_userstory/$2";


/* End of file routes.php */
/* Location: ./application/config/routes.php */