<?php # about_me.php
$page_name = 'About Me';
session_start(); // Access existing session for login information
include ('includes/header.html');
?>

<!-- start content -->
<div id="leftnav">
	<ul>
		<li><a href="about_me.php">&nbsp&nbspAbout Me &nbsp</a></li>
		<li><a href="life_timeline.php">P H Timeline </a></li>
		<li><a href="food_map.php">Favorite Food in Austin</a></li>
  	</ul>
</div>
<br>
<h1>Early Life</h1>
<p>-Although little about me is known, I started my life in Columbus Ohio on December 18, 1989. 
<br><br>-I spent very little time enjoying their cold winters before I found myself in Kindergarden here in Texas in the year 1994.
<br><br>-Growning up in North DFW's upcoming surbian complex in the early 90s I found myself building forts and playing sports.
<br><br>-From childhood activities came driving at 16 and working my first job (Haagan Dazs), to graduation from Flower Mound High School in 2008.</p>
<br><br>-Upon graduation I worked and traveled for a brief time - enjoying freedom and the world.</p>

<h2>College</h2>
<p>-First day of classes was xxxxxx. First semester of college made the deans list.
<br><br>-Originally I was a business major with a focus on business management. However, after a trip to PA where I talked to my uncle a data miner I decided to come back to Texas State University and take a computer science class.
<br><br>-Growning up in North DFW's upcoming surbian complex in the early 90s I found myself building forts and playing sports.
<br><br>-From childhood activities came driving at 16 and working my first job (Haagan Dazs), to graduation from Flower Mound High School in 2008.</p>

<h2>Post-College</h2>
<p>-First day of classes was xxxxxx. First semester of college made the deans list.
<br><br>-From childhood activities came driving at 16 and working my first job (Haagan Dazs), to graduation from Flower Mound High School in 2008.</p>


<script>
	$( ".right_target" ).contextmenu(function() {
	  alert( "Handler called." );
	});

	function myOpen(url) {
			newwindow=window.open(url,'name','height=200,width=150');
			if (window.focus) {newwindow.focus()
		}
		return false;
	}
</script>


<!-- close content -->
<?php
include ('includes/footer.html');
?>