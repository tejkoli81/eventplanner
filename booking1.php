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
$bno = $_POST['bno'];
$bdate = $_POST['bdate'];
$edate = $_POST['edate'];
$ename = $_POST['ename'];
$venueid = $_POST['venueid'];
$did = $_POST['did'];
$catid = $_POST['catid'];
$pid = $_POST['pid'];
$tid = $_POST['tid'];
$planid = $_POST['planid'];
$nop = $_POST['nop'];

$rs = mysqli_query(
    $con,
    "select * from booking where venue_id=$venueid and event_date='$edate' and status='Confirm'"
);

if (mysqli_num_rows($rs) > 0) { ?>
	<script>
		swal({title: "Booking", text: "Venue not available on selected date", type: "error"}, function(){location.href='booking.php'});
	</script>			
<?php exit();}

$rs = mysqli_query(
    $con,
    "select * from booking where decorator_id=$did and event_date='$edate' and status='Booked'"
);

if (mysqli_num_rows($rs) > 0) { ?>
	<script>
		swal({title: "Booking", text: "Decorator not available on selected date", type: "error"}, function(){location.href='booking.php'});
	</script>			
<?php exit();}

$rs = mysqli_query(
    $con,
    "select * from booking where caterer_id=$catid and event_date='$edate' and status='Booked'"
);

if (mysqli_num_rows($rs) > 0) { ?>
    <script>
        swal({title: "Booking", text: "Decorator not available on selected date", type: "error"}, function(){location.href='booking.php'});
    </script>			
<?php exit();}

$rs = mysqli_query(
    $con,
    "select * from booking where p_id=$pid and event_date='$edate' and status='Booked'"
);

if (mysqli_num_rows($rs) > 0) { ?>
    <script>
        swal({title: "Booking", text: "Photographer not available on selected date", type: "error"}, function(){location.href='booking.php'});
    </script>			
<?php exit();}

$rs = mysqli_query(
    $con,
    "select * from booking where planner_id=$planid and event_date='$edate' and status='Booked'"
);

if (mysqli_num_rows($rs) > 0) { ?>
    <script>
        swal({title: "Booking", text: "Planner not available on selected date", type: "error"}, function(){location.href='booking.php'});
    </script>			
<?php exit();}

$cid = $_SESSION['cid'];
mysqli_query(
    $con,
    "insert into booking values($bno,'$bdate','$edate','$ename',$venueid,$did,$catid,$pid,$planid,$tid,$nop,$cid,'Pending')"
);
?>
	<script>
		swal({title: "Booking", text: "Your booking is accepted. Please wait for admin to generate bill.", type: "success"}, function(){location.href='view_bookings.php'});
	</script>			
</body>
</html>
