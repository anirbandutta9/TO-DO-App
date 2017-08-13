<?php
include "config.php";
if(isset($_POST['submit']))
{
	$name = htmlentities($_POST['taskname']);
	try {
	$stmt = $db_con->prepare("SELECT name FROM task WHERE name=:name");
	$stmt->bindParam(':name', $name);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{
		echo "<script>alert('ERROR, TASK AlREADY EXISTS');</script>";
	}
	else if($task->addtasks($name))
	{
		echo "<script>alert('TASK ADDED SUCCESSFULLY');
		window.location.href='index.php';</script>";
	}
	else {
		echo "<script>alert('ERROR');</script>";
	}
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>ADD A TASK</title>
</head>
<body>
<center>
<h1>TODO APPLICATION </h1>
	<br>
	<a href="index.php">HOME</a>
	<br>
	<h2>ADD NEW TASK </h2>
<br>
	<form method="POST" action="">
	<input type="text" name="taskname" placeholder="Enter task name" required="">
	<br>
	<br>
	<input type="submit" name="submit" value="ADD TASK">
</center>
</body>
</html>