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

$cid = $_POST['vid'];
$pwd = $_POST['vpwd'];
$type = $_POST['vtype'];

$rs = mysqli_query(
    $con,
    "select * from vendor where v_email = '$cid' and v_password='$pwd' and v_status=1"
);
if ($row = mysqli_fetch_row($rs)) {

    $_SESSION['vid'] = $row[0];
    $_SESSION['vname'] = $row[2];
    $_SESSION['type'] = $row[8];
    ?>
			<script>
				swal({title: "Vendor Login", text: "Vendor login successful", type: "success"}, function(){location.href='vendor_home.php'});
			</script>			
<?php
} else {
     ?>
			<script>
				swal({title: "Vendor Login", text: "Vendor login failed. Invalid login details", type: "error"}, function(){location.href='vendor_login.php'});
			</script>
<?php
}
?>    
</body>
</html>
