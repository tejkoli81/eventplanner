<?php

session_start();

include 'dbconnect.php';

if (!isset($_SESSION['cid'])) {
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
	<title>Absolute Events - Customer</title>
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
<script>
function show(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get-thali.php?v_id=" + str, true);
    xmlhttp.send();
  }
}
</script>
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
									<h2 class="d-inline">Add</h2>
									<p class="d-inline ml-2">Booking</p>
									<a href="cust_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<a href="view_bookings.php" class="btn btn-primary ml-3 mb-2">Manage Bookings</a>
								</div>
								<div class="row">
<?php
$rs = mysqli_query(
    $con,
    "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'eventplanner_db' AND TABLE_NAME = 'Booking';"
);
$row = mysqli_fetch_row($rs);
$bno = $row[0];

$rs = mysqli_query($con, 'select current_date');
$row = mysqli_fetch_row($rs);
$bdate = $row[0];
?>

                                <form method="POST" class="w-100 p-3" action="booking1.php">
										<div class="form-group">
									    	<label for="bno" style="font-weight: 600;">Booking#</label>
									    	<input type="text" name="bno" class="form-control shadow-none" id="bno" value="<?= $bno ?>" readOnly>
									  	</div>
                                        <div class="form-group">
									    	<label for="bdate" style="font-weight: 600;">Booking Date</label>
									    	<input type="text" name="bdate" class="form-control shadow-none" id="bdate" value="<?= $bdate ?>" readOnly>
									  	</div>
                                        <div class="form-group">
									    	<label for="edate" style="font-weight: 600;">Event Date</label>
									    	<input type="date" name="edate" class="form-control shadow-none" id="edate" required>
									  	</div>
                                        <div class="form-group">
									    	<label for="ename" style="font-weight: 600;">Event Name</label>
									    	<input type="text" name="ename" class="form-control shadow-none" id="ename" placeholder="Enter Event Name" required>
									  	</div>
                                        <div class="form-group">
									    	<label for="venueid" style="font-weight: 600;">Venue</label>
                                            <select name='venueid' class="form-control shadow-none" id="venueid" required>
                                            <option value=''>Select Venue</option>
                                            <?php
                                            $rs = mysqli_query(
                                                $con,
                                                'select * from venue'
                                            );
                                            while (
                                                $row = mysqli_fetch_row($rs)
                                            ) { ?>
                                            <option value=<?= $row[0] ?>><?= $row[1] ?></option>
                                            <?php }
                                            ?>
                                			</select>				    	
									  	</div>
                                        <div class="form-group">
									    	<label for="did" style="font-weight: 600;">Decorator</label>
                                            <select name='did' class="form-control shadow-none" id="did" required>
                                            <option value=''>Select Decorator</option>
                                            <?php
                                            $rs = mysqli_query(
                                                $con,
                                                "select * from vendor where v_type='Decorator'"
                                            );
                                            while (
                                                $row = mysqli_fetch_row($rs)
                                            ) { ?>
                                            <option value=<?= $row[0] ?>><?= $row[1] ?></option>
                                            <?php }
                                            ?>
                                			</select>				    	
									  	</div>
                                        <div class="form-group">
									    	<label for="catid" style="font-weight: 600;">Caterer</label>
                                            <select name='catid' class="form-control shadow-none" id="catid" onchange="show(this.value)" required>
                                            <option value=''>Select Caterer</option>
                                            <?php
                                            $rs = mysqli_query(
                                                $con,
                                                "select * from vendor where v_type='Caterer'"
                                            );
                                            while (
                                                $row = mysqli_fetch_row($rs)
                                            ) { ?>
                                            <option value=<?= $row[0] ?>><?= $row[1] ?></option>
                                            <?php }
                                            ?>
                                			</select>				    	
									  	</div>
                                        <div class="form-group" id="result">
									    	<label for="tid" style="font-weight: 600;">Thali</label>
                                            <select name='tid' class="form-control shadow-none" id="tid" required>
                                            <option value=''>Select Thali</option>
                                			</select>				    	
									  	</div>
                                        <div class="form-group">
									    	<label for="pid" style="font-weight: 600;">Photographer</label>
                                            <select name='pid' class="form-control shadow-none" id="pid" required>
                                            <option value=''>Select Photographer</option>
                                            <?php
                                            $rs = mysqli_query(
                                                $con,
                                                "select * from vendor where v_type='Photographer'"
                                            );
                                            while (
                                                $row = mysqli_fetch_row($rs)
                                            ) { ?>
                                            <option value=<?= $row[0] ?>><?= $row[1] ?></option>
                                            <?php }
                                            ?>
                                			</select>				    	
									  	</div>
                                        <div class="form-group">
									    	<label for="planid" style="font-weight: 600;">Planner</label>
                                            <select name='planid' class="form-control shadow-none" id="planid" required>
                                            <option value=''>Select Planner</option>
                                            <?php
                                            $rs = mysqli_query(
                                                $con,
                                                'select * from planner'
                                            );
                                            while (
                                                $row = mysqli_fetch_row($rs)
                                            ) { ?>
                                            <option value=<?= $row[0] ?>><?= $row[1] ?></option>
                                            <?php }
                                            ?>
                                			</select>				    	
									  	</div>
                                        <div class="form-group">
									    	<label for="nop" style="font-weight: 600;">No.of Persons</label>
									    	<input type="number" name="nop" class="form-control shadow-none" id="nop" required min=100>
									  	</div>                                        
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

<script>
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate()+1;
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        $('#edate').attr('min', maxDate);
    });    
    </script>
</body>
</html>