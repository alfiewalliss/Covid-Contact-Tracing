<?php
    session_start();
?>
<html>
    <head>
        <title>
            COVID-CT: Registration
        </title>
        <link rel="stylesheet" href="style.css">
        <div id="topBar">
            <h1>COVID - 19 Contact Tracing</h1>
        </div>
        <div id="hero">
            <br>
            <br>
            <div id="registration" class="hero">
                <form name="registration" method="POST" action="insert.php" onsubmit="return validateForm()">
                    <input type="text" name="Name" placeHolder="Name" class="inputs">
                    <br>
                    <br>
                    <input type="text" name="Surname" placeHolder="Surname" class="inputs">
                    <br>
                    <br>
                    <input type="text" name="Username" placeHolder="Username" class="inputs">
                    <br>
                    <br>
                    <input type="password" name="Password" placeHolder="Password" class="inputs">
                    <br>
                    <br>
                    <br>
                    <input id="register" type="submit" value="Register" class = "all">
                </form>
            </div>
        </div>
    </head>
    <body>
        <script>
            function validateForm() 
            {
                var bool = true
                var contentU = document.forms["registration"]["Username"].value
                var contentP = document.forms["registration"]["Password"].value
                var contentN = document.forms["registration"]["Name"].value
                var contentS = document.forms["registration"]["Surname"].value

                //Presence check
                if (contentU == "" || contentP == "" || contentN == "" || contentS == "") 
                {
                    alert("Please fill out all fields")
                    bool = false
                }
                //Capital check
                else if (contentP == contentP.toLowerCase)
                {
                    alert("Password requires a capital")
                    bool = false
                }
                //Length check
                else if (contentP.length < 6 || contentP.length > 13)
                {
                    alert("Password must be between 6 and 13 characters")
                }
                // Special character check
                else
                {
                    var Chars = "*|,\":<>[]{}`';()@&$#%!€^-_+=}{?/."
                    var bool1 = false
                    for (i = 0; i < contentP.length; i++) 
                    {
                        if(Chars.indexOf(contentP.charAt(i)) != -1)
                        {
                            bool1 = true
                        }
                    }
                    if (bool1 == false)
                    {
                        bool = false
                        alert("Please add a special character to password")
                    }
                }
                return bool
            }
        </script>
    </body>
</html>