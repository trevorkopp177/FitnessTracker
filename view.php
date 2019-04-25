<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		#home {
			position: fixed;
			top: 0;
			right: 0;
			width: 25px;
			height: 25px;
		}
		
		#logo {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 40%;
	}
	
	.header {
		background-color: #6fa8dc;
		padding: 10px;
	}
	
	.main {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		align-content: space-between;
	}
	</style>
</head>

<body style="background-color:LightCyan;">

<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "MyFitnessTracker";

$workout = $_POST["workout"];
$id = $_SESSION['id'];
$date = $_POST["day"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["day"]) & $date != ""){
$sql = "SELECT * FROM Workouts WHERE type = '$workout' and date = '$date' and userId = '$id'";
} else {
$sql = "SELECT * FROM Workouts WHERE type = '$workout' and userId = '$id' ORDER BY date DESC";
}
$result = $conn->query($sql);
?>

<div class="header">
	<img src="logo.png" alt="FitnessTracker">
</div>
<div class="main">
<h2>Workout Log</h2>
<br>Past <?php echo $workout ?> workouts...<br>
<br>
<a href="student_home.html"><img src="home.png" alt="MyHome" id="home"></a>
<table class="auto-style2" style="width: 56%">
	<tr>
		<td style="width: 243; height: 23" class="auto-style1">Date</td>
		<td style"width: 229px; height: 23px;">Weight</td>
		<td style="width: 229px; height: 23px;">Sets</td>
		<td style="width: 229px; height: 23px;">Reps</td>
	</tr>
	<?php
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<tr><td style=\"width: 243; height: 2\" class=\"auto-style3\">";
				echo $row["date"];
				echo "</td><td style=\"width: 229px\" class=\"auto-style3\">";
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
</div>
<?php
$conn->close();
?>
</body>
</html>