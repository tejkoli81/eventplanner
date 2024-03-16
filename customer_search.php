<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM customer WHERE cust_id like ('%$search%') OR cust_name like ('%$search%') OR cust_addr like ('%$search%') OR cust_phone like ('%$search%') OR cust_email like ('%$search%') ORDER BY cust_id"
);
$query_results = mysqli_num_rows($result);
?>
<!DOCTYPE html>
  	<html>
  	<head>
  		<title>
  			<style type="text/css">
				.active-status{
				  background-color: #28a745 !important;
				  font-size: 14px;
				  color: white;
				  padding: 1.5px 5px;
				  border-radius: 2px;
				}

				.inactive-status{
				  background-color: #dc3545 !important;
				  font-size: 14px;
				  color: white;
				  padding: 1.5px 5px;
				  border-radius: 2px;
				}
			</style>
  		</title>
  	</head>
  	<body> 	

	  	<table class='table table-striped'>
	    <tbody>
		    
	  			<?php if ($query_results > 0) {
          while ($data = mysqli_fetch_assoc($result)) { ?>	
		    <tr>
		  		
				      		<td><?php echo $data['cust_id']; ?></td>	
				      		<td><?php echo $data['cust_name']; ?></td>	
				      		<td><?php echo $data['cust_addr']; ?></td>
				      		<td><?php echo $data['cust_phone']; ?></td>
				      		<td><?php echo $data['cust_email']; ?></td>
							<td>
								<div class="row">
								<a onclick="del(<?= $data[
            'cust_id'
        ] ?>)" class="btn btn-sm btn-danger">Delete</a>
								</div>
							</td>
	    	</tr>      		
				<?php }
      } else {
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
