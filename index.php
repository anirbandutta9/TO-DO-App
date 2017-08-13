<?php 
include "config.php"; 
?>
<?php
if (isset($_GET['deletetask']))
{
    $id = $_GET['deletetask'];
    if($task->deletetask($id))
    {
        echo "<script>alert('done');
        window.location.href='index.php';</script>";

    }
    else {
        echo "<script>alert('Error');
        window.location.href='index.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>TO-DO APPLICATION</title>
</head>
<body>
<center>
	<h1>TODO APPLICATION </h1>
	<br>
	<h2>All TASKS LIST </h2>
<br>
<br>
<a href="addtask.php">ADD TASK</a>
<br>
<br>
	<tr>
    <td>

        <table align="center" border="1" width="40%" height="30%">
    <?php
    $query = "SELECT * FROM task";
    $task->showtasks($query);
    ?>
    </table>
</td>
</tr>
<a href="addtask.php"
</center>
</body>
</html>
    
