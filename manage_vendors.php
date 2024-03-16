<?php
session_start();

include 'dbconnect.php';

if (!isset($_SESSION['aid'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['statusid'])) {
    $status = $_GET['status'] == 0 ? 1 : 0;
    mysqli_query(
        $con,
        "update vendor set v_status=$status where v_id=" . $_GET['statusid']
    );
}
$results_per_page = 5;

$result1 = mysqli_query($con, 'SELECT * FROM vendor');
$number_of_results = mysqli_num_rows($result1);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$page_next = $page + 1;
$page_previous = $page - 1;

$this_page_first_result = $page > 1 ? ($page - 1) * $results_per_page : 0;

$result = mysqli_query(
    $con,
    "SELECT * FROM vendor ORDER BY v_id LIMIT $this_page_first_result, $results_per_page"
);
$count = mysqli_num_rows($result);

if ($page > $number_of_pages) {
    header('Location: manage_vendors.php?page=' . $number_of_pages);
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

<script type="text/javascript">
	function del(id){
		swal({
		  title: "Delete",
		  text: "Do you want to delete?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  closeOnConfirm: false
		},
		function(){
		  location.href="delete_vendor.php?id="+id;
		});	
	}
</script>

	<div class="wrapper">
		<?php include 'admin-sidebar.php'; ?>
		
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<nav class="bar">
							<a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
						</nav>
						<div class="below-toggle-content">
							<div class="col-md-12">
								<div class="top-part mb-3">
									<h2 class="d-inline">Manage</h2>
									<p class="d-inline ml-2">Vendors</p>
									<a href="admin_home.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: right; font-weight: 500;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
								</div>
								<div class="row">
									<div class="col-md-4 mt-2 mb-4 ml-auto">
										<div class="input-group">
						                	<input type="text" name="search" id="search" onkeyup="SearchField();" class="form-control shadow-none" placeholder="Search Users">
						                	<span class="input-group-btn">
						                		<button class="btn btn-primary shadow-none" id="search-button">Search</button>
						                 	</span>
						               	</div>
									</div>
									<table class="table table-hover mx-3" id="user_table">
										<thead class="thead-dark">
									    	<tr>
												<th scope="col"></th>
									      		<th scope="col">ID</th>
									      		<th scope="col">Business Name</th>
									      		<th scope="col">Owner</th>
									      		<th scope="col">Address</th>
									      		<th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Website</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Status</th>
									      		<th scope="col">Action</th>
									    	</tr>
									  	</thead>
									  	<tbody id="display">
									  			<?php if ($count > 0) {
                  while ($data = mysqli_fetch_assoc($result)) { ?>			
									  		<tr>
    		  									<td><img src="<?= $data[
                     'v_pic'
                 ] ?>" width="150" height="150" alt=""> </td>
												<td><?php echo $data['v_id']; ?></td>	
												<td><?php echo $data['v_name']; ?></td>	
												<td><?php echo $data['v_contact_person']; ?></td>	
												<td><?php echo $data['v_address']; ?></td>
												<td><?php echo $data['v_phone']; ?></td>
												<td><?php echo $data['v_email']; ?></td>
                                                <td><?php echo $data[
                                                    'v_type'
                                                ]; ?></td>	
                                                <td><a href="<?php echo $data[
                                                    'v_website'
                                                ]; ?>" style="text-decoration: none;"><?php echo $data[
    'v_website'
]; ?></a></td>
                                                <td><a title="<?php echo $data[
                                                    'v_description'
                                                ]; ?>">View</a></td>
                                                <td><a href="manage_vendors.php?statusid=<?= $data[
                                                    'v_id'
                                                ] ?>&status=<?= $data[
    'v_status'
] ?>" style="text-decoration:none;"><?= $data['v_status'] == 0
    ? 'Not Verified'
    : 'Verified' ?></a></td>	        
												<td>
												    <div class="row">
												        <a onclick="del(<?= $data[
                        'v_id'
                    ] ?>)" class="btn btn-sm btn-danger">Delete</a>
												    </div>
												</td>

									    		</tr>      		
												<?php }
              } else {
                  echo "<h5 class='text-danger mb-3'>No data to display.<h5>";
              } ?> 
									  	</tbody>
									</table>


									<nav aria-label="Page navigation example" style="background-color: transparent;">
		                              <ul class="pagination justify-content-end">

		                                <?php if ($page > 1) { ?>  
		                                     
		                                  <li class="page-item"><a href="<?php echo 'manage_vendors.php?page=' .
                                        $page_previous; ?>" class="page-link">Previous</a></li>               
		                                  
		                                <?php } ?>   

		                                  <?php for (
                                        $page = 1;
                                        $page <= $number_of_pages;
                                        $page++
                                    ) {
                                        echo '<li class="page-item"><a href="manage_vendors.php?page=' .
                                            $page .
                                            '" class="page-link">' .
                                            $page .
                                            ' ' .
                                            '</a></li>';
                                    } ?>

		                                <?php if ($page >= 1) { ?>  
		                                      
		                                  <li class="page-item "><a href="<?php echo 'manage_vendors.php?page=' .
                                        $page_next; ?>" class="page-link">Next</a></li>

		                                <?php } ?>    
		                                      
		                              </ul>
		                          	</nav>
									
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

	<script type="text/javascript">
		function SearchField() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "vendor_search.php?search="+document.getElementById('search').value, false);
			xmlhttp.send(null);

			document.getElementById('display').innerHTML=xmlhttp.responseText;
      	}
	</script>
</body>
</html>