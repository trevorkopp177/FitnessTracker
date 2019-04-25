<?php
if (isset($_POST["export"])){
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "MyFitnessTracker";

$workout = $_POST["workout"];
$id = $_SESSION['id'];
$date = $_POST["day"];
$sgroup = $_POST["subgroup"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$output = fopen("log.csv", "w");
fputcsv($output, array("First Name", "Last Name", "Weight", "Reps", "Sets"));
$sql = "SELECT weight, reps, sets FROM Workouts WHERE type = '$workout' and date = '$date' and userId IN (SELECT id FROM Users WHERE subgroup = '$sgroup')";
$result = $conn->query($sql);

while($row1 = $result->fetch_assoc()){
	$tmp = $row1["id"];
	$name = "SELECT firstname, lastname FROM Users WHERE id = '$tmp'";
	$result2 = $conn->query($name);
	$row2 = $result2->fetch_assoc();
	$row = array_merge($row2, $row1);
	fputcsv($output, $row);
}

$fclose($output);
}

if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM Coaches WHERE id = '$id'";
	$result = $conn->query($sql);
	session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['row']);
   
	if (!isset($_SESSION['row'])) { 
		$_SESSION['row'] = $row;        
		header("location: coach_home.php");	
	}
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>