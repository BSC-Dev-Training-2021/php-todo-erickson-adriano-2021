<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";

	$test=$conn->mysql_query("SELECT * FROM todo  ORDER BY todo_id DESC LIMIT 3 OFFSET 3");
	$output = array_slice($test, 0, 3); 
	?>

<?php
	while ($deneme=mysql_fetch_assoc($output)) {
    extract($deneme);
    echo '<h3> '.$deneme['todo_list'].' </h3>';
}
?>

</body>
</html>