<?php
    session_start();
?>
<html>
    <head>
        <title>
            COVID-CT: Settings
        </title>
        <link rel="stylesheet" href="style.css">
        <div id="topBar">
            <h1>COVID - 19 Contact Tracing</h1>
        </div>
        <div class="container">
            <div class="left-element">
                <ul>
                    <li><a onclick="document.location='home.php'">Home</a></li>
                    <li><a onClick="document.location='overview.php'">Overview</a></li>
                    <li><a onClick="document.location='visit.php'">Add Visit</a></li>
                    <li><a onClick="document.location='report.php'">Report</a></li>
                    <li><a onClick="document.location='settings.php'" class="active">Settings</a></li>
                    <li class="bottom1"><a onClick="document.location='logout.php'">Logout</a></li>
                </ul>
            </div>
            <div class ="right-element">
                <p class="status">Alert Settings</p>
                <div class="reports">
                    <br>
                    Here you may change the alert distance and time span for which contract tracing will be performed.
                    <br>
                    <br>
                    <br>
                    <br>
                    <form  action="./distance.php" method="POST" class="form3">
                        Window:
                        <input type="text" name="window" class="dandt" class="inputs1">
                        <br>
                        <br>
                        Distance:
                        <input type="text" name="distance" class="dandt" class="inputs1">
                        <br>                            
                        <br>
                        <input type="submit" value="Report" class="report">
                    </form>
                    <button id="cancel2" onclick="document.location='home.php'" class="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </head>
</html>