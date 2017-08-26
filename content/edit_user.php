<?php # Editing a user record.
$page_name = 'Edit a User';
include ('includes/header.html');
echo '<h1>Edit a User</h1>';

// Check for a valid user ID
if ( (isset($_GET['user_id'])) && (is_numeric($_GET['user_id'])) ) { // From view_users.php
	$id = $_GET['user_id'];
} elseif ( (isset($_POST['user_id'])) && (is_numeric($_POST['user_id'])) ) { // Form submission.
	$id = $_POST['user_id'];
} else { // No valid ID
	echo '<p class="error">This page is erroneous.</p>';
	include ('includes/footer.html'); 
	exit();
}
require ('../mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$loginerrors = array();
	
	// Check for missing user infor:
	if (empty($_POST['first_name'])) {
		$loginerrors[] = 'You did not input a first name.';
	} else {
		$first = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	if (empty($_POST['last_name'])) {
		$loginerrors[] = 'You did not input a last name.';
	} else {
		$last = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	if (empty($_POST['email'])) {
		$loginerrors[] = 'You did not input an email.';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($loginerrors)) { // If errors is empty
	
		//  Verify unique email address:
		$query = "SELECT user_id FROM users WHERE email='$email' AND user_id != $id";
		$r = @mysqli_query($dbc, $query);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$query = "UPDATE users SET first_name='$first', last_name='$last', email='$email' WHERE user_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $query);
			if (mysqli_affected_rows($dbc) == 1) { // success
				// Print a message:
				echo '<p>You just edited the user.</p>';	
				
			} else {
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $query . '</p>'; // Debugging message.
			}
				
		} else { // Already a user
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} else { // Show loginerrors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($loginerrors as $errormsg) { // Print each error.
			echo " - $errormsg<br />\n";
		}
		echo '</p><p>Better Luck Next time.</p>';
	
	} 
}

// Retrieve the user's information:
$query = "SELECT first_name, last_name, email FROM users WHERE user_id=$id";		
$r = @mysqli_query ($dbc, $query);

if (mysqli_num_rows($rows) == 1) { // Valid user

	// Get the user's info
	$idrow = mysqli_fetch_array ($rows, MYSQLI_NUM);
	
	// Edit form
	echo '<form action="edit_user.php" method="post">
<p>First Name: <input type="text" size="15" name="first_name" maxlength="15" value="' . $idrow[0] . '" /></p>
<p>Last Name: <input type="text" size="15" name="last_name" maxlength="30" value="' . $idrow[1] . '" /></p>
<p>Email Address: <input type="text" size="20" name="email" maxlength="60" value="' . $idrow[2] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Non valid user
	echo '<p class="error">This page is erroneous.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.html');
?>