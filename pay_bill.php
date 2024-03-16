<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['cid'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Absolute Events - Customer</title>
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
		<?php include 'customer-sidebar.php'; ?>

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
									<h2 class="d-inline">Welcome Customer</h2>
									<h4 class="d-inline ml-2"><?= $_SESSION['cname'] ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
<?php
$rs = mysqli_query($con, 'select * from bill where booking_no=' . $_GET['bno']);
$row = mysqli_fetch_row($rs);
?>
        <form method='post' action='pay_bill1.php'>
		<table class="table table-bordered">
		<tr>
			<td align='right'><b>Bill No:</b></td>
			<td><input type='text' name='billno' class="form-control shadow-none" value='<?= $row[0] ?>'  readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Bill Date:</b></td>
			<td><input type='date' name='billdate' class="form-control shadow-none" value='<?= $row[1] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Booking No:</b></td>
			<td><input type='text' name='bookno' class="form-control shadow-none" value='<?= $row[2] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Venue Cost:</b></td>
			<td><input type='text' name='vcost' class="form-control shadow-none" value='<?= $row[3] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Decorator Cost:</b></td>
			<td><input type='text' name='dcost' class="form-control shadow-none" value='<?= $row[4] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Food Cost:</b></td>
			<td><input type='text' name='fcost' class="form-control shadow-none" value='<?= $row[5] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Photographer Cost:</b></td>
			<td><input type='text' name='pcost' class="form-control shadow-none" value='<?= $row[6] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Planner Cost:</b></td>
			<td><input type='text' name='plannercost' class="form-control shadow-none" value='<?= $row[7] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Total Cost:</b></td>
			<td><input type='text' name='total' class="form-control shadow-none" value='<?= $row[8] ?>' readOnly></td>
		</tr>
		<tr>
			<td align='right'><b>Pay Mode:</b></td>
			<td>
                <select name="mode" id="mode" required class="form-control shadow-none">
                    <option value="">Select Payment Mode</option>
                    <option value="Card">Debit/Creadit Card</option>
                    <option value="UPI">UPI</option>
                </select>
            </td>    
		</tr>
		<tr>
			<td align='right' class='text'><b>Transaction#:</b></td>
			<td><input type='text' name='trn_no'  class="form-control shadow-none" placeholder="16 digit card#/12 digit UPI transaction#" required></td>
		</tr>
		<tr>
			<td><input type='submit' value='PAY NOW' class='btn btn-primary'></td>
			<td><input type='reset' value='CLEAR' class='btn btn-danger'></td>
		</tr>
		</table>
		</form>	                        

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