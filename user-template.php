<?php
include('connection.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>user template PHP</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    </head>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 60%;
    width:80%;
    border:5px solid black;
    
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

.custom-map-control-button {
  appearance: button;
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  cursor: pointer;
  margin: 10px;
  padding: 0 0.5em;
  height: 40px;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
}
.custom-map-control-button:hover {
  background: #ebebeb;
}</style>

    <body>
        <?php


        $sq = "SELECT * FROM organisations";

        $id = $_GET['id'];
        $sq = "SELECT * FROM organisations WHERE uniqueID='$id'";

        echo"It has been changed";
        echo "<b> <center>Database Output</center> </b> <br> <br>";
        echo '<a href="user-template.php?id=1"> 2 </a>';
        if ($result = $conn->query($sq)) {

            while ($row = $result->fetch_assoc()) {
                $email = $row["email"];
                $orgName = $row["orgName"];
                $uniqueID = $row["uniqueID"];
                $orgID = $row["orgID"];


                echo '<b>'.$email.'</b><br />';
                echo '<b>'.$uniqueID.'</b><br />';

            }

        /*freeresultset*/
        $result->free();
        }

        ?>
           <div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUXw2Q25Iny7SAVTCOg4oKYvp2w-s_VA8&callback=initMap&libraries=&v=weekly" async></script>
            <script>
                // Note: This example requires that you consent to location sharing when
                // prompted by your browser. If you see the error "The Geolocation service
                // failed.", it means you probably did not give permission for the browser to
                // locate you.
                let map, infoWindow;

                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: {
                            lat: -34.397
                            , lng: 150.644
                        }
                        , zoom: 18
                    , });
                    infoWindow = new google.maps.InfoWindow();
                    const locationButton = document.createElement("button");
                    locationButton.textContent = "Pan to Current Location";
                    locationButton.classList.add("custom-map-control-button");
                    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                    locationButton.addEventListener("click", () => {
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    const pos = {
                                        lat: position.coords.latitude
                                        , lng: position.coords.longitude
                                    , };
                                    infoWindow.setPosition(pos);
                                    infoWindow.setContent("You are here!.");
                                    infoWindow.open(map);
                                    map.setCenter(pos);
                                }, () => {
                                    handleLocationError(true, infoWindow, map.getCenter());
                                });
                        }
                        else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    });
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
                    infoWindow.open(map);
                }
            </script>
    </body>

    </html>