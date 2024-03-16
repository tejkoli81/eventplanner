<?php
session_start();
include 'dbconnect.php';
if (!isset($_SESSION['vid'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Absolute Events - Vendor</title>
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

    $vid = $_SESSION['vid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $rate = $_POST['rate'];

    $path = 'thali/' . basename($_FILES['photo']['name']);

    move_uploaded_file($_FILES['photo']['tmp_name'], $path);

    mysqli_query(
        $con,
        "insert into thali(t_name, t_type, t_rate, t_img, v_id) values ('$name','$type',$rate,'$path',$vid)"
    );
    ?>
	<script>
	    swal({title: "Thali", text: "Thali uploaded successfully", type: "success"}, function(){location.href='manage_thali.php'});
	</script>			
<?php
} ?>


	<div class="wrapper">

		<?php include 'vendor-sidebar.php'; ?>

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
									<h2 class="d-inline">Add</h2>
									<p class="d-inline ml-2">Thali</p>
									<a href="vendor_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<a href="manage_thali.php" class="btn btn-primary ml-3 mb-2">Manage Thali</a>
								</div>
								<div class="row">
									<form method="POST" class="w-100 p-3" enctype="multipart/form-data">
									  	<div class="form-group">
									    	<label for="name" style="font-weight: 600;">Thali Name</label>
									    	<input type="text" name="name" class="form-control shadow-none" id="name" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="type" style="font-weight: 600;">Type</label>
                                            <select name='type' id="type" class="form-control shadow-none" required>
                                            <option value="">Select Type</option>
                                            <option value="Veg">Veg</option>
                                            <option value="Non-veg">Non-veg</option>
                                            </select>
									  	</div>                                        
									  	<div class="form-group">
									    	<label for="rate" style="font-weight: 600;">Rate</label>
									    	<input type="number" name="rate" class="form-control shadow-none" id="rate" min=0 required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Thali Photo</label>
									    	<input type="file" name="photo" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<button type="submit" name="save" class="btn btn-primary" id="save">Save</button>
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