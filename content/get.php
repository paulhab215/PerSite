<?php 
error_log("You messed up!", 3, "errors.txt");

// //Form submission - if so which type register/login
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	require ('../mysqli_connect.php');

// 	// Check login
// 	list ($check, $data) = login_errors($dbc, $_POST['user_name'], $_POST['pass_main']);

// 	if ($check) { // success

// 		// Set session data
// 		session_start();
// 		$_SESSION['user_id'] = $data['user_name'];
		
// 		// Store HTTP_USER_AGENT
// 		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

// 		redirect_user('loggedin.php');
			
// 	} else { // Unsuccessful!

// 		// Assign $data to $errors for login_page.inc.php
// 		$errors = $data;

// 		// Print error messages
// 		if (isset($errors) && !empty($errors)) {
// 			$Errorlisting = '<h2>Error!</h2><br/><p class=\"error\">';
// 			foreach ($errors as $msg) {
// 				$Errorlisting .=  " - ";
// 				$Errorlisting .=  "$msg";
// 				$Errorlisting .= "<br/>";
// 			}
// 			$Errorlisting .= '<br/><br/>';
// 			$SubmitType = "login";
// 		}

// 	}
		
// 	mysqli_close($dbc);


?>
