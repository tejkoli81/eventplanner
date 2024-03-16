<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM planner WHERE planner_id like ('%$search%') OR planner_name like ('%$search%') OR planner_address like ('%$search%') OR planner_phone like ('%$search%') OR planner_email like ('%$search%') ORDER BY planner_id"
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
				  											<td><img src="<?= $data[
                     'planner_pic'
                 ] ?>" width="150" height="150" alt=""> </td>
												      		<td><?php echo $data['planner_name']; ?></td>	
												      		<td><?php echo $data['planner_address']; ?></td>
												      		<td><?php echo $data['planner_phone']; ?></td>
												      		<td><?php echo $data['planner_email']; ?></td>

									    		</tr>      		
				<?php }
      } else {
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
