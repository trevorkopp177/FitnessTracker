<html>
<body>

<?php
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

$uname = $_POST["username"];
$passwd = $_POST["password"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$coach = $_POST["coach"];
$sgroup = $_POST["subgroup"];


$tmp = "SELECT id FROM Coaches WHERE usrname = '$coach'";
$result = $conn->query($tmp);
$row = $result->fetch_assoc();
$coachID = $row["id"];

$sql = "INSERT INTO Users (firstname, lastname, usrname, password, coach, subgroup) VALUES ('$fname', '$lname', '$uname', '$passwd', '$coachID', '$sgroup')";

if ($conn->query($sql) === TRUE) {
    echo "Sign up successfully!";
    header("location: index.html");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

</body>
</html>