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

$cid = $_POST['cid'];
$pwd = $_POST['cpwd'];
$rs = mysqli_query(
    $con,
    "select * from planner where planner_email = '$cid' and planner_pwd='$pwd'"
);
if ($row = mysqli_fetch_row($rs)) {

    $_SESSION['pid'] = $row[0];
    $_SESSION['pname'] = $row[1];
    ?>
			<script>
				swal({title: "Planner Login", text: "Planner login successful", type: "success"}, function(){location.href='planner_home.php'});
			</script>			
<?php
} else {
     ?>
			<script>
				swal({title: "Planner Login", text: "Planner login failed. Invalid login details", type: "error"}, function(){location.href='planner.php'});
			</script>
<?php
}
?>    
</body>
</html>
