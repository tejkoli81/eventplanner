<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Absolute Events</title>
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>
<body>
<?php
include 'dbconnect.php';

$aid = $_POST['aid'];
$apwd = $_POST['apwd'];
$rs = mysqli_query(
    $con,
    "select * from admin where admin_email = '$aid' and admin_pwd='$apwd'"
);
if ($row = mysqli_fetch_row($rs)) {

    $_SESSION['aid'] = $row[0];
    $_SESSION['aname'] = $row[3];
    ?>
			<script>
				swal({title: "Admin Login", text: "Admin login successful", type: "success"}, function(){location.href='admin_home.php'});
			</script>			
<?php
} else {
     ?>
			<script>
				swal({title: "Admin Login", text: "Admin login failed. Invalid login details", type: "error"}, function(){location.href='admin.php'});
			</script>
<?php
}
?>    
</body>
</html>