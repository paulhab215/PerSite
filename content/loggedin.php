<?php # Page to show user they are logged in
session_start(); // Start session

// If no present session value then redirect the user to log in
// Validate the HTTP_USER_AGENT
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {
	require ('includes/login_functions.inc.php');
	redirect_user();	
}

// Set the page title and header
$page_name = 'Logged In!';
include ('includes/header.html');

echo "<h1>Logged In!</h1><p><a href=\"logout.php\">Logout</a></p>";

include ('includes/footer.html');
?>