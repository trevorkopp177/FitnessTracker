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
<div class="header">
	<img src="logo.png" alt="FitnessTracker" id="logo">
</div>

<div class="main">

<h2>View Workouts</h2>

<?php
session_start();
$id = $_SESSION['id'];
?>
<a href="coach_home.html"><img src="home.png" alt="MyHome" id="home"></a>
<form action="view2.php" method="post">
    Workout:<br><select name="workout" required>
		<option value="bench">Bench</option>
		<option value="squat">Squat</option>
		<option value="deadlift">Deadlift</option>
		<option value="other">Other</option>
		<option value="other">All</option>
	</select>
	<br>
	Group:<br><select name="subgroup" type="text">
		<option value="sprinter">Sprinter</option>
		<option value="thrower">Thrower</option>
		<option value="distance">Distance</option>
		<option value="other">Other</option>
		<option value="other">All</option>
	</select>
	<br>
	Date:<br><input type="date" name="day">
	<br>
	<input type="submit" value="View"> <input type="reset">
	<br>
</form>
<p>&nbsp;</p>
</div>
</body>
</html>

