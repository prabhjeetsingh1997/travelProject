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

$route['default_controller'] = "index";
$route['404_override'] = 'error_404';


/*********** ADMIN DEFINED ROUTES *******************/

$route[ADMIN_URL] = "admin";
$route[ADMIN_URL.'/loginMe']                     = 'admin/loginMe';
$route[ADMIN_URL.'/dashboard']                   = 'user';
$route[ADMIN_URL.'/logout']                      = 'user/logout';
$route[ADMIN_URL.'/userListing']                 = 'user/userListing';
$route[ADMIN_URL.'/userListing/(:num)']          = "user/userListing/$1";
$route[ADMIN_URL.'/addNew']                      = "user/addNew";
$route[ADMIN_URL.'/addNewUser']                  = "user/addNewUser";
$route[ADMIN_URL.'/editOld']                     = "user/editOld";
$route[ADMIN_URL.'/editOld/(:num)']              = "user/editOld/$1";
$route[ADMIN_URL.'/editUser']                    = "user/editUser";
$route[ADMIN_URL.'/deleteUser']                  = "user/deleteUser";
$route[ADMIN_URL.'/profile']                     = "user/profile";
$route[ADMIN_URL.'/profile/(:any)']              = "user/profile/$1";
$route[ADMIN_URL.'/profileUpdate']               = "user/profileUpdate";
$route[ADMIN_URL.'/profileUpdate/(:any)']        = "user/profileUpdate/$1";

$route[ADMIN_URL.'/loadChangePass']              = "user/loadChangePass";
$route[ADMIN_URL.'/changePassword']              = "user/changePassword";
$route[ADMIN_URL.'/changePassword/(:any)']       = "user/changePassword/$1";
$route[ADMIN_URL.'/pageNotFound']                = "user/pageNotFound";
$route[ADMIN_URL.'/checkEmailExists']            = "user/checkEmailExists";
$route[ADMIN_URL.'/login-history']               = "user/loginHistoy";
$route[ADMIN_URL.'/login-history/(:num)']        = "user/loginHistoy/$1";
$route[ADMIN_URL.'/login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route[ADMIN_URL.'/forgotPassword']                         = "login/forgotPassword";
$route[ADMIN_URL.'/resetPasswordUser']                      = "login/resetPasswordUser";
$route[ADMIN_URL.'/resetPasswordConfirmUser']               = "login/resetPasswordConfirmUser";
$route[ADMIN_URL.'/resetPasswordConfirmUser/(:any)']        = "login/resetPasswordConfirmUser/$1";
$route[ADMIN_URL.'/resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route[ADMIN_URL.'/createPasswordUser']                     = "login/createPasswordUser";

/**************** Master Data Management ***************************************/
$route[ADMIN_URL.'/viewCountries'] 					= "user/viewCountries";
$route[ADMIN_URL.'/addCountry'] 					= "user/addCountry";
$route[ADMIN_URL.'/uploadCountry'] 					= "user/uploadCountry";
$route[ADMIN_URL.'/editCountry/(:num)'] 			= "user/editCountry/$1";
$route[ADMIN_URL.'/updateCountry'] 					= "user/updateCountry";

$route[ADMIN_URL.'/viewState'] 						= "user/viewState";
$route[ADMIN_URL.'/addState'] 						= "user/addState";
$route[ADMIN_URL.'/uploadState'] 					= "user/uploadState";
$route[ADMIN_URL.'/editState/(:num)/(:num)'] 		= "user/editState/$1/$2";
$route[ADMIN_URL.'/updateState'] 					= "user/updateState";

$route[ADMIN_URL.'/viewCity'] 						= "user/viewCity";
$route[ADMIN_URL.'/addCity'] 						= "user/addCity";
$route[ADMIN_URL.'/uploadCity'] 					= "user/uploadCity";
$route[ADMIN_URL.'/editCity/(:num)/(:num)/(:num)'] 	= "user/editCity/$1/$2/$3";
$route[ADMIN_URL.'/updateCity'] 					= "user/updateCity";
$route[ADMIN_URL.'/getStateByCountry'] 				= "user/getStateByCountry";
$route[ADMIN_URL.'/getCityByState']					= "user/getCityByState";

$route[ADMIN_URL.'/viewVehicle'] 					= "user/viewVehicle";
$route[ADMIN_URL.'/addVehicle'] 					= "user/addVehicle";
$route[ADMIN_URL.'/editVehicle'] 					= "user/editVehicle/";
$route[ADMIN_URL.'/deleteVehicle/(:num)']			= "user/deleteVehicle/$1";

/**************** Master Data Management ***************************************/

/**************** Super Admin Empoyee Route ************************************/
$route[ADMIN_URL.'/viewEmployee'] 				= "user/viewEmployee";
$route[ADMIN_URL.'/addEmployee'] 				= "user/addEmployee";
$route[ADMIN_URL.'/addNewEmployee'] 			= "user/addNewEmployee";
$route[ADMIN_URL.'/editEmployee/(:num)'] 		= "user/editEmployee/$1";
$route[ADMIN_URL.'/updateEmployee']				= "user/updateEmployee";
$route[ADMIN_URL.'/deleteEmployee/(:num)'] 		= "user/deleteEmployee/$1";

/**************** END Super Admin Empoyee Route ************************************/

/**************** Super Admin Vendor Route ************************************/
$route[ADMIN_URL.'/viewVendor'] 				= "user/viewVendor";
$route[ADMIN_URL.'/addVendor'] 					= "user/addVendor";
$route[ADMIN_URL.'/addNewVendor'] 				= "user/addNewVendor";
$route[ADMIN_URL.'/editVendor/(:num)'] 			= "user/editVendor/$1";
$route[ADMIN_URL.'/updateVendor']				= "user/updateVendor";
$route[ADMIN_URL.'/deleteVendor/(:num)'] 		= "user/deleteVendor/$1";

/**************** END Super Admin Vendor Route ************************************/

/**************** Super Admin Hotel Route ************************************/
$route[ADMIN_URL.'/viewHotelPartner'] 				= "user/viewHotelPartner";
$route[ADMIN_URL.'/activateHotelPartner/(:num)']	= "user/activateHotelPartner/$1";
$route[ADMIN_URL.'/deactivateHotelPartner/(:num)']  = "user/deactivateHotelPartner/$1";
$route[ADMIN_URL.'/viewHotel']						= "user/viewHotel";
$route[ADMIN_URL.'/editHotel/(:any)/(:any)']		= "user/editHotel/$1/$2";
$route[ADMIN_URL.'/viewInactiveHotel']				= "user/viewInactiveHotel";
$route[ADMIN_URL.'/activateHotel/(:any)']			= "user/activateHotel/$1";
$route[ADMIN_URL.'/deactivateHotel/(:any)']			= "user/deactivateHotel/$1";

/**************** END Super Admin Hotel Route ************************************/

/**************** Super Admin Partner Route ************************************/
$route[ADMIN_URL.'/viewPartner'] 				= "user/viewPartner";
$route[ADMIN_URL.'/addPartner']					= "user/addPartner";
$route[ADMIN_URL.'/addNewPartner']				= "user/addNewPartner";
$route[ADMIN_URL.'/editPartner/(:any)']	        = "user/editPartner/$1";
$route[ADMIN_URL.'/updatePartner']	            = "user/updatePartner";


/**************** END Super Admin Partner Route ************************************/

/**************** Super Admin Itinerary Route *********************************/

$route[ADMIN_URL.'/viewItinerary'] 					= "user/viewItinerary";
$route[ADMIN_URL.'/addItinerary']					= "user/addItinerary";
$route[ADMIN_URL.'/addItinerary/(:num)']			= "user/addItinerary/$1";
$route[ADMIN_URL.'/addItinerary/(:num)/(:num)']		= "user/addItinerary/$1/$2";
$route[ADMIN_URL.'/getItineraryState']				= "user/getItineraryState";
$route[ADMIN_URL.'/getItineraryCity']				= "user/getItineraryCity";
$route[ADMIN_URL.'/getDurationTables']				= "user/getDurationTables";
$route[ADMIN_URL.'/addNewItinerary']				= "user/addNewItinerary";
$route[ADMIN_URL.'/editItinerary/(:num)/(:num)']	= "user/editItinerary/$1/$2";
$route[ADMIN_URL.'/deleteItinerary/(:num)']			= "user/deleteItinerary/$1";
$route[ADMIN_URL.'/updateItinerary']				= "user/updateItinerary";

/**************** END Super Admin Itinerary Route ************************************/

/**************** Super Admin Activities Route ************************************/

$route[ADMIN_URL.'/addActivities']					= "user/addActivities";
$route[ADMIN_URL.'/addActivitiesByUnit']			= "user/addActivitiesByUnit";
$route[ADMIN_URL.'/viewActivities']					= "user/viewActivities";
$route[ADMIN_URL.'/viewPerUnitActivities']			= "user/viewPerUnitActivities";
$route[ADMIN_URL.'/addNewActivites']				= "user/addNewActivites";
$route[ADMIN_URL.'/addNewActivitesByUnit']			= "user/addNewActivitesByUnit";
$route[ADMIN_URL.'/editActivities/(:num)']			= "user/editActivities/$1";
$route[ADMIN_URL.'/updateActivites']				= "user/updateActivites";
$route[ADMIN_URL.'/deleteActivities/(:num)']		= "user/deleteActivities/$1";
$route[ADMIN_URL.'/deleteActivityRow/(:num)/(:num)/(:num)'] = "user/deleteActivityRow/$1/$2/$3";


/**************** END Super Admin Activities Route ************************************/

/**************** Super Admin Workout Route ************************************/

$route[ADMIN_URL.'/workout']								= "user/workout";
$route[ADMIN_URL.'/workout/(:any)']							= "user/workout/$1";
$route[ADMIN_URL.'/ViewsavedHotelPackages']		        	= "user/ViewsavedHotelPackages";
$route[ADMIN_URL.'/EditSavedHotelPackages/(:num)']		    = "user/EditSavedHotelPackages/$1";
$route[ADMIN_URL.'/UpdateHotelpackageConfirmation']		    = "user/UpdateHotelpackageConfirmation";
$route[ADMIN_URL.'/searchWorkout']							= "user/searchWorkout";
$route[ADMIN_URL.'/viewHotelDetails/(:any)/(:any)'] 		= "user/viewHotelDetails/$1/$2";
$route[ADMIN_URL.'/calculatePrice']							= "user/calculatePrice";
$route[ADMIN_URL.'/viewPackageDetails/(:any)/(:any)'] 		= "user/viewPackageDetails/$1/$2";
$route[ADMIN_URL.'/getHotelRoomsForPackage'] 				= "user/getHotelRoomsForPackage";
$route[ADMIN_URL.'/getVehicleVendorName']					= "user/getVehicleVendorName";
$route[ADMIN_URL.'/getpakageHotelPrice']					= "user/getpakageHotelPrice";

// $route[ADMIN_URL.'/checkingpackage/(:any)/(:any)']			= "user/checkingpackage/$1/$2";
//$route[ADMIN_URL.'/sendHotelEmailtoVendor']			= "user/sendHotelEmailtoVendor";



/**************** END Super Admin Workout Route ************************************/


/*********** END ADMIN DEFINED ROUTES *******************/

/*********** FRONT  HOTEL END ROUTES *******************/
$route['hotelRegistration'] 				              = "index/hotelRegistration";
$route['becomeHotelPartner']				              = "index/becomeHotelPartner";
$route['getStateByCountry']					              = "index/getStateByCountry";
$route['getCityByState']					              = "index/getCityByState";
$route['varifyHotelEmail/(:any)'] 			              = "index/varifyHotelEmail/$1";
$route['contactUs']                                       = "index/contactUs";
$route['hotelPartner']						              = "index/hotelPartner";
$route['forgotPasswordHotel']                             = "index/forgotPasswordHotel";
$route['resetPasswordHotelUser']                          = "index/resetPasswordHotelUser";
$route['resetPasswordConfirmUser']                        = "index/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)']                 = "index/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)']          = "index/resetPasswordConfirmUser/$1/$2";
$route['createHotelPartnerPasswordUser']                  = "index/createHotelPartnerPasswordUser";
$route['createHotelPartnerPasswordUser/(:any)/(:any)']    = "index/createHotelPartnerPasswordUser/$1/$2";
$route['getMealPlanDate/(:num)/(:num)']		              = "hotel/getMealPlanDate/$1/$2";
//$route[HOTEL.'/hotelLogout']                              = "hotel/hotelLogout";
$route[HOTEL.'/dashboard']					              = "hotel";
$route[HOTEL.'/Profile']                                  = "hotel/Profile";
$route[HOTEL.'/Profile/(:any)']                           = "hotel/Profile/$1";
$route[HOTEL.'/HotelUserProfileUpdate']                   = "hotel/HotelUserProfileUpdate";
$route[HOTEL.'/HotelUserProfileUpdate/(:any)']            = "hotel/HotelUserProfileUpdate/$1";
$route[HOTEL.'/changeHotelUserPassword']                  = "hotel/changeHotelUserPassword";
$route[HOTEL.'/changeHotelUserPassword/(:any)']           = "hotel/changeHotelUserPassword/$1";
$route[HOTEL.'/checkEmailExists']                         = "hotel/checkEmailExists";
//$route[HOTEL.'/checkEmailExists'] = "user/checkEmailExists";
$route[HOTEL.'/addHotel']					              = "hotel/addHotel";
$route[HOTEL.'/addHotel/(:any)']			              = "hotel/addHotel/$1";
$route[HOTEL.'/editHotel/(:any)/(:any)']	              = "hotel/editHotel/$1/$2";
$route[HOTEL.'/addNewHotel']				              = "hotel/addNewHotel";
$route[HOTEL.'/viewHotel']					              = "hotel/viewHotel";
$route[HOTEL.'/updateHotel']				              = "hotel/updateHotel";
$route[HOTEL.'/deleteHotel/(:any)']			              = "hotel/deleteHotel/$1";
$route[HOTEL.'/deleteRateTable']			              = "hotel/deleteRateTable";
$route[HOTEL.'/updateHotelImageCaption']	              = "hotel/updateHotelImageCaption";

/*********** FRONT  HOTEL END ROUTES *******************/

/*********** Partner Route *******************/
$route['partnerLogin']						= "login";
$route['loginPartner']						= "login/loginPartner";
$route['partnerRegister']                   = "login/partnerRegister";
$route[PARTNER.'/dashboard']				= "partner";
$route[PARTNER.'/getStateByCountry'] 		= "partner/getStateByCountry";
$route[PARTNER.'/getCityByState']			= "partner/getCityByState";
$route[PARTNER.'/addEmployee']				= "partner/addEmployee";
$route[PARTNER.'/addNewEmployee']			= "partner/addNewEmployee";
$route[PARTNER.'/viewEmployee']				= "partner/viewEmployee";
$route[PARTNER.'/editEmployee/(:num)']		= "partner/editEmployee/$1";
$route[PARTNER.'updateEmployee']			= "partner/updateEmployee";
$route[PARTNER.'/deleteEmployee/(:num)'] 	= "partner/deleteEmployee/$1";

/*********** Query Management Route *******************/
$route[PARTNER.'/addQuery']					= "partner/addQuery";
$route[PARTNER.'/addNewQuery']				= "partner/addNewQuery";
$route[PARTNER.'/viewQuery']				= "partner/viewQuery";
$route[PARTNER.'/viewQuery/(:any)']			= "partner/viewQuery/$1";
$route[PARTNER.'/editQuery/(:num)']			= "partner/editQuery/$1";
$route[PARTNER.'updateQuery']				= "partner/updateQuery";
$route[PARTNER.'/deleteQuery/(:num)'] 		= "partner/deleteQuery/$1";
$route[PARTNER.'/updateQueryHandledBy']		= "partner/updateQueryHandledBy";
$route[PARTNER.'/queryInHand']			 	= "partner/queryInHand";
$route[PARTNER.'/confirmedQuery']			= "partner/confirmedQuery";
$route[PARTNER.'/canceledQuery']			= "partner/canceledQuery";
$route[PARTNER.'/queryStatusConfirmed/(:num)'] = "partner/queryStatusConfirmed/$1";
$route[PARTNER.'/queryStatusCanceled']		= "partner/queryStatusCanceled";
$route[PARTNER.'/undoConfirmed/(:num)']		= "partner/undoConfirmed/$1";
$route[PARTNER.'/exportQuery']				= "partner/exportQuery";
$route[PARTNER.'/UndoPushQuery/(:num)']		= "partner/UndoPushQuery/$1";
$route[PARTNER.'/importQuery']				= "partner/importQuery";
$route[PARTNER.'/addImportedQuery']			= "partner/addImportedQuery";
$route[PARTNER.'/markQueryColor']			= "partner/markQueryColor";
$route[PARTNER.'/deleteMassQuery']			= 'partner/deleteMassQuery';
$route[PARTNER.'/updateMassQueryHandledBy']	= "partner/updateMassQueryHandledBy";
$route[PARTNER.'/advanceQuerySearch']		= "partner/advanceQuerySearch";
$route[PARTNER.'/updateRecordPerPage']		= "partner/updateRecordPerPage";
/*********** End Query Management Route *******************/

//$route[PARTNER.'/Workout']			        = "partner/Workout";

/*********** Client Management Route *******************/
$route[PARTNER.'/addClient']				= "partner/addClient";
$route[PARTNER.'/viewClient']				= "partner/viewClient";
$route[PARTNER.'/viewClient/(:any)']		= "partner/viewClient/$1";
$route[PARTNER.'/editClient/(:num)']		= "partner/editClient/$1";
$route[PARTNER.'/deleteClient/(:num)']		= "partner/deleteClient/$1";
$route[PARTNER.'/addNewClient']				= "partner/addNewClient";
$route[PARTNER.'/deleteMassClient']			= "partner/deleteMassClient";
$route[PARTNER.'/deleteClient/(:num)']		= "partner/deleteClient/$1";
$route[PARTNER.'/updateClient']				= "partner/updateClient";
$route[PARTNER.'/advanceClientSearch']		= "partner/advanceClientSearch";
/*********** End Client Management Route *******************/

/*********** Hotel Management Route *******************/
$route[PARTNER.'/addHotel']					= "partner/addHotel";
$route[PARTNER.'/addHotel/(:any)']			= "partner/addHotel/$1";
$route[PARTNER.'/addNewHotel']				= "partner/addNewHotel";
$route[PARTNER.'/viewHotel']				= "partner/viewHotel";
$route[PARTNER.'/editHotel/(:any)/(:any)']	= "partner/editHotel/$1/$2";
$route[PARTNER.'/updateHotel']				= "partner/updateHotel";
$route[PARTNER.'/deleteHotel/(:any)']		= "partner/deleteHotel/$1";
/*********** End Hotel Management Route *******************/

$route[PARTNER.'/TourCard']                 = "partner/TourCard";

/*********** Hotel and Package Workout Management Route *******************/

$route[PARTNER.'/HotelworkoutPannel']			   = "partner/HotelworkoutPannel";
$route[PARTNER.'/PackageworkoutPannel']			   = "partner/PackageworkoutPannel";
$route[PARTNER.'/searchWorkout']			       = "partner/searchWorkout";
$route[PARTNER.'/viewHotelDetails/(:any)/(:any)']  = "partner/viewHotelDetails/$1/$2";
$route[PARTNER.'/editSearchedHoteldata']		   = "partner/editSearchedHoteldata";
$route[PARTNER.'/viewPackageDetails/(:any)/(:any)']= "partner/viewPackageDetails/$1/$2";

/*********** End Hotel Package Workout Management Route *******************/