<?php
include 'handler.php';

if(isset($_POST['completed'])){
	$todo = $_POST['todo'];

	echo $todo;
		$query ="select * from todo where todo_list= '" . $todo . "'";
	  $d = $db->query($query);
	  foreach ($d as $data){
	  	$complete = $data['todo_list'];


	  	$sql ="INSERT INTO completed (completed_todo) VALUES (?)";
					$stmtinsert = $db->prepare($sql);
					$result = $stmtinsert->execute([$complete]);
			if ( $result ) {
				
				header('location:complete_done.php');
				
			}
			else {
				echo'error';
			}
	  }


}


?>