<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM thali WHERE t_id like ('%$search%') OR t_name like ('%$search%') OR t_type like ('%$search%') OR t_rate like ('%$search%') ORDER BY t_id"
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
												      		<td><?php echo $data['t_id']; ?></td>	
												      		<td><?php echo $data['t_name']; ?></td>	
												      		<td><?php echo $data['t_type']; ?></td>
												      		<td><?php echo $data['t_rate']; ?></td>
												      		<td><a href="<?= $data['t_img'] ?>">View</a></td>
												      		<td>
												      			<div class="row">
												      				<a href="update_thali.php?id=<?php echo $data[
                          't_id'
                      ]; ?>" class="btn btn-sm btn-primary mr-2 edit_data">Edit</a>
												      				<a onclick="del(<?= $data[
                          't_id'
                      ] ?>)" class="btn btn-sm btn-danger">Delete</a>
												      			</div>
												      		</td>

									    		</tr>      				<?php }
      } else {
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
