<?php session_start();

$name = $_POST["Username"];
$password1 = $_POST["Password"];
$first_name = $_POST["Name"];
$surname = $_POST["Surname"];
    
$servername = "localhost";
$username = "Alfie";
$password = "ALF0706!@$";
$dbname = "webdev";
$_SESSION["user"] = "";
$_SESSION["name"] = "";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
echo "Connected successfully<BR>";

$sql1 = "SELECT * FROM users WHERE BINARY username = '$name'";
$result = $conn->query($sql1);

if ($result->num_rows == 0) 
{
    $sql = "INSERT INTO users (username, password, name, surname, window, distance) Values ('$name', '$password1','$first_name', '$surname', 2, 200)";

    if (mysqli_query($conn, $sql))
    {
        $_SESSION["user"] = $name;
        $_SESSION["name"] = $first_name;
        $_SESSION["duration"] = "2";
        $_SESSION["distance"] = "200";
        echo '<script> alert("Account successfully created"); window.location.href="home.php"; </script>';
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else
{
    echo '<script> alert("Username already taken"); window.location.href="register.html"; </script>';
}

mysqli_close($conn);

?>