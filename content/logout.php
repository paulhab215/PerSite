<?php # Allows logout of site

session_start(); // Access existing session

// check for session var
if (!isset($_SESSION['user_id'])) {

	require ('includes/login_funcs.php');
	redirect_user();	
	
} else { // wipe session

	$_SESSION = array(); // Clear variables.
	session_destroy(); // Destroy session 
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy cookie.

}

include ('index.php');

?>