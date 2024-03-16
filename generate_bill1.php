<?php
session_start();
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Absolute Events</title>
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>
<body>

<?php
$billno = $_POST['billno'];
$billdate = $_POST['billdate'];
$bookno = $_POST['bookno'];
$vcost = $_POST['vcost'];
$fcost = $_POST['fcost'];
$dcost = $_POST['dcost'];
$pcost = $_POST['pcost'];
$plannercost = $_POST['plannercost'];
$total = $vcost + $fcost + $dcost + $pcost + $plannercost;

mysqli_query(
    $con,
    "insert into bill values($billno,'$billdate',$bookno,$vcost,$dcost,$fcost,$pcost,$plannercost,$total,'-','-','Pending')"
);

mysqli_query(
    $con,
    "update booking set status='Bill Generated' where booking_no=$bookno"
);
?>
	<script>
		swal({title: "Bill", text: "Bill generated successfully", type: "success"}, function(){location.href='manage_bookings.php'});
	</script>			
</body>
</html>
