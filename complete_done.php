<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>

<div>
	<?php
	include 'index.php';
	?>

</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

	Swal.fire({
  position: 'center',
  icon: 'Done',
  title: 'completed todo',
  showConfirmButton: false,
  timer: 1500
})
</script> 
</body>
</html>