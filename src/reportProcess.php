<?php session_start();
?>
<html>
    <head>
        <form name="addjson" action="./report_medium.php" method="POST" id="form">
            <input type="hidden" name="x">
            <input type="hidden" name="y">
            <input type="hidden" name="date">
            <input type="hidden" name="time">
            <input type="hidden" name="duration">
        </form>
    </head>
</html>

<?php
$date = $_POST["date"];
$time = $_POST["time"];
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

$sql = "INSERT INTO reports (username, date, time) Values ('$user', '$date','$time')";
if (mysqli_query($conn, $sql))
{
    $sql1 = "SELECT * FROM visits WHERE username='$user'";
    $result = $conn->query($sql1);
    while($row = $result->fetch_assoc()) {
        $x = $row['x'];
        $y = $row['y'];
        $time = $row['time'];
        $date = $row['date'];
        $duration = $row['duration'];
        echo "<script>
            document.forms['addjson']['x'].value = '$x';
            document.forms['addjson']['y'].value = '$y';
            document.forms['addjson']['date'].value = '$date';
            document.forms['addjson']['time'].value = '$time';
            document.forms['addjson']['duration'].value = '$duration';
            document.getElementById('form').submit();
        </script>";
    }
    echo '<script> alert("Report successfully recorded"); window.location.href="home.php"; </script>';
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>