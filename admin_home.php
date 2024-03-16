<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['aid'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Absolute Events - Admin</title>
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
</head>
<body>
	<div class="wrapper">
		<?php include 'admin-sidebar.php'; ?>

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
									<h2 class="d-inline">Welcome Admin</h2>
									<h4 class="d-inline ml-2"><?= $_SESSION['aname'] ?></h4>
								</div>
								<div class="row">
									<div class="col-md-3 mx-auto total-products">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from vendor');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Vendors</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class='fas fa-hard-hat'></i>
											</div>	
										</div>
										<a href="manage_vendors.php" class="btn btn-primary btn-sm w-100 mt-4 mx-auto text-center">View Vendors <i class="fas fa-arrow-circle-right"></i></a>
									</div>
									<div class="col-md-3 mx-auto total-orders">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from customer');
$n = mysqli_num_rows($rs);
?>												

												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Customers</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class='fas fa-user-friends'></i>
											</div>	
										</div>
										<a href="manage_customer.php" class="btn btn-success btn-sm w-100 mt-4 mx-auto text-center">View Customers <i class="fas fa-arrow-circle-right"></i></a>
									</div>
									<div class="col-md-3 mx-auto total-users">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from planner');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Planners</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class="fa fa-user"></i>
											</div>	
										</div>
										<a href="manage_planners.php" class="btn btn-warning btn-sm w-100 mt-4 mx-auto text-center text-white">View Planners <i class="fas fa-arrow-circle-right"></i></a>
									</div>
									<div class="col-md-3 mx-auto total-stores">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from venue');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Venues</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</div>	
										</div>
										<a href="manage_venues.php" class="btn btn-danger btn-sm w-100 mt-4 mx-auto text-center">View Venues <i class="fas fa-arrow-circle-right"></i></a>
									</div>
									<div class="col-md-3 mx-auto total-users">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from feedback');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Feedbacks</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class="fa-solid fa-comments"></i>
											</div>	
										</div>
										<a href="manage_feedbacks.php" class="btn btn-warning btn-sm w-100 mt-4 mx-auto text-center text-white">View Feedbacks <i class="fas fa-arrow-circle-right"></i></a>
									</div>

									<div class="col-md-3 mx-auto total-products">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from booking');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Bookings</h5>
											</div>
											<div class="col-md-4 text-right">
												<i class="fa-solid fa-book"></i>
											</div>	
										</div>
										<a href="manage_bookings.php" class="btn btn-warning btn-sm w-100 mt-4 mx-auto text-center text-white">View Bookings <i class="fas fa-arrow-circle-right"></i></a>
									</div>

									<div class="col-md-3 mx-auto total-orders">
										<div class="row">
											<div class="col-md-8">
<?php
$rs = mysqli_query($con, 'select * from bill');
$n = mysqli_num_rows($rs);
?>												
												<h1 class="text-white"><?= $n ?></h1>
												<h5 class="text-white">Total Bills</h5>
											</div>
											<div class="col-md-4 text-right">
											<i class="fa-solid fa-money-bill"></i>
											</div>	
										</div>
										<a href="view_bills.php" class="btn btn-warning btn-sm w-100 mt-4 mx-auto text-center text-white">View Bills <i class="fas fa-arrow-circle-right"></i></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						
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