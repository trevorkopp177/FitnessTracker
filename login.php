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



$sql = "SELECT * FROM Users WHERE usrname = '$myusername' and password = '$mypassword'";

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    session_start();
    $row = $result->fetch_assoc();
	unset($_SESSION['row']);
   
	if (!isset($_SESSION['row'])) { 
		if($userType == "coach"){
			$_SESSION['row'] = $row;        
			header("location: coach_home.php");
		} else {
			$_SESSION['row'] = $row;        
			header("location: student_home.php");
		}
	}
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>
</body>
</html>