<?php # Script 3.4 - index.php
$page_title = 'Favorite foods!';
session_start(); // Access the existing session.
include ('includes/header.html');
?>  
  <div id="leftnav">
    <ul>
      <li><a href="about_me.php">&nbsp&nbspAbout Me &nbsp</a></li>
      <li><a href="life_timeline.php">P H Timeline </a></li>
      <li><a href="food_map.php">Favorite Food in Austin</a></li>
    </ul>
  </div>
  <h1>Is your Favorite my Favorite?</h1>
  <p>Below are my top choices of food places in Austin - you can click on the name of each place to see where they are located within the city and also find more information in their infowindow. I have only been here for a year so am not a veteran in Austin food but with more time I will cover more territory.</p>

  <div id="foodlist">
    <table align="center" cellspacing="0" cellpadding="5" width="75%">
      <tr>
        <td align="left"><b>Name</b></td>
      </tr>
    </table>
  </div>
  <br>
  <br>
  <div class="map_canvas" id="map" style="width: 1300px; height: 500px"></div>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCReRGxwYW71hK5_AdwvxTkv0WN6lp5EpI&callback"></script>
  <script type="text/javascript">
    var map;
    var geocoder;
    var infoWindow;
    var clicked = false;

    function initMap(){
      geocoder = new google.maps.Geocoder();
       infoWindow = new google.maps.InfoWindow({
        maxWidth: 550
      });
      map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(30.430243, -97.696589),
        zoom: 12
      });
      
      downloadUrl('search_food.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        for (var i = 0; i < markers.length; i++) {
          var name    = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var bio     = markers[i].getAttribute("bio");
          var yelp    = markers[i].getAttribute("yelp");
          var foodpic = markers[i].getAttribute("foodpic");

          codeAddress(name, address, bio, yelp, foodpic);
        }
      });
    }

    function codeAddress(name, searchAddr, bio, yelplink, foodpic){
      var address = searchAddr;
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          var html = "<div id='mapContent'>";
          html += "<h1 class='mapName'>" + name + "</h1><p> (" + address + ")</p></div><div id='mapBody'><img src='includes/food" + foodpic + ".jpg' class='foodDetails'><p>" + bio + "<br/><br/>Check it on out on <a href = "+ yelplink +">yelp</a>!</p></div>";
          map.setCenter(results[0].geometry.location);
          createMarker(results[0].geometry.location,html);              
        }
      });
    }

    function createMarker(latlng,html){
      var marker = new google.maps.Marker({
        position: latlng,
        map: map
      }); 

      google.maps.event.addListener(marker, 'mouseover', function() { 
        if (!clicked) {
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        }
      });
        
      google.maps.event.addListener(marker, 'mouseout', function() { 
        if (!clicked) {
          infoWindow.close();
        }
      });

      // CLICK EVENT LISTENER
      google.maps.event.addListener( marker, 'click', function() {
          clicked = true;
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
          // trying to hide the button
          // $( '.infoWindow' ).parent().parent().siblings().find( 'img' ).hide();
          //$( '[src="http://maps.gstatic.com/mapfiles/mv/imgs8.png"]' ).hide();
      });

      // trying to close the winddow on click
      google.maps.event.addListener(infoWindow, 'closeclick', function(){       
          clicked = false;
      });
    }



    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCReRGxwYW71hK5_AdwvxTkv0WN6lp5EpI&callback=initMap">
  </script>

<?php
include ('includes/footer.html');
?>