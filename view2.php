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
	
	table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: DarkBlue;
  color: white;
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
$sgroup = $_POST["subgroup"];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Workouts WHERE type = '$workout' and date = '$date' and userId IN (SELECT id FROM Users WHERE subgroup = '$sgroup')";

$result = $conn->query($sql);
?>

<div class="header">
	<img src="logo.png" alt="FitnessTracker">
</div>
<div class="main">
<h2>Workout Log</h2>
<br><?php echo $workout ?> workouts...<br>
<br>
<a href="student_home.html"><img src="home.png" alt="MyHome" id="home"></a>

<div>
<form method="post" action="export.php">
	<input type="submit" name="export" value="Export">
</form>
</div>

<table class="auto-style2" style="width: 56%">
	<tr class="top">
		<td style="width: 243; height: 23" class="auto-style1">Name</td>
		<td style"width: 243px; height: 23px;"></td>
		<td style"width: 229px; height: 23px;">Weight</td>
		<td style="width: 229px; height: 23px;">Sets</td>
		<td style="width: 229px; height: 23px;">Reps</td>
	</tr>
	<?php
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$tmp = $row["id"];
				$name = "SELECT * FROM Users WHERE id = '$tmp'";
				$result2 = $conn->query($name);
				$row2 = $result2->fetch_assoc();
				echo "<tr><td style=\"width: 243; height: 2\" class=\"auto-style3\">";
				echo $row2["firstname"];
				echo "<tr><td style=\"width: 243; height: 2\" class=\"auto-style3\">";
				echo $row2["lastname"];
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