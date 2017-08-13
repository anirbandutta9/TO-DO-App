<?php

try 
{
	$db_con = new PDO("mysql:host=localhost;dbname=todo2" , "root" , "");
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once 'class.task.php';
$task = new TASK($db_con);

?>