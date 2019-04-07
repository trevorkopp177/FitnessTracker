<html>
<body>

<h2>View Workout</h2>

<?php $id = $_GET["id"]; ?>

<form action="view.php" method="post">
    Workout:<br><input name="workout" type="text">
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
