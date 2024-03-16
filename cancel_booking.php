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
$bno = $_GET['bno'];
$cid = $_SESSION['cid'];

$rs = mysqli_query(
    $con,
    "select * from booking where status='Bill Paid' and booking.cust_id=$cid and booking_no=$bno and event_date - 7 > current_date"
);

if (mysqli_num_rows($rs) > 0) {

    mysqli_query(
        $con,
        "update booking set status='Canceled' where booking_no=$bno"
    );
    mysqli_query(
        $con,
        "update bill set status='Canceled' where booking_no=$bno"
    );
    ?>
	<script>
		swal({title: "Booking", text: "Booking canceled successfully. Amount will be refunded with 7 working days", type: "success"}, function(){location.href='view_bookings.php'});
	</script>			
<?php
} else {
     ?>
	<script>
		swal({title: "Booking", text: "Booking cannot be canceled now", type: "error"}, function(){location.href='view_bookings.php'});
	</script>			
<?php
}
?>
</body>
</html>
