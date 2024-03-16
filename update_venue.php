<?php

session_start();

include 'dbconnect.php';

if (!isset($_SESSION['aid'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $query = 'SELECT * FROM venue WHERE venue_id = ' . $_GET['id'];
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_array($result);
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="css/manage_customer.css">
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>
<body>
	<?php if (isset($_POST['save'])) {
     $id = $_POST['id'];
     $name = $_POST['name'];
     $addr = mysqli_real_escape_string($con, $_POST['addr']);
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $path = $_POST['photo'];
     $lat=$_POST['lat'];
     $long=$_POST['long'];
     $rat=$_POST['rate'];

     $rs = mysqli_query(
         $con,
         "select * from venue where venue_email='$email' and venue_id<>$id"
     );

     if (mysqli_num_rows($rs) > 0) { ?>
		<script>
			swal({title: "Veneue Update", text: "Venue already registered", type: "error"}, function(){location.href='add_venue.php'});
		</script>			
	<?php } else {
         if (strlen($_FILES['photo']['name']) > 0) {
             unlink($path);
             $path = 'venues/' . basename($_FILES['photo']['name']);
             move_uploaded_file($_FILES['photo']['tmp_name'], $path);
         }

         mysqli_query(
             $con,
             "update venue set venue_name='$name', venue_address='$addr', venue_phone='$phone', venue_email='$email', venue_rate='$rat',venue_pic='$path', venue_lat='$lat',venue_long='$long'where venue_id=$id"
         );
         ?>
		<script>
			swal({title: "Venue Update", text: "Venue updated successfully", type: "success"}, function(){location.href='manage_venues.php'});
		</script>			
	<?php }
 } ?>


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
									<h2 class="d-inline">Update</h2>
									<p class="d-inline ml-2">Venue</p>
									<a href="admin_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<a href="manage_venues.php" class="btn btn-primary ml-3 mb-2">Manage venues</a>
								</div>
								<div class="row">
									<form method="POST" class="w-100 p-3" enctype="multipart/form-data">
										<div class="form-group">
									    	<label for="name" style="font-weight: 600;">Name</label>
									    	<input type="text" name="name" class="form-control shadow-none" id="name" placeholder="Enter Name" value="<?= $data[
                  'venue_name'
              ] ?>" required>
									  	</div>
										<div class="form-group">
									    	<label for="addr" style="font-weight: 600;">Address</label>
											<textarea name="addr" id="addr" class="form-control shadow-none" cols="60" rows="3" placeholder="Enter Address" required><?= $data[
               'venue_address'
           ] ?></textarea>
									  	</div>
										<div class="form-group">
									    	<label for="phone" style="font-weight: 600;">Phone</label>
									    	<input type="text" name="phone" class="form-control shadow-none" id="phone" placeholder="Enter 10 Digits Phone Number" pattern="^[6789]\d{9}$" value="<?= $data[
                  'venue_phone'
              ] ?>" required>
										<div class="form-group">
									    	<label for="rate" style="font-weight: 600;">Rate</label>
									    	<input type="text" name="rate" class="form-control shadow-none" id="rate" placeholder="Enter Rate" pattern="^d{0-9}$" value="<?= $data[
                  'venue_rate'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="email" style="font-weight: 600;">Email</label>
									    	<input type="email" name="email" class="form-control shadow-none" id="email" placeholder="Enter Email" value="<?= $data[
                  'venue_email'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="lat" style="font-weight: 600;">Latitude</label>
									    	<input type="text" name="lat" class="form-control shadow-none" id="lat" placeholder="Enter latitude" value="<?= $data[
                  'venue_lat'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="long" style="font-weight: 600;">Longitude</label>
									    	<input type="text" name="long" class="form-control shadow-none" id="long" placeholder="Enter Longitude" value="<?= $data[
                  'venue_long'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo</label><br>
                                            <img src="<?= $data[
                                                'venue_img'
                                            ] ?>" width="100" height="100" alt="">
									    	<input type="file" name="photo" class="form-control shadow-none" id="photo">
									  	</div>
                                        <input type="hidden" name="id" value="<?= $data[
                                            'venue_id'
                                        ] ?>">
                                        <input type="hidden" name="photo" value="<?= $data[
                                            'venue_img'
                                        ] ?>">

									  	<button type="submit" name="save" class="btn btn-primary" id="save">Save Changes</button>
									  	<button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
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