<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['pid'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Absolute Events - Planner</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" type="text/css" href="css/manage_customer.css">
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
	<style>
		 .row{
			margin-right: 0px;
    margin-left: 0px;
	font-size:0.9rem;
		 }   
	</style>
</head>
<body>
	<div class="wrapper">
		<?php include 'planner-sidebar.php'; ?>

		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<nav>
							<a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
						</nav>
						<div class="below-toggle-content">
							<div class="col-md-12">
								<div class="top-part mb-3">
									<h2 class="d-inline">Welcome Planner</h2>
									<h4 class="d-inline ml-2"><?= $_SESSION['pname'] ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">

<?php
$rs = mysqli_query(
    $con,
    'select booking_no,booking_date,event_date,event_name, cust_name,cust_phone,venue_name, venue_phone, decorator_id, caterer_id, p_id, t_name, no_of_person ' .
        'from booking,customer,venue,thali ' .
        'where booking.cust_id = customer.cust_id and ' .
        'booking.t_id = thali.t_id and booking.venue_id = venue.venue_id and ' .
        "status='Bill Paid' and " .
        'booking.planner_id=' .
        $_SESSION['pid']
);
if (mysqli_num_rows($rs) > 0) { ?>

<table class="table table-bordered">
	<tr style="background: black;color:white;">
		<th>Booking No</th>
		<th>Booking Date</th>
		<th>Event Date</th>
		<th>Event</th>
		<th>Customer Name</th>
		<th>Customer Phone</th>
		<th>Venue</th>
		<th>Venue Phone</th>
		<th>Decorator</th>
		<th>Decorator Phone</th>
		<th>Caterer</th>
		<th>Caterer Phone</th>
		<th>Photographer</th>
		<th>Photographer Phone</th>
		<th>Thali</th>
		<th>No.of Person</th>
	</tr>
<?php while ($row = mysqli_fetch_row($rs)) { ?>
	<tr>
        <td><?= $row[0] ?></td>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td><?= $row[4] ?></td>
        <td><?= $row[5] ?></td>
        <td><?= $row[6] ?></td>
        <td><?= $row[7] ?></td>
<?php
$rs1 = mysqli_query($con, 'select * from vendor where v_id=' . $row[8]);
$row1 = mysqli_fetch_assoc($rs1);
?>
		<td><?= $row1['v_name'] ?></td>
		<td><?= $row1['v_phone'] ?></td>
		<?php
  $rs1 = mysqli_query($con, 'select * from vendor where v_id=' . $row[9]);
  $row1 = mysqli_fetch_assoc($rs1);
  ?>
		<td><?= $row1['v_name'] ?></td>
		<td><?= $row1['v_phone'] ?></td>
		<?php
  $rs1 = mysqli_query($con, 'select * from vendor where v_id=' . $row[10]);
  $row1 = mysqli_fetch_assoc($rs1);
  ?>
		<td><?= $row1['v_name'] ?></td>
		<td><?= $row1['v_phone'] ?></td>
		<td><?= $row[11] ?></td>
		<td><?= $row[12] ?></td>		
	</tr>
<?php } ?>
	</table>			
<?php } else { ?>
    <h4>Not data found.</h4>
<?php }
?>

                        </div>						
					</div>
				</div>
			</div>
		</div>

	</div>	

	<script type="text/javascript">
		$('#toggle').click(function(e){
			e.preventDefault();
			$('.wrapper').toggleClass('menuDisplayed');
		});
	</script>

</body>
</html>