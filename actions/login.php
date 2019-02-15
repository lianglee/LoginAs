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
$guid = input('guid');
$user = ossn_user_by_guid($guid);
if($user){
	 OssnSession::assign('LOGIN_AS',  ossn_loggedin_user());
	 OssnSession::assign('OSSN_USER', $user);
}
redirect(REF);