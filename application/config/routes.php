<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'userRegistration_Controller';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = '';
$route['registerUser'] = 'userRegistration_Controller/saveUserRegistrationData';
$route['checkUserName'] = 'userRegistration_Controller/checkRegisteredUserNames';
$route['getAllRegData'] = 'userRegistration_Controller/getRegDetails';
$route['logout'] = 'loginController/logout';
$route['home'] = 'homeController';
$route['login'] = 'loginController/authlogin';
$route['getSession'] = 'loginController/getLoggedInUserSession';

$route['getVehiclePosts'] = 'Automobile_Controller/getVehiclePostData';
$route['getFilePaths'] = 'Automobile_Controller/getFilePaths';
$route['getCategory'] = 'Automobile_Controller/getRentCategory';
$route['automobileCategory'] = 'Automobile_Controller/getAutomobileType';
$route['getAutomobileManufacturer'] = 'Automobile_Controller/getAutomobileManufacturer';
$route['getManufracturerModels'] = 'Automobile_Controller/getManufacturerModels';
$route['states'] = 'Automobile_Controller/getStates';
$route['uploadAttachment'] = 'Automobile_Controller/uploadAttachment';
$route['cities'] = 'Automobile_Controller/getStateWizeCity';
$route['savePost'] = 'Automobile_Controller/savePostData';

$route['getClothingPosts'] = 'Clothing_Controller/getClothingPostData';
$route['getClothingCategory'] = 'Clothing_Controller/getClothingCategory';
$route['getClothingType'] = 'Clothing_Controller/getClothingType';
$route['getClothingManufacturer'] = 'Clothing_Controller/getClothingManufacturer';
$route['getClothingSize'] = 'Clothing_Controller/getClothingSizeDetails';
$route['saveClothingPost'] = 'Clothing_Controller/savePostData';

$route['getFurniturePosts'] = 'Furniture_Controller/getFurniturePostData';
$route['getFurnitureCategory'] = 'Furniture_Controller/getFurnitureCategory';
$route['getFurnitureMaterial'] = 'Furniture_Controller/getFurnitureMaterial';
$route['getFurnitureType'] = 'Furniture_Controller/getFurnitureType';
$route['saveFurniturePost'] = 'Furniture_Controller/savePostData';

$route['getAppliancesPosts'] = 'Appliances_Controller/getAppliancesPostData';
$route['getAppliancesCategory'] = 'Appliances_Controller/getAppliancesCategory';
$route['getAppliancesType'] = 'Appliances_Controller/getAppliancesType';
$route['saveAppliancesPost'] = 'Appliances_Controller/savePostData';
$route['allPosts'] = 'AllPost_controller/getAllPosts';
$route['deletePost'] = 'AllPost_controller/deletePost';
$route['getMyAllPosts'] = 'AllPost_controller/getMyAllPosts';
$route['getPostsCount'] = 'AllPost_controller/getPostsCount';
$route['getProfile'] = 'Profile_controller/getProfile';
$route['updateProfile'] = 'Profile_controller/updateProfile';


