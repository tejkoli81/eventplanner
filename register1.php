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

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$addr = $_POST['addr'];
$phone = $_POST['phone'];

$rs = mysqli_query($con, "select * from customer where cust_email='$email'");

if (mysqli_num_rows($rs) > 0) { ?>
	<script>
		swal({title: "Customer Register", text: "Customer already registered", type: "error"}, function(){location.href='customer.php'});
	</script>			
<?php } else {mysqli_query(
        $con,
        "insert into customer(cust_email, cust_pwd, cust_name, cust_addr, cust_phone) values('$email','$pwd','$name','$addr','$phone')"
    ); ?>
	<script>
		swal({title: "Customer Register", text: "Customer registered successfully", type: "success"}, function(){location.href='customer.php'});
	</script>			
<?php }
 ?>
