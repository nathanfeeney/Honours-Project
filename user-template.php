<?php
include('connection.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>user template PHP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" crossorigin="anonymous"> </head>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    </style>

    <body>
        <?php
        $id = $_GET['id'];
        $sq = "SELECT * FROM organisations, offers, events WHERE organisations.uniqueID='$id' AND
        offers.orgID = organisations.orgID AND
        events.orgID = organisations.orgID";
    
    

        if ($result = $conn->query($sq)) {

            while ($row = $result->fetch_assoc()) {
                $email = $row["email"];
                $orgName = $row["orgName"];
                $uniqueID = $row["uniqueID"];
                $orgID = $row["orgID"];
                $offTitle = $row["offer"];
                $offDesc = $row["offDescription"];
                
                


              //  echo '<b>'.$email.'</b><br />';
              //  echo '<b>'.$uniqueID.'</b><br />';

            }

        /*freeresultset*/
        $result->free();
        }

        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <?php echo '<h1 id="orgH1">'.$orgName.'</h1>'?> </div>
                </div>
                <div class="row" id="orgDetails">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h2>Current Offers</h2>
        </button>
                            </h5> </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="desc">
                                        <?php
                                            $getOffers = "SELECT * FROM offers WHERE orgID='$orgID'";
                                            $result = $conn->query($getOffers);
                                            $i = $result->num_rows;
                                           
                                            if ($i > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {
                                                echo "<h2>"
                                                    .$row["offer"]
                                                    . "</h2>"
                                                    . "<br>"
                                                    . "<article>" .$row["offDescription"]
                                                    . "</article>" 
                                                    . "<hr>";
                                              }
                                            } else {
                                              echo "0 results";
                                            }
                                        ?>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h2>Our Menus</h2>
        </button>
                            </h5> </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h2>Upcoming Events</h2>
        </button>
                            </h5> </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body"> <?php
                                            $getEvents = "SELECT * FROM events WHERE orgID='$orgID'";
                                            $result = $conn->query($getEvents);
                                            if ($result->num_rows > 0) {
                                              // output data of each row
                                              while($row = $result->fetch_assoc()) {
                                                echo "<h2>"
                                                    .$row["eventTitle"]
                                                    . "</h2>"
                                                    . "<br>"
                                                    . "<article>" .$row["eventDesc"]
                                                    . "</article>" 
                                                    . "<hr>";
                                              }
                                            } else {
                                              echo "0 results";
                                            }
                                        ?></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          <h2>Your Current location </h2>
        </button>
                            </h5> </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUXw2Q25Iny7SAVTCOg4oKYvp2w-s_VA8&callback=initMap&libraries=&v=weekly" async></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                            posL = 5;
                            window.alert(posL);
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