<!DOCTYPE html>
<html>
<head>
    <title>Absolute Events</title>
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>
<body>

<?php
include 'dbconnect.php';
$name = $_POST['name'];
$cpname = $_POST['cpname'];
$addr = mysqli_real_escape_string($con, $_POST['addr']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$type = $_POST['type'];
$website = $_POST['website'];
$description = mysqli_real_escape_string($con, $_POST['description']);

$rs = mysqli_query($con, "select * from vendor where v_email='$email'");

if (mysqli_num_rows($rs) > 0) { ?>
	<script>
		swal({title: "Vendor Register", text: "Vendor already registered", type: "error"}, function(){location.href='vendor_login.php'});
	</script>			
<?php } else {
    $path = 'vendors/' . basename($_FILES['imgpath']['name']);

    move_uploaded_file($_FILES['imgpath']['tmp_name'], $path);

    mysqli_query(
        $con,
        "insert into vendor(v_name, v_contact_person, v_address, v_phone, v_email, v_password, v_pic, v_type, v_website, v_description) values ('$name','$cpname','$addr','$phone','$email','$pwd','$path','$type','$website','$description')"
    );
    ?>
	<script>
		swal({title: "Vendor Register", text: "Vendor registered successfully", type: "success"}, function(){location.href='vendor_login.php'});
	</script>			
<?php }


?>
