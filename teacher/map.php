<?php
  
$lat=$_GET["lat"];
 $lng=$_GET["lng"];
echo $lat;
echo $lng;
 ?>
 <!DOCTYPE html>
<html>
  <head>
      <title>SBAC</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
   <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUzWmUZCWlkr8-79HNtgnUAUSGAJnBYg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <script>
      "use strict";

      let map;

      function initMap() {
        const mapOptions = {
          zoom: 17,
          center: {
            lat: <?php echo $lat; ?>,
            lng: <?php echo $lng; ?>
          }
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
         
          position: {
            lat: <?php echo $lat; ?>,
            lng: <?php echo $lng; ?>
          },
          map: map
        });

        const infowindow = new google.maps.InfoWindow({
          content: "<p>Marker Location:" + marker.getPosition() + "</p>"
        });
        google.maps.event.addListener(marker, "click", () => {
          infowindow.open(map, marker);
        });
      }
    </script>
    
    <div id="map"></div>
 
  </body>
</html>