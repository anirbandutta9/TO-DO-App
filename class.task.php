<?php

class TASK {
	private $db;
	function __construct($db_con)
	{
		$this->db = $db_con;
	}

	public function showtasks($query) 
	{
		try {
	$stmt = $this->db->prepare($query);
	$stmt->execute();

	if ($stmt->rowCount() > 0)
	{
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><a onClick="javascript: return confirm(' Are you sure you want to delete this post? ')" href="?deletetask=<?php echo $row['id']; ?>">delete task</a></td>
			</tr>
			<?php

		}
	}
	else {
		?>
            <tr>
            <td>No task added yet...</td>
            </tr>
            <?php
		}
		
	}
	catch(PDOException $e) 
	{
		echo $e->getMessages();
	}
}

	public function addtasks($name)
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO task (name) VALUES (:name)");
			$stmt->bindParam(":name" , $name);
			$stmt->execute();
			return $stmt;
   	}
   	catch(PDOException $e)
   	{
   		echo $e->getMessage(); 
   	}
	}

	public function deletetask($id)
	{
		try 
		{
			$stmt= $this->db->prepare("DELETE FROM task WHERE id=:id");
			$stmt->bindParam(":id" , $id);
			$stmt->execute();
			if($stmt->rowCount() > 0)
			{
			return true;
		}
		else {
			return false;
		}
	}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

	?>
