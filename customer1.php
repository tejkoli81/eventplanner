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
    "select * from customer where cust_email = '$cid' and cust_pwd='$pwd'"
);
if ($row = mysqli_fetch_row($rs)) {

    $_SESSION['cid'] = $row[0];
    $_SESSION['cname'] = $row[3];
    ?>
			<script>
				swal({title: "Customer Login", text: "Customer login successful", type: "success"}, function(){location.href='cust_home.php'});
			</script>			
<?php
} else {
     ?>
			<script>
				swal({title: "Customer Login", text: "Customer login failed. Invalid login details", type: "error"}, function(){location.href='customer.php'});
			</script>
<?php
}
?>    
</body>
</html>
