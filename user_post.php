<html>
<body>

<h2>Post Workout</h2>

<?php $id = $_GET["id"]; ?>

<form action="post.php" method="post">
    Workout:<br><select name="workout" required>
		<option value="bench">Bench</option>
		<option value="squat">Squat</option>
		<option value="deadlift">Deadlift</option>
		<option value="other">Other</option>
	</select>
	<br>
	Weight:<br><input name="wt" type="number">
	<br>
	Sets: <br><input type="number" name="sets">
	<br>
	Reps:<br><input type="number" name="reps">
	<br>
	Date:<br><input type="date" name="day">
	<br>
	<input type="hidden" name="id" value="<?php echo $id; ?>" >
	<input type="submit" value="Post">
	<br>
</form>
<p>&nbsp;</p>

</body>
</html>
