<?php
/**
 * Open Source Social Network
 *
 * @package Open Source Social Network
 * @author    Open Social Website Core Team <info@softlab24.com>
 * @copyright © SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
define('LoginAs', ossn_route()->com . 'LoginAs/');
/**
 * Login as init
 *
 * @return void
 */
function loginas_init() {
		if(ossn_isAdminLoggedin()) {
				ossn_register_action('loginas', LoginAs . 'actions/login.php');
				//login as user one-at a time,  so login back to admin to login to as new user again.
				if(!ossn_loginas_user()) {
						ossn_register_callback('page', 'load:profile', 'ossn_loginas_menu', 201);
				}
		}
		if(ossn_loginas_user()) {
				ossn_extend_view('ossn/js/head', 'loginas/js');
				ossn_register_action('loginas/back', LoginAs . 'actions/back.php');
		}
		ossn_extend_view('css/ossn.default', 'loginas/css');
}
/** 
 * Login as menu 
 * Set menu for the Login as in user profile
 *
 * @return void
 */
function ossn_loginas_menu() {
		$user    = ossn_get_page_owner_guid();
		$loginas = ossn_site_url("action/loginas?guid={$user}", true);
		ossn_register_menu_link('loginas', ossn_print('loginas'), $loginas, 'profile_extramenu');
}
/**
 * Load the administrator user that login as specific user
 *
 * @return boolean|object
 */
function ossn_loginas_user() {
		if(isset($_SESSION['LOGIN_AS']) && forceObject($_SESSION['LOGIN_AS']) instanceof OssnUser) {
				$user  = forceObject($_SESSION['LOGIN_AS']);
				if($user->isAdmin()) {
						return $user;
				}
		}
		return false;
}
ossn_register_callback('ossn', 'init', 'loginas_init');