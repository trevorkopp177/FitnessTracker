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
<h2>Post Workouts</h2>

<?php
session_start();
$id = $_SESSION['id'];
?>
<a href="coach_home.html"><img src="home.png" alt="MyHome" id="home"></a>
<form action="post.php" method="post">
    <p>Workout:<br><select name="workout" required>
		<option value="bench">Bench</option>
		<option value="squat">Squat</option>
		<option value="deadlift">Deadlift</option>
		<option value="other">Other</option>
	</select>
	</p>
	<p>Weight:<br><input name="wt" id="wt" type="range" min="0" max="500" step="5" value="100" oninput="val1.value=this.value" onchange="val1.value=this.value" onpageshow="val1.value=this.value"> 
	= <output id="val1" value="100">
	</p>
	<p>Sets: <br><input name="sets" id="sets" type="range" min="0" max="10" value="3" oninput="val2.value=this.value" onchange="val2.value=this.value" onpageshow="val2.value=this.value"> 
	= <output id="val2" value="3">
	</p>
	<p>Reps:<br><input name="reps" id="reps" type="range" min="0" max="20" value="5" oninput="val3.value=this.value" onchange="val3.value=this.value" onpageshow="val3.value=this.value"> 
	= <output id="val3" value="5">
	</p>
	<p>Date:<br><input type="date" name="day">
	</p>
	Group:<br><select name="subgroup" type="text">
		<option value="sprinter">Sprinter</option>
		<option value="thrower">Thrower</option>
		<option value="distance">Distance</option>
		<option value="other">All</option>
	</select>
	<br><p>&nbsp;</p>
	<input type="submit" value="Post"> <input type="reset">
	<br>
	
</form>
</div>
</body>
</html>
