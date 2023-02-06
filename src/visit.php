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
                    <li><a onClick="document.location='visit.php'" class="active">Add Visit</a></li>
                    <li><a onClick="document.location='report.php'">Report</a></li>
                    <li><a onClick="document.location='settings.php'">Settings</a></li>
                    <li class="bottom1"><a onClick="document.location='logout.php'">Logout</a></li>
                </ul>
            </div>
            <div class ="right-element">
                <p class="status">Add a new Visit</p>
                <div class="main">
                    <br>
                    <div class="left-element2">
                        <form name="add" action="./visitProcess.php" method="POST" class="form" onsubmit="return validateForm()">
                            <input placeholder="Date" type="text" onfocus="(this.type='date')" name="date">
                            <br>
                            <br>
                            <input placeholder="Time" type="text" onfocus="(this.type='time')" name="time" step="1">
                            <br>
                            <br>
                            <input type="text" name="duration" placeholder="Duration(mins)" class="input1">
                            <br>
                            <br>
                            <input type="hidden" name="x">
                            <input type="hidden" name="y">
                            <input type="submit" value="Add" class="bottom3">
                        </form>
                        <button id="cancel" onclick="document.location='home.php'" class="bottom2">Cancel</button>
                    </div>
                    <div id="clickable" class="right-element1">
                        <img id="markerAppear" style="display: none" src="marker_red.png"/>
                    </div>
                </div>
            </div>
        </div>
    </head>
    <body>
        <script>
            var clicked = false;
            document.getElementById("clickable").addEventListener("click", userClicked);
            var x = 0;
            var y = 0;
            function userClicked(event) {
                var rect = event.target.getBoundingClientRect();
                x = Math.round(event.pageX - rect.left - 300 - 16);
                y = Math.round(event.clientY - rect.top - 27);
                var image = document.getElementById("markerAppear");
                image.style.display = '';
                image.style.position = 'absolute';
                image.style.marginLeft = x + 'px';
                image.style.marginTop = y + 'px';
                document.forms["add"]["x"].value = x;
                document.forms["add"]["y"].value = y;
                clicked = true;
            }
            
            function validateFrom() {
                var bool = false;
                if (clicked == true) {
                    bool = true;
                    var date = document.forms["add"]["date"].value;
                    var time = document.forms["add"]["time"].value;
                    var year = date.substr(date.length - 4);
                    var month = date.substr(3, 5);
                    var day = date.substr(0, 2)
                    date = year + "-" + month + "-" + day;
                    time = time + ":00";
                    alert(time);
                    document.forms["add"]["date"].value = date;
                    document.forms["add"]["time"].value = time;
                }
                return bool;
            }

        </script>
    </body>
</html>