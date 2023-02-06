<?php session_start();

$window = (int)$_POST["window"];
$distance = (int)$_POST["distance"];
$user = $_SESSION["user"];
    
$servername = "localhost";
$username = "Alfie";
$password = "ALF0706!@$";
$dbname = "webdev";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
echo "Connected successfully<BR>";

$sql = "UPDATE users SET window = '$window', distance = '$distance' WHERE BINARY username = '$user'";
$_SESSION["duration"] = $window;
$_SESSION["distance"] = $distance;
if (mysqli_query($conn, $sql))
{
    echo '<script> alert("Settings successfully updated"); window.location.href="home.php"; </script>';
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>