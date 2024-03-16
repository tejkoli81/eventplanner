<title>Feedback</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
	<div class="container">
		<center><a href="index.php" class="btn btn-danger">Home</a></center>
	<?php
 include 'dbconnect.php';

 if (isset($_POST['submit'])) {
     $fdate = $_POST['fdate'];
     $name = $_POST['name'];
     $msg = mysqli_real_escape_string($con, $_POST['msg']);

     mysqli_query(
         $con,
         "insert into feedback(f_date,f_by,f_msg) values('$fdate','$name','$msg')"
     );
 }

 $rs = mysqli_query($con, 'select * from feedback');
 while ($row = mysqli_fetch_row($rs)) { ?>
<table style='padding:10px;' class="table">
<tr>
	<td><b>Post Date:</b></td>
	<td><?= $row[1] ?></td>
<tr>
<tr>
	<td><b>Post By:</b></td>
	<td><?= $row[2] ?></td>
<tr>
<tr>
	<td><b>Feedback:</b></td>
	<td><?= $row[3] ?></td>
<tr>
</table>
<?php }

 $rs = mysqli_query($con, 'select current_date');
 $row = mysqli_fetch_row($rs);
 ?>
<form method='post' action='feedback.php'>
<table class="table">
<tr>
	<td>Date:</td>
	<td><input type='text' name='fdate' value='<?= $row[0] ?>' readOnly></td>
</tr>
<tr>
	<td>Name:</td>
	<td><input type='text' name='name' required></td>
</tr>
<tr>
	<td>Feedback:</td>
	<td><textarea rows=4 cols=50 name='msg' required></textarea></td>
</tr>
<tr>
	<td><input type='submit' value='POST' name="submit" class="btn btn-success"></td>
	<td><input type='reset' value='CLEAR' class="btn btn-success"></td>
</tr>
</table>
</form>

	</div>
</body>
	
