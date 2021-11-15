<?php

if(isset($_POST['delete'])){

	$todo = $_POST['todo_list'];
	include 'handler.php';			


	
	$sql ="DELETE FROM todo  WHERE todo_list ='".$todo."'";
	$db->query($sql);

	header('location:index.php');

}
?>