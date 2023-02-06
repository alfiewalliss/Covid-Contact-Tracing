<?php
    session_start();
?>
<html>
    <head>
        <title>
            COVID-CT: Home Page
        </title>
        <link rel="stylesheet" href="style.css">
        <div id="topBar">
            <h1>COVID - 19 Contact Tracing</h1>
        </div>
        <div class="container">
            <div class="left-element">
                <ul>
                    <li><a onclick="document.location='home.php'" class="active">Home</a></li>
                    <li><a onClick="document.location='overview.php'">Overview</a></li>
                    <li><a onClick="document.location='visit.php'">Add Visit</a></li>
                    <li><a onClick="document.location='report.php'">Report</a></li>
                    <li><a onClick="document.location='settings.php'">Settings</a></li>
                    <li class="bottom1"><a onClick="document.location='logout.php'">Logout</a></li>
                </ul>
            </div>
            <div class ="right-element">
                <p class="status">Status</p>
                <div class="main">
                    <br>
                    <div class="left-element1">
                        Hi 
                        <?php
                            echo ($_SESSION["name"]);
                        ?>, you might have had a connection to an infected person at the location shown in red.
                        <div class="bottom">
                            Click the marker to see details about the infection.
                        </div>
                    </div>
                    <div class="right-element1" id="right-element1">
                    </div>
                </div>
            </div>
        </div>
        <?php
            $locations = [];
            $url = "ml-lab-7b3a1aae-e63e-46ec-90c4-4e430b434198.ukwest.cloudapp.azure.com:60999/infections?ts=1";
            $handle = curl_init();                
            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_HTTPGET, true);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, false);
            $output = curl_exec($handle);
            if ($output !==false) {
                $locations = json_decode($output, true);
                echo '<script>
                    function placeMarker(x, y, date, time, duration) {
                        var img = document.createElement("img");
                        img.src = "marker_black.png";
                        img.id = "markerHome";
                        img.name = "markerHome";                                        
                        img.setAttribute("style", "position:relative;");
                        img.style.marginLeft = x + "px";
                        img.style.marginTop = y + "px";
                        document.getElementById("right-element1").appendChild(img);
                    }
                     function placeMarkerO(x, y) {
                        var img = document.createElement("img");
                        img.src = "marker_red.png";
                        img.id = "markerAppear";
                        img.name = "markerAppear";                                        
                        img.setAttribute("style", "position:absolute;");
                        img.style.marginLeft ="0px";
                        img.style.marginTop ="0px";
                        img.style.width = "100000px";
                        img.style.height = "100000px";
                        document.getElementById("right-element1").appendChild(img);
                    }</script>';
                foreach($locations as $location)
                {
                    $x = $location["x"];
                    $y = $location["y"];
                    $date = $location["date"];
                    $time = $location["time"];
                    $duration = $location["duration"];
                                        
                    $servername = "localhost";
                    $username = "Alfie";
                    $password = "ALF0706!@$";
                    $dbname = "webdev";
                    $user = $_SESSION["user"];
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM visits WHERE BINARY username = '$user'";
                    $result = $conn->query($sql);    
                    if ($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc()) {
                            if(sqrt(pow(($x-$y), 2) + (pow(($row["x"] - $row["y"]), 2))) < $_SESSION["distance"]) {
                                echo "<script>placeMarker('$x', '$y', '$date', '$time', '$duration');
                                </script>";
                            }
                        }
                    }
                    
                    $conn->close();
                }
                $servername = "localhost";
                $username = "Alfie";
                $password = "ALF0706!@$";
                $dbname = "webdev";
                $user = $_SESSION["user"];
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM visits WHERE BINARY username = '$user'";
                $result = $conn->query($sql);    
                if ($result->num_rows > 0) 
                {  
                    while($row = $result->fetch_assoc()) {
                        echo "<script>placeMarkerO('$row[x]', '$row[y]');</script>";
                    }
                }
            } else {
                echo 'Curl-Error: ' . curl_error($handle);
            }
        ?>
    </head>
</html>