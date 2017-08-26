<?php # Update password.
$page_name = 'Change Password';
session_start(); 
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('../mysqli_connect.php');
		
	$updateerrors = array(); // error array
	
	// Check Credintials:
	if (empty($_POST['email'])) {
		$updateerrors[] = 'You did not enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	if (empty($_POST['pass'])) {
		$updateerrors[] = 'You did not ente your current password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$updateerrors[] = 'Passwords did not match.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$updateerrors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($updateerrors)) { // success

		// Check they've entered right email password/address pair
		$query = "SELECT user_id FROM users WHERE (email='$e' AND pass=SHA1('$p') )";
		$result = @mysqli_query($dbc, $query);
		$num = @mysqli_num_rows($result);
		if ($num == 1) { // success	

			// Get the user_id
			$rowinfo = mysqli_fetch_array($result, MYSQLI_NUM);

			// Make the UPDATE query:
			$query = "UPDATE users SET pass=SHA1('$np') WHERE user_id=$rowinfo[0]";		
			$result = @mysqli_query($dbc, $query);
			
			if (mysqli_affected_rows($dbc) == 1) { // success

				// Print a message.
				echo '<h1>Thank you!</h1><p><br /></p>';	

			} else { // unsuccessful

				echo '<h1>Error</h1>
				<p class="error">User info could not be changed due to a system error.</p>'; 
	
				//debug
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query . '</p>';
	
			}

			mysqli_close($dbc);

			include ('includes/footer.html'); 
			exit();
				
		} else { // Invalid password/address pair.
			echo '<h1>Error!</h1>
			<p class="error">The password and email address do not match those on file.</p>';
		}
		
	} else { // Report errors

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($updateerrors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	
	} 

	mysqli_close($dbc); 
		
}
?>
<h1>Change Password</h1>
<form action="password.php" method="post">
	<p>Email Address: <input type="text" size="20" name="email" maxlength="55" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Current Password: <input name="pass" type="password" size="10" maxlength="22" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"  /></p>
	<p>New Password: <input name="pass1" type="password" size="10" maxlength="22" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm New Password: <input name="pass2" type="password" size="10" maxlength="22" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Change Password" /></p>
</form>
<?php include ('includes/footer.html'); ?>