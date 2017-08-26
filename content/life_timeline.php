<?php # Script 3.4 - index.php
$page_name = 'Life Timeline';
session_start(); // Access the existing session.
include ('includes/header.html');
?>
<h2>Timeline of Paul</h2>
<br>
<div id="leftnav">
	<ul>
		<li><a href="about_me.php">&nbsp&nbspAbout Me &nbsp</a></li>
		<li><a href="life_timeline.php">P H Timeline </a></li>
		<li><a href="food_map.php">Favorite Food in Austin</a></li>
  </ul>
</div>
<ul class="timeline">
    <li>
        <div class="line-event"><a><i class="fa fa-circle" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column"><h4>Birth Day</h4></div>
               <div class="right-column"><h4>12/18/1989</h4></div>
            </div>
            <div class="timeline-content">
                <p>Although little about me is known, I started my life in Columbus Ohio on December 18, 1989.</p>
            </div>
        </div>
    </li>
    
    <li class="line-flipped">
        <div class="line-event"><a><i class="fa fa-circle invert" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column-flipped"><h4>Hello Texas</h4></div>
               <div class="right-column-flipped"><h4>04/01/1994</h4></div>
            </div>
            <div class="timeline-content">
                <p>I spent very little time enjoying their cold winters before I found myself in Kindergarden here in Texas in the year 1994.</p>
            </div>
        </div>
    </li>
    
    <li>
        <div class="line-event"><a><i class="fa fa-circle" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column"><h4>ph 123</h4></div>
               <div class="right-column"><h4>12/18/1989</h4></div>
            </div>
            <div class="timeline-content">
                <p>Advenientibus aliorum eam ad per te sed. Facere debetur aut veneris accedens.</p>
            </div>
        </div>
    </li>
    
    <li class="line-flipped">
        <div class="line-event"><a><i class="fa fa-circle invert" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column-flipped"><h4>ph 123</h4></div>
               <div class="right-column-flipped"><h4>12/18/1989</h4></div>
            </div>
            <div class="timeline-content">
                <p>Volvitur ingreditur id ait mea vero cum autem quod ait Cumque ego illum vero cum unde beata. Commendavi si non dum est in. Dionysiadem tuos ratio puella ut casus, tunc lacrimas effunditis magister cives Tharsis. Puellae addita verbaque' capellam sanctissima quid, apollinem existimas filiam rex cum autem quod tamen adnuente rediens eam est se in. Peracta licet ad nomine Maria non ait in modo compungi mulierem volutpat.</p>
            </div>
        </div>
    </li>
    
    <li>
        <div class="line-event"><a><i class="fa fa-circle" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column"><h4>ph 123</h4></div>
               <div class="right-column"><h4>12/18/1989</h4></div>
            </div>
            <div class="timeline-content">
                <p>Adfertur guttae sapientiae ducitur est Apollonius ut a a his domino Lycoridem in lucem. Theophile atque bona dei cenam veniebant est cum. Iusto opes mihi Tyrum in modo compungi mulierem ubi augue eiusdem ordo quos vero diam omni catervis famulorum. Bene dictis ut diem finito servis unde.</p>
            </div>
            <div class="timeline-footer">
                <img src="includes/dog.jpg" width="313" height="216" align="middle">
            </div>
        </div>
    </li>
    
    <li  class="line-flipped">
        <div class="line-event"><a><i class="fa fa-circle invert" id=""></i></a></div>
        <div class="line-event-panel">
            <div class="line-heading">
               <div class="left-column-flipped"><h4>ph 123</h4></div>
               <div class="right-column-flipped"><h4>12/18/1989</h4></div>
            </div>
            <div class="timeline-content">
                <p>Crede respiciens loco dedit beneficio ad suis alteri si puella eius in. Acceptis codicello lenonem in deinde plectrum anni ipsa quod eam est Apollonius.</p>
            </div>
            <div class="timeline-footer primary">
                <img src="includes/dog.jpg" width="313" height="216" align="middle">
            </div>
        </div>
    </li>
    <li class="clearfix no-float"></li>
</ul>


<?php
include ('includes/footer.html');
?>