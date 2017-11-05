<?php # Main Page
$page_name = 'Welcome to the Site!';
session_start(); 
$SubmitType = "";
?>
<!DOCTYPE html>
<html lang="en-us" ng-app="myApp">
    <head>
	<title><?php echo $page_name; ?></title>	
 		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="UTF-8">
        <!-- load bootstrap builds out the navbar-default -->


<!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> 
        <script src="//code.angularjs.org/1.3.0-rc.1/angular.min.js"></script>
        <script src="//code.angularjs.org/1.3.0-rc.1/angular-route.min.js"></script>
        <script src="app.js"></script>   
	 	<link rel="stylesheet" href="includes/style1.css" type="text/css" media="screen" />   
<!-- 	  <style type="text/css"> .map_canvas img { max-width: none; } </style>
 -->	
	</head>
	<body>
		<div id="header">
			<a href="#">
				<h1>Paul</h1>
				<h2>Habjanetz</h2>
			</a>
		</div>
        <div class="content">
            <div ng-view></div>
		</div>
	<div id="footer">
		<p>Copyright &copy; <a href="about_me.php">Paul Habjanetz</a> 2016 | Designed by <a href="about_me.php">Paul Habjanetz</a> | Hosted by <a href="http://www.opendesigns.org/">Open Designs</a> | <a href="https://www.reddit.com/"> Front Page of Internet </a></p>
	</div>



    </body>
</html>