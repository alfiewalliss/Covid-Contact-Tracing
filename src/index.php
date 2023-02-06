<?php
    session_start();
?>
<html>
    <head>
        <title>
            COVID-CT: Login
        </title>
        <link rel="stylesheet" href="style.css">
        <div id="topBar">
            <h1>COVID - 19 Contact Tracing</h1>
        </div>
        <div>
            <br>
            <br>
            <div class="hero">
                <form action="login.php" method="POST" class="form1">
                    <input type="text" name="Username" placeHolder="Username" class="inputs">
                    <br>
                    <br>
                    <input type="password" name="Password" placeHolder="Password" class="inputs">
                    <br>
                    <br>
                    <br>
                    <input id="submit" type="submit" value="Submit" class = "all">
                </form>
                <button id="cancel" href="google.com" class="all">Cancel</button>
                <br>
                <br>
                <button id="register" onclick="document.location='register.php'" class="all">Register</button>
            </div>
        </div>
    </head>
    <body>
      
    </body>
</html>