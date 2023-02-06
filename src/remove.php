<?php session_start();

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

$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($conn,$_POST['id']);
}
if($id > 0){

  // Check record exists
  $checkRecord = $conn->query("SELECT * FROM visits WHERE id=".$id);
  $totalrows = $checkRecord->num_rows;

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM visits WHERE id=".$id;
    $conn->query($query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

echo 0;
exit;