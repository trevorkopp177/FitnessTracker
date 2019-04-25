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
$sgroup = $_POST["subgroup"];

if (isset($_POST["workout"]) & $subgroup == "all"){
	$sql = "SELECT id FROM Users";
} else {
	$sql = "SELECT id FROM Users WHERE subgroup = '$sgroup'";
}
$result = conn->query($sql);

$stmt = $conn->prepare("INSERT INTO Suggested (type, sets, reps, weight, date, userID) VALUES ('$workout', '$sets', '$reps', '$wt', '$date', ?)");
$stmt->bind_param("i", $ath);

if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		$ath = $row["id"];
		$stmt->execute();
	}
}

$stmt->close();
if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM Coaches WHERE id = '$id'";
	$result = $conn->query($sql);
	session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['row']);
   
	if (!isset($_SESSION['row'])) { 
		$_SESSION['row'] = $row;        
		header("location: admin_post.php");	
	}
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

</body>
</html>