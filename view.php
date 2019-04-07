<html>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "MyFitnessTracker";

$workout = $_POST["workout"];
$id = $_POST["id"];
$date = $_POST["day"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["day"]) & $date != ""){
$sql = "SELECT * FROM Workouts WHERE type = '$workout' and date = '$date' and userId = '$id'";
} else {
$sql = "SELECT * FROM Workouts WHERE type = '$workout' and userId = '$id' ORDER BY date ASC";
}
$result = $conn->query($sql);
?>
<h2>Workout Log</h2>
<br>For <?php echo $workout ?><br>
<br>
<table class="auto-style2" style="width: 56%">
	<tr>
		<td style="width: 243; height: 23" class="auto-style1">Weight</td>
		<td style="width: 229px; height: 23px;">Sets</td>
		<td style="width: 229px; height: 23px;">Reps</td>
	</tr>
	<?php
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<tr><td style=\"width: 243; height: 2\" class=\"auto-style3\">";
				echo $row["weight"];
				echo "</td><td style=\"width: 229px\" class=\"auto-style3\">";
				echo $row["sets"];
				echo "</td><td style=\"width: 229px\" class=\"auto-style3\">";
				echo $row["reps"];
				echo "</td></tr>";
			}
		}
	?>
</table>

<?php
$conn->close();
?>
</body>
</html>