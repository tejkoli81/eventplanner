<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM venue WHERE venue_id like ('%$search%') OR venue_name like ('%$search%') OR venue_contact_person like ('%$search%') OR venue_address like ('%$search%') OR venue_phone like ('%$search%') OR venue_email like ('%$search%') OR venue_rate like ('%$search%') OR venue_lat like ('%$search%') OR venue_long like ('%$search%') ORDER BY venue_id"
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
                     'venue_img'
                 ] ?>" width="150" height="150" alt=""> </td>
												      		<td><?php echo $data['venue_id']; ?></td>	
												      		<td><?php echo $data['venue_name']; ?></td>	
												      		<td><?php echo $data['venue_contact_person']; ?></td>	
												      		<td><?php echo $data['venue_address']; ?></td>
												      		<td><?php echo $data['venue_phone']; ?></td>
												      		<td><?php echo $data['venue_email']; ?></td>
												      		<td><?php echo $data['venue_rate']; ?></td>
												      		<td><?php printf('%.2f', $data['venue_lat']); ?></td>
												      		<td><?php printf('%.2f', $data['venue_long']); ?></td>
												      		<td>
												      			<div class="row">
												      				<a href="update_venue.php?id=<?php echo $data[
                          'venue_id'
                      ]; ?>" class="btn btn-sm btn-primary" title="Edit"> <i class="fas fa-edit"></i></a>&nbsp;&nbsp; 
												      				 <a onclick="del(<?= $data[
                           'venue_id'
                       ] ?>)" class="btn btn-sm btn-danger" title="Delete"> <i class="fa fa-trash" aria-hidden="true"></i></a>
												      			</div>
												      		</td>

									    		</tr>      						<?php }
      } else {
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
