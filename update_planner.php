<?php

session_start();

include 'dbconnect.php';

if (!isset($_SESSION['aid'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $query = 'SELECT * FROM planner WHERE planner_id = ' . $_GET['id'];
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

     $rs = mysqli_query(
         $con,
         "select * from planner where planner_email='$email' and planner_id<>$id"
     );

     if (mysqli_num_rows($rs) > 0) { ?>
		<script>
			swal({title: "Planner Update", text: "Planner already registered", type: "error"}, function(){location.href='add_planner.php'});
		</script>			
	<?php } else {
         if (strlen($_FILES['photo']['name']) > 0) {
             unlink($path);
             $path = 'planners/' . basename($_FILES['photo']['name']);
             move_uploaded_file($_FILES['photo']['tmp_name'], $path);
         }

         mysqli_query(
             $con,
             "update planner set planner_name='$name', planner_address='$addr', planner_phone='$phone', planner_email='$email', planner_pic='$path' where planner_id=$id"
         );
         ?>
		<script>
			swal({title: "Planner Update", text: "Planner updated successfully", type: "success"}, function(){location.href='manage_planners.php'});
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
									<p class="d-inline ml-2">Planner</p>
									<a href="admin_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<a href="manage_planners.php" class="btn btn-primary ml-3 mb-2">Manage Planners</a>
								</div>
								<div class="row">
									<form method="POST" class="w-100 p-3" enctype="multipart/form-data">
										<div class="form-group">
									    	<label for="name" style="font-weight: 600;">Name</label>
									    	<input type="text" name="name" class="form-control shadow-none" id="name" placeholder="Enter Name" value="<?= $data[
                  'planner_name'
              ] ?>" required>
									  	</div>
										<div class="form-group">
									    	<label for="addr" style="font-weight: 600;">Address</label>
											<textarea name="addr" id="addr" class="form-control shadow-none" cols="60" rows="3" placeholder="Enter Address" required><?= $data[
               'planner_address'
           ] ?></textarea>
									  	</div>
										<div class="form-group">
									    	<label for="phone" style="font-weight: 600;">Phone</label>
									    	<input type="text" name="phone" class="form-control shadow-none" id="phone" placeholder="Enter 10 Digits Phone Number" pattern="^[6789]\d{9}$" value="<?= $data[
                  'planner_phone'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="email" style="font-weight: 600;">Email</label>
									    	<input type="email" name="email" class="form-control shadow-none" id="email" placeholder="Enter Email" value="<?= $data[
                  'planner_email'
              ] ?>" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo</label><br>
                                            <img src="<?= $data[
                                                'planner_pic'
                                            ] ?>" width="100" height="100" alt="">
									    	<input type="file" name="photo" class="form-control shadow-none" id="photo">
									  	</div>
                                        <input type="hidden" name="id" value="<?= $data[
                                            'planner_id'
                                        ] ?>">
                                        <input type="hidden" name="photo" value="<?= $data[
                                            'planner_pic'
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