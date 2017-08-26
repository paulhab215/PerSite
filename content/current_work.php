<?php # What I am currently doing and working on
$page_name = 'Current Work';
session_start(); // Access existing session.
include ('includes/header.html');
?>
	<div id="leftnav">
		<ul>
			<li><a href="current_work.php">Current Work</a></li>
			<li><a href="current_work.php">Data</a></li>
			<li><a href="current_work.php">Google Maps API</a></li>
			<li><a href="current_work.php">ODBC</a></li>
	  </ul>
	</div>
	<h1>Current Work</h1>
	<br>
	<div id="click-menu">
		<div class="left_target" onclick="myOpen('right_click_pop.html');"><h4>Left-click here</h4></div>
		<div class="right_target"><h4>Right-click here</h4></div>
	</div>
<?php
include ('includes/footer.html');
?>