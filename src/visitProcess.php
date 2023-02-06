<?php session_start();

$user = $_SESSION["user"];
$date = $_POST["date"];
$time = $_POST["time"];
$duration = $_POST["duration"];
$x = $_POST["x"];
$y = $_POST["y"];
    
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

$sql = "INSERT INTO visits (username, date, time, duration, x, y) Values ('$user', '$date','$time', '$duration', '$x', '$y')";

if (mysqli_query($conn, $sql))
{
    echo '<script> alert("Visit successfully added"); window.location.href="home.php"; </script>';
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);

?>