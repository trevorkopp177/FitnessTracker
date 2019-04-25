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

$sql = "INSERT INTO Coaches (firstname, lastname, usrname, password) VALUES ('$fname', '$lname', '$uname', '$passwd')";

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