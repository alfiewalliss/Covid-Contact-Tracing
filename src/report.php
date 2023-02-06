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
                    <li><a onClick="document.location='overview.php'">Overview</a></li>
                    <li><a onClick="document.location='visit.php'">Add Visit</a></li>
                    <li><a onClick="document.location='report.php'" class="active">Report</a></li>
                    <li><a onClick="document.location='settings.php'">Settings</a></li>
                    <li class="bottom1"><a onClick="document.location='logout.php'">Logout</a></li>
                </ul>
            </div>
            <div class ="right-element">
                <p class="status">Report an Infection</p>
                <div class="reports">
                    <br>
                    Please report the date and time when you were tested positive for COVID - 19.
                    <br>
                    <br>
                    <br>
                    <br>
                    <form  action="./reportProcess.php" method="POST" class="form3">
                        <input placeholder="Date" type="text" onfocus="(this.type='date')" name="date" class="dandt" class="inputs1">
                        <br>
                        <br>
                        <input placeholder="Time" type="text" onfocus="(this.type='time')" name="time" class="dandt" class="inputs1">
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