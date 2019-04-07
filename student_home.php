<!DOCTYPE html>
<html>
<body>

<?php
session_start();
$ret = $_SESSION['row'];
?>

<h2>Athlete Home</h2>
<br>What would you like to do?&nbsp;<br>
<br>
<form action="user_acct.php" method="get">
	<input type="hidden" name="id" value="<?php echo $ret['id']; ?>" >
	<input type="submit" value="MyAccount"> <br>
</form>
<form action="user_post.php" method="get">
	<input type="hidden" name="id" value="<?php echo $ret['id']; ?>" >
	<input type="submit" value="Post Workout"> <br>
</form> 
<form action="user_view.php" method="get">
	<input type="hidden" name="id" value="<?php echo $ret['id']; ?>" >
	<input type="submit" value="View Workout"> <br>
</form> 

<?php
unset($_SESSION['id']);
?>

</body>
</html>