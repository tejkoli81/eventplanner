<?php
session_start();
$_SESSION = [];
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Absolute Events</title>
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>
<body>
	<script>
		swal({title: "Logout", text: "You are logged out successful", type: "success"}, function(){location.href='index.php'});
	</script>			
</body>
</html>
