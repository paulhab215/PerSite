<?php # process login submission

// Check form submittal:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	require ('includes/login_funcs.php');
	require ('../mysqli_connect.php');

	// Verify Login credintials
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) { // success
		
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['first_name'] = $data['first_name'];
		
		// Store HTTP_USER_AGENT:
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		redirect_user('loggedin.php');
			
	} else { // unsuccessful

		// Assign $data to $errors for login_page.inc.php:
		$errors = $data;

	}
		
	mysqli_close($dbc);

}
?>