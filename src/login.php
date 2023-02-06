<?php session_start();
    $servername = "localhost";
    $username = "Alfie";
    $password = "ALF0706!@$";
    $dbname = "webdev";

    $user = $_POST["Username"];
    $pass = $_POST["Password"];
    $_SESSION["user"] = "";
    $_SESSION["name"] = "";
    
    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE BINARY username = '$user' AND BINARY password = '$pass'";
    $result = $conn->query($sql);
    $_SESSION["user"] = $user;
    
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) {
            $_SESSION["name"] = $row["name"];
            $_SESSION["duration"] = $row["window"];
            $_SESSION["distance"] = $row["distance"];
        }
        header("Location: home.php");
    } else {
        echo '<script> alert("Error, incorrect username or password"); window.location.href="index2.html"; </script>';
    }
    $conn->close();
?>