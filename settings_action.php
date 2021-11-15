<?php


include 'handler.php';


if(isset($_POST['save'])){

		$settings = $_POST['settings'];
			
			$sql = "UPDATE settings SET  results_per_page=? WHERE settings_id= 1" ;
			$stmt= $db->prepare($sql);
			$stmt->execute([$settings]);
				
				header('location:settings.php');
				
			}
			



elseif(isset($_POST['reset'])){

			$default = 10;
			$sql1 = "UPDATE settings SET  results_per_page=?" ;
			$stmt= $db->prepare($sql1);
			$stmt->execute([$default]);

			header('location:settings.php');
}
else{
	echo 'no isset';
}
?>