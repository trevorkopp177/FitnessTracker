<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "MyFitnessTracker";



$myusername = $_POST["username"];
$mypassword= $_POST["password"];
$userType= $_POST["userType"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST["userType"]) & $userType == "coach"){
	$sql = "SELECT * FROM Coaches WHERE usrname = '$myusername' and password = '$mypassword'";
} else {
	$sql = "SELECT * FROM Users WHERE usrname = '$myusername' and password = '$mypassword'";
}

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['id']);
   
	if (!isset($_SESSION['id'])) { 
		if($userType == "coach"){
			$_SESSION['id'] = $row["id"];        
			header("location: coach_home.html");
		} else {
			$_SESSION['id'] = $row["id"];        
			header("location: student_home.html");
		}
	}
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>
</body>
</html>