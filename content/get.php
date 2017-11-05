<?php 

require ('../mysqli_connect.php');
// error_log("inside", 3, "errors.txt");

$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request   = json_decode($postdata);
    $username  = preg_replace('/[^a-zA-Z ]/','',$request->username);
    $pass 	   = preg_replace('/[^0-9 ]/','',$request->pass);

	// Check login
	list ($check, $data) = login_errors($dbc, $username, $pass);

	if ($check) { // success

		echo json_encode('success');
		// Set session data
		// session_start();
		// $_SESSION['user_id'] = $data['user_name'];
		
		// // Store HTTP_USER_AGENT
		// $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		// redirect_user('loggedin.php');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for login_page.inc.php
		$errors = $data;

		// Print error messages
		if (isset($errors) && !empty($errors)) {
			$Errorlisting = '<h2>Error!</h2><br/><p class=\"error\">';
			foreach ($errors as $msg) {
				$Errorlisting .=  " - ";
				$Errorlisting .=  "$msg";
				$Errorlisting .= "<br/>";
			}
			$Errorlisting .= '<br/><br/>';
		}
		echo json_encode($Errorlisting);

	}
		
	mysqli_close($dbc);
}

/* validates form data ( email and password). */
function login_errors($dbc, $username = '', $pass = '') {

	$errors = array(); 
	error_log("inside login!", 3, "errors.txt");

	// Validate username:
	if (empty($username)) {
		$errors[] = 'You must input a user name';
	} else {
		$username = mysqli_real_escape_string($dbc, trim($username));
	}

	// Validate password:
	if (empty($pass)) {
		$errors[] = 'You must enter a password';
	} else {
		$pass = mysqli_real_escape_string($dbc, trim($pass));
	}

	if (empty($errors)) { 
	error_log("inside empty!", 3, "errors.txt");

		// Retrieve the user_id and first_name for that username/password combination:
		$q = "SELECT first_name FROM users WHERE email='$username' AND pass=SHA1('$pass')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
			error_log("inside query", 3, "errors.txt");

		// Check the result:
		if (mysqli_num_rows($r) == 1) {
			error_log("inside record", 3, "errors.txt");

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'I don\'t have any users with that username/password combination';
		}
		
	} 
	
	// Return false and the errors:
	return array(false, $errors);
} 



// //Form submission - if so which type register/login
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// 	}else if(isset($_POST['register'])){

// 		require ('includes/register_funcs.php');
// 		require ('../mysqli_connect.php');

// 		// Check login
// 		list ($check, $data) = register_errors($dbc, $_POST['user_name'], $_POST['first_name'],$_POST['pass_main1'],$_POST['pass_main2'],$_POST['prov_key']);

// 		if ($check) { 
// 			session_start();
// 			$_SESSION['user_id'] = $data['user_name'];
			
// 			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

// 			redirect_user('loggedin.php');
				
// 		} else { // Unsuccessful!

// 			// Assign $data to $errors for login_page.inc.php:
// 			$errors = $data;

// 			// Print error messages
// 			if (isset($errors) && !empty($errors)) {
// 				$Errorlisting = '<h2>Error!</h2><br/><p class=\"error\">';
// 				foreach ($errors as $msg) {
// 					$Errorlisting .=  " - ";
// 					$Errorlisting .=  "$msg";
// 					$Errorlisting .= "<br/>";
// 				}
// 				$Errorlisting .= '<br/><br/>';
// 				$SubmitType = "register";
// 			}

// 		}
// 		mysqli_close($dbc);
// 	}
// }
?>
