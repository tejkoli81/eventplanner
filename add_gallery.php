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

    $path1 = 'gallery/' . basename($_FILES['photo1']['name']);
    move_uploaded_file($_FILES['photo1']['tmp_name'], $path1);

    $path2 = 'gallery/' . basename($_FILES['photo2']['name']);
    move_uploaded_file($_FILES['photo2']['tmp_name'], $path2);

    $path3 = 'gallery/' . basename($_FILES['photo3']['name']);
    move_uploaded_file($_FILES['photo3']['tmp_name'], $path3);

    $path4 = 'gallery/' . basename($_FILES['photo4']['name']);
    move_uploaded_file($_FILES['photo4']['tmp_name'], $path4);

    $path5 = 'gallery/' . basename($_FILES['photo5']['name']);
    move_uploaded_file($_FILES['photo5']['tmp_name'], $path5);

    mysqli_query(
        $con,
        "insert into gallery(g_img, v_id) values ('$path1', $vid)"
    );
    mysqli_query(
        $con,
        "insert into gallery(g_img, v_id) values ('$path2', $vid)"
    );
    mysqli_query(
        $con,
        "insert into gallery(g_img, v_id) values ('$path3', $vid)"
    );
    mysqli_query(
        $con,
        "insert into gallery(g_img, v_id) values ('$path4', $vid)"
    );
    mysqli_query(
        $con,
        "insert into gallery(g_img, v_id) values ('$path5', $vid)"
    );
    ?>
	<script>
	    swal({title: "Gallery", text: "Gallery uploaded successfully", type: "success"}, function(){location.href='manage_gallery.php'});
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
									<p class="d-inline ml-2">Gallery</p>
									<a href="vendor_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<a href="manage_gallery.php" class="btn btn-primary ml-3 mb-2">Manage Gallery</a>
								</div>
								<div class="row">
									<form method="POST" class="w-100 p-3" enctype="multipart/form-data">
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo 1</label>
									    	<input type="file" name="photo1" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo 2</label>
									    	<input type="file" name="photo2" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo 3</label>
									    	<input type="file" name="photo3" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo 4</label>
									    	<input type="file" name="photo4" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<div class="form-group">
									    	<label for="photo" style="font-weight: 600;">Photo 5</label>
									    	<input type="file" name="photo5" class="form-control shadow-none" id="photo" required>
									  	</div>
									  	<button type="submit" name="save" class="btn btn-primary" id="save">Post Images</button>
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