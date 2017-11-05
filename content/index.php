<?php # Main Page
$page_name = 'Welcome to the Site!';
session_start(); 
$SubmitType = "";

?>
<!-- 
<?php 

//Form submission - if so which type register/login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['login'])){
		require ('includes/login_funcs.php');
		require ('../mysqli_connect.php');

		// Check login
		list ($check, $data) = login_errors($dbc, $_POST['user_name'], $_POST['pass_main']);

		if ($check) { // success

			// Set session data
			session_start();
			$_SESSION['user_id'] = $data['user_name'];
			
			// Store HTTP_USER_AGENT
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

			redirect_user('loggedin.php');
				
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
				$SubmitType = "login";
			}

		}
			
		mysqli_close($dbc);

	}else if(isset($_POST['register'])){

		require ('includes/register_funcs.php');
		require ('../mysqli_connect.php');

		// Check login
		list ($check, $data) = register_errors($dbc, $_POST['user_name'], $_POST['first_name'],$_POST['pass_main1'],$_POST['pass_main2'],$_POST['prov_key']);

		if ($check) { 
			session_start();
			$_SESSION['user_id'] = $data['user_name'];
			
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

			redirect_user('loggedin.php');
				
		} else { // Unsuccessful!

			// Assign $data to $errors for login_page.inc.php:
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
				$SubmitType = "register";
			}

		}
		mysqli_close($dbc);
	}
}
?> -->

<!DOCTYPE html>
<html lang="en-us" ng-app="myApp">
    <head>
	<title><?php echo $page_name; ?></title>	
	<link rel="stylesheet" href="includes/style1.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

 	<link rel="stylesheet" href="includes/style1.css" type="text/css" media="screen" />   
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> 
    <script src="//code.angularjs.org/1.6.0-rc.1/angular.min.js"></script>
    <script src="//code.angularjs.org/1.6.0-rc.1/angular-route.min.js"></script>
    <script src="app.js"></script>    


<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

  	<style>
	  label {
	    display: inline-block;
	    width: 5em;
	  }
  </style>
  <style type="text/css"> .map_canvas img { max-width: none; } </style>
</head>
<body>
	<div id="header">
		<h1>Paul</h1>
		<h2>Habjanetz</h2>
	</div>

    <div class="container">
        <div ng-view></div>
	</div>

	<div id="footer">
		<p>Copyright &copy; <a href="about_me.php">Paul Habjanetz</a> 2016 | Designed by <a href="about_me.php">Paul Habjanetz</a> | Hosted by <a href="http://www.opendesigns.org/">Open Designs</a> | <a href="https://www.reddit.com/"> Front Page of Internet </a></p>
	</div>
<script type="text/javascript">
		// var SubmitErrors = "<?=$Errorlisting?>";
		// var SubmitType 	 = "<?=$SubmitType?>";

		// var images = [];
		// var imagestext = [];
		// x = 0;

		// images[0] = "includes/old_man.jpg";
		// images[1] = "includes/two_people_computer.jpg";
		// images[2] = "includes/girl_computer.png";
		// imagestext[0] = '<br><p style="font-size: 125%;"><b>\"Even old people like myself can do it! \"</b></p><br><p align="right" style="font-size:155%;">-Mike Johnson</p>';
		// imagestext[1] = '<br><p style="font-size: 125%;"><b>\"We prefer it as a group. \"</b></p><br><p align="right" style="font-size:155%;">-Taylor & Bianca</p>';
		// imagestext[2] = '<br><p style="font-size: 125%;"><b>\"I still remember the first time I logged in.. \"</b></p><br><p align="right" style="font-size:155%;">-Ashley Turnbill</p>';

		// function changeImage()
		// {
		//     var img = document.getElementById("img");
		//     var imgtext = document.getElementById("imgtext");
		//     img.src = images[x];
		//     imgtext.innerHTML = imagestext[x];
		//     x++;

		//     if(x >= images.length){
		//         x = 0;
		//     } 
		//     setTimeout("changeImage()", 7000);
		// }

		// setTimeout("changeImage()", 7000);

		// $( document ).ready(function() {
		// 	if(SubmitErrors == ""){
		// 		$( "#menuitem1" ).html( '<div class="pop"><h1>log·in</h1><p><i>(lôɡˌin,ˈläɡˌin) noun</i></p><br><p>an act of logging in to a computer, database, or system.</p><br><br><br><p>"Do you hold the keys to the kingdom?"</p><p align="right">-Paul Habjanetz</p></div>' );
		// 		$( "#menuitem2" ).html( '<div class="pop"><h1><u>Testimonials</u></h1><img id="img" src="includes/girl_computer.png" style="width: 600px; height: 375px;border: 15px solid #8a3e3c; padding: 10px;"><p id="imgtext">The Testimonials are on a loop - be patient - all good things come in time.</p></div>' );
		// 		$( "#menuitem3" ).html( '<div class="pop"><p>Temporarily under construction.</p></div>' );

		// 	}else{
		// 		if(SubmitType == "login"){
		// 			$( "#menuitem1" ).html( '<div class="permahover"><div class="loginwrapper">'+ SubmitErrors +'<form class="login" method="post"><input type="hidden" name="login" value="login" /><input type="text" placeholder="Username" maxlength="20" name="user_name" autofocus value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>"/> <i class="fa fa-user"></i> <input type="password" name="pass_main" placeholder="Password" maxlength="40" value="<?php if (isset($_POST['pass_main'])) echo $_POST['pass_main']; ?>" /> <i class="fa fa-key"></i> <a id="forgotpass" href="#">Forgot your password?</a><button><i class="spinner"></i> <span class="state">Check Credintials</span></button></form></div></div>');	
		// 			$( "#menuitem2" ).html( '' );
		// 			$( "#menuitem3" ).html( '' );
		// 		}else{
		// 			$( "#menuitem1" ).html( '' );
		// 			$( "#menuitem2" ).html( '<div class="permahover"><div class="loginwrapper">'+ SubmitErrors +'<form class="login" method="post"><input type="hidden" name="register" value="register"/><input type="text" name="user_name" placeholder="Username" autofocus maxlength="20" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>" /><i class="fa fa-user"></i><input type="text" name="first_name" placeholder="First Name" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /><i class="fa fa-user"></i><input type="password" name="pass_main1" placeholder="Password" maxlength="40" value="<?php if (isset($_POST['pass_main1'])) echo $_POST['pass_main1']; ?>" /><i class="fa fa-key"></i><input type="password" name="pass_main2" placeholder="Confirm Password" maxlength="40" value="<?php if (isset($_POST['pass_main2'])) echo $_POST['pass_main2']; ?>" /><i class="fa fa-key"></i><input type="password" name="prov_key" placeholder="Provided Key" maxlength="40" value="<?php if (isset($_POST['prov_key'])) echo $_POST['prov_key']; ?>" /><i class="fa fa-key"></i><a id="forgotpass" href="#">Don\'t have a key?</a><button><i class="spinner"></i><span class="state">Launch Creation</span></button></form></div></div>');
		// 			$( "#menuitem3" ).html( '' );
		// 		}

		// 	}	
		// });

		// $("#loginspan").on("click", function () {

		// 	$( "#menuitem1" ).html( '<div class="permahover"><div class="loginwrapper"><form class="login" method="post"></br></br></br></br></br></br><input type="hidden" name="login" value="login" /><input type="text" placeholder="Username" maxlength="20" name="user_name" autofocus value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>"/> <i class="fa fa-user"></i> <input type="password" name="pass_main" placeholder="Password" maxlength="40" value="<?php if (isset($_POST['pass_main'])) echo $_POST['pass_main']; ?>" /> <i class="fa fa-key"></i> <a id="forgotpass" href="#">Forgot your password?</a><button><i class="spinner"></i> <span class="state">Check Credintials</span></button></form></div></div>' );
		// 	var script = document.createElement( 'script' );
		// 	script.type = 'text/javascript';
		// 	script.src = "logi.js";
		// 	$("#loginspan").append( script );
		// 	$( "#menuitem2" ).html( '' );
		// 	$( "#menuitem3" ).html( '' );
		// 	$("#loginspan").css("background-color", "#8a3e3c");
		// 	$("#createspan").css("background-color", "");
		// 	$("#earnspan").css("background-color", "");
		// });

		// $("#createspan").on("click", function () {
		// 	$( "#menuitem1" ).html( '' );
		// 	$( "#menuitem2" ).html( '<div class="permahover"><div class="loginwrapper"><form class="login" method="post"><input type="hidden" name="register" value="register"/><input type="text" name="user_name" placeholder="Username" autofocus maxlength="20" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name']; ?>" /><i class="fa fa-user"></i><input type="text" name="first_name" placeholder="First Name" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /><i class="fa fa-user"></i><input type="password" name="pass_main1" placeholder="Password" maxlength="40" value="<?php if (isset($_POST['pass_main1'])) echo $_POST['pass_main1']; ?>" /><i class="fa fa-key"></i><input type="password" name="pass_main2" placeholder="Confirm Password" maxlength="40" value="<?php if (isset($_POST['pass_main2'])) echo $_POST['pass_main2']; ?>" /><i class="fa fa-key"></i><input type="password" name="prov_key" placeholder="Provided Key" maxlength="40" value="<?php if (isset($_POST['prov_key'])) echo $_POST['prov_key']; ?>" /><i class="fa fa-key"></i><a id="forgotpass" href="#">Don\'t have a key?</a><button><i class="spinner"></i><span class="state">Launch Creation</span></button></form></div></div>');
		// 	var script = document.createElement( 'script' );
		// 	script.type = 'text/javascript';
		// 	script.src = "logi.js";
		// 	$("#createspan").append( script );
		// 	$( "#menuitem3" ).html( '' );
		// 	$("#loginspan").css("background-color", "");
		// 	$("#createspan").css("background-color", "#ad4e4c");
		// 	$("#earnspan").css("background-color", "");
		// });


		// $("#earnspan").on("click", function () {
		// 	$( "#menuitem1" ).html( '<div class="pop"><h1>log·in</h1><p><i>(lôɡˌin,ˈläɡˌin) noun</i></p><br><p>an act of logging in to a computer, database, or system.</p><br><br><br><p>"Do you hold the keys to the kingdom?"</p><p align="right">-Paul Habjanetz</p></div>' );
		// 	$( "#menuitem2" ).html( '<div class="pop"><img id="img" src="includes/food5.jpg" style="width: 600px; height: 375px;border: 15px solid #8a3e3c; padding: 10px;"><p id="imgtext">sss</p></div>' );
		// 	$( "#menuitem3" ).html( '<div class="pop"><p>Temporarily under construction.</p><img src="includes/construction.jpg" width="313" height="216" align="middle"></div>' );	
		// 	$("#loginspan").css("background-color", "");
		// 	$("#createspan").css("background-color", "");
		// 	$("#earnspan").css("background-color", "bf6f6d");
		// });

	</script>
    <script>
	    	
	// $( "#login" ).submit(function( event ) {
	//   alert( "Handler for .submit() called." );
	//   event.preventDefault();
	// });
    </script>
</body>
</html>
