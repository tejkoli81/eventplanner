<?php
session_start();
include 'dbconnect.php';

$billno = $_POST['billno'];
$bookno = $_POST['bookno'];
$mode = $_POST['mode'];
$trn_no = $_POST['trn_no'];

mysqli_query(
    $con,
    "update bill set payment_mode='$mode', trn_no='$trn_no', status='Paid' where bill_no=$billno"
);

mysqli_query(
    $con,
    "update booking set status='Bill Paid' where booking_no=$bookno"
);
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
		swal({title: "Bill", text: "Bill payment done successful", type: "success"}, function(){location.href='view_bookings.php'});
	</script>			
</body>
</html>
