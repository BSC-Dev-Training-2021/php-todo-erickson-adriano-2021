<?php
include 'handler.php';

if(isset($_POST['create_todo'])){

	$todo = $_POST['todo'];
	$page = $_POST['page'];

			$sql ="INSERT INTO todo (todo_list) VALUES (?)";
					$stmtinsert = $db->prepare($sql);
					$result = $stmtinsert->execute([$todo]);
			if ( $result ) {
				
				echo "done";
				header('location:' . $page .'.php');
			}
			else {
				echo'error';
			}
}
else{
echo 'not isset ';	
}
?>