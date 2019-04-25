<html>
<body>

<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "MyFitnessTracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$workout = $_POST["workout"];
$sets = $_POST["sets"];
$reps = $_POST["reps"];
$wt = $_POST["wt"];
$id = $_SESSION['id'];
$date = $_POST["day"];

$sql = "INSERT INTO Workouts (type, sets, reps, weight, userID, date) VALUES ('$workout', '$sets', '$reps', '$wt', '$id', '$date')";



if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM Users WHERE id = '$id'";
	$result = $conn->query($sql);
	session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['row']);
   
	if (!isset($_SESSION['row'])) { 
		$_SESSION['row'] = $row;        
		header("location: user_post.php");	
	}
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

</body>
</html>