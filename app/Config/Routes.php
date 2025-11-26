<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cronjob','Cronpage::test');
$routes->post('/form/(:any)','Form::action_update/$1');
$routes->get('/gallery/(:any)','Pages::gallery/$1');
$routes->post('/catches/(:any)','Ajax_request::action_update/$1');


$routes->get('/web-admin.html', 'AdminLogin::index');
$routes->get('/mlm_event', 'Cronpage::mlm_event');
$routes->get('/catch_captcha', 'AdminLogin::catch_captcha');
$routes->post('/adminlogin','Login::admin'); 

$routes->group('',['filter'=>'AuthCheck'], function($routes){
	$routes->post('/web-admin/web_setting/(:any)', 'Admin_setting::action_update/$1');
	$routes->post('/web-admin/gallery/(:any)', 'Admin_gallery::action_update/$1');
	$routes->post('/web-admin/facility/(:any)', 'Admin_facility::action_update/$1');
	$routes->post('/web-admin/near_location/(:any)', 'Admin_Location::action_update/$1');
	$routes->post('/web-admin/navbar/(:any)', 'Admin_navbar::action_update/$1');
	$routes->post('/web-admin/features/(:any)', 'Admin_features::action_update/$1');
	$routes->post('/web-admin/slider/(:any)', 'Admin_slider::action_update/$1');
	$routes->post('/web-admin/project/(:any)', 'Admin_project::action_update/$1');
	$routes->post('/web-admin/property/(:any)', 'Admin_property::action_update/$1');
	$routes->post('/web-admin/user/(:any)', 'Admin_user::action_update/$1');
	$routes->get('/web-admin/create-page', 'Admin_web_pages::addpage');
	$routes->get('/web-admin/user_access/(:any)', 'Admin::access/$1');
    $routes->get('/web-admin/edit-page/(:any)', 'Admin_web_pages::editpage/$1');
    $routes->post('/web-admin/web-page/(:any)', 'Admin_web_pages::action_update/$1');
    $routes->match(["get","post"],'/web-admin/(:any)', 'Admin::view/$1');
});

$routes->get('/members.html', 'MlmLogin::index');
$routes->post('/mlmlogin','Login_Mlm::admin');
$routes->group('',['filter'=>'MlmCheck'], function($routes){
	$routes->post('/members/ajax/(:any)','Mlm_member_ajax::ajax_request/$1');
	$routes->post('/members/client/(:any)','Mlm_client::action_update/$1');
	
	$routes->post('/members/mlm_property_book/(:any)', 'Mlm_property_book::action_update/$1');

	$routes->post('/members/team_detail/(:any)', 'Mlm_member::action_update/$1');
	$routes->get('/members/member_profile/(:any)', 'Mlm_admin::profile/$1');
	$routes->get('/members/ad_member_profile/(:any)', 'Mlm_admin::adm_profile/$1');
	$routes->post('/members/mlm-property/(:any)', 'Mlm_property::action_update/$1');
	$routes->post('/members/mlm_access/(:any)', 'Mlm_user_access::view/$1');
	$routes->post('/members/user/(:any)', 'Mlm_user::action_update/$1');
	$routes->match(["get","post"],'/members/(:any)', 'Mlm_admin::view/$1'); 
});


$routes->get('/client-admin','MlmLogin::client'); 

//test api
$routes->post('/test_api/get_edit_data','Api::get_edit_data'); 
$routes->post('/test_api/save_edit_data','Api::save_edit_data'); 
$routes->post('/test_api/test_add','Api::test_add');
$routes->get('/test_api/get_data','Api::get_data');
$routes->get('/test_api/get_image_data','Api::image_data');

// test api 
$routes->get('/(:any)','Pages::view/$1');