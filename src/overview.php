<?php
    session_start();
?>
<html>
    <head>
        <title>
            COVID-CT: Visits Overview
        </title>
        <link rel="stylesheet" href="style.css">
        <div id="topBar">
            <h1>COVID - 19 Contact Tracing</h1>
        </div>
        <div class="container">
            <div class="left-element">
                <ul>
                    <li><a onclick="document.location='home.php'">Home</a></li>
                    <li><a onClick="document.location='overview.php'" class="active">Overview</a></li>
                    <li><a onClick="document.location='visit.php'">Add Visit</a></li>
                    <li><a onClick="document.location='report.php'">Report</a></li>
                    <li><a onClick="document.location='settings.php'">Settings</a></li>
                    <li class="bottom1"><a onClick="document.location='logout.php'">Logout</a></li>
                </ul>
            </div>
            <div class="right-element2">
                <table class="table2">
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Duration</th>
                        <th>X</th>
                        <th>Y</th>
                        <th> </th>
                    </tr>
                        <?php
                            $user = $_SESSION["user"];
                            $servername = "localhost";
                            $username = "Alfie";
                            $password = "ALF0706!@$";
                            $dbname = "webdev";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            $sql = "SELECT id, date, time, duration, x, y FROM visits WHERE username='$user'";
                            $result = $conn->query($sql);

                            while($row = $result->fetch_assoc()) {  //Creates a loop to loop through results
                                echo "<tr><td>" . $row['date'] . "</td><td>" . $row['time'] . "</td><td>" . $row['duration'] . "</td><td>" . $row['x'] . "</td><td>" . $row['y'] . "</td><td><button id='stop' class='delete' data-id=" . $row['id'] . ">X</button></td></tr>";
                            }

                            echo "</table>"; //Close the table in HTML

                            $conn->close();
                        ?>
            </div>
        </div>
    </head>
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){

            // Delete 
            $('.delete').click(function(){
                var el = this;
  
                // Delete id
                var deleteid = $(this).data('id');
                
                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'remove.php',
                        type: 'POST',
                        data: { id:deleteid },
                        success: function(response){

                            if(response == 1){
                                // Remove row from HTML Table
                                $(el).closest('tr').css('background','tomato');
                                $(el).closest('tr').fadeOut(0,function(){
                                    $(this).remove();
                                });
                            }else{
	                           alert('Invalid ID.'); 
                            }

                        }
                    });
                }

            });

        });
        
        </script>
    
    </body>
</html>