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

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $addr = mysqli_real_escape_string($con, $_POST['addr']);
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $rs = mysqli_query(
        $con,
        "select * from customer where cust_email='$email' and cust_id<>$id"
    );

    if (mysqli_num_rows($rs) > 0) { ?>
       <script>
           swal({title: "Customer Profile", text: "Customer already registered", type: "error"}, function(){location.href='cust-profile.php'});
       </script>			
   <?php } else {mysqli_query(
            $con,
            "update customer set cust_name='$name', cust_addr='$addr', cust_phone='$phone', cust_email='$email' where cust_id=$id"
        ); ?>
       <script>
           swal({title: "Customer Profile", text: "Customer updated successfully", type: "success"}, function(){location.href='cust-profile.php'});
       </script>			
   <?php }
}

$rs = mysqli_query(
    $con,
    'select * from customer where cust_id=' . $_SESSION['cid']
);
$row = mysqli_fetch_assoc($rs);
?>

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
									<h2 class="d-inline">Customer</h2>
									<p class="d-inline ml-2">Profile</p>
									<a href="cust_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row" id="user_info">
									<form method="POST" class="w-100 p-3" id="update_form">
										<div class="form-group">
									    	<label for="id" style="font-weight: 600;">ID</label>
									    	<input type="text" name="id" class="form-control shadow-none" id="id"  value="<?= $row[
                  'cust_id'
              ] ?>" readOnly>
									  	</div>
									  	<div class="form-group">
									    	<label for="name" style="font-weight: 600;">Business Name</label>
									    	<input type="text" name="name" class="form-control shadow-none" id="name" placeholder="Enter Business Name" value="<?= $row[
                  'cust_name'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="addr" style="font-weight: 600;">Address</label>
                                            <textarea name="addr" id="addr" cols="60" rows="3" placeholder="Enter Address" class="form-control shadow-none"><?= $row[
                                                'cust_addr'
                                            ] ?></textarea>
									  	</div>
									  	<div class="form-group">
									    	<label for="phone" style="font-weight: 600;">Phone</label>
									    	<input type="text" name="phone" class="form-control shadow-none" id="phone" placeholder="Enter Phone" value="<?= $row[
                  'cust_phone'
              ] ?>">
									  	</div>
									  	<div class="form-group">
									    	<label for="email" style="font-weight: 600;">Email</label>
									    	<input type="email" name="email" class="form-control shadow-none" id="email" placeholder="Enter Admin Email" value="<?= $row[
                  'cust_email'
              ] ?>">
									  	</div>
                                        <button type="submit" name="update" class="btn btn-primary" id="update">Update Details</button>
									</form>
								</div>
							</div>
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