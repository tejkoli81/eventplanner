<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM vendor WHERE (v_id like ('%$search%') OR v_name like ('%$search%') OR v_contact_person like ('%$search%') OR v_address like ('%$search%') OR v_phone like ('%$search%') OR v_email like ('%$search%') OR v_description like ('%$search%') OR v_website like ('%$search%')) AND v_type='Caterer' ORDER BY v_id"
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
                     'v_pic'
                 ] ?>" width="150" height="150" alt=""> </td>
												<td><?php echo $data['v_name']; ?></td>	
												<td><?php echo $data['v_contact_person']; ?></td>	
												<td><?php echo $data['v_address']; ?></td>
												<td><?php echo $data['v_phone']; ?></td>
												<td><?php echo $data['v_email']; ?></td>
                                                <td><a href="<?php echo $data[
                                                    'v_website'
                                                ]; ?>" style="text-decoration: none;"><?php echo $data[
    'v_website'
]; ?></a></td>
                                                <td><a title="<?php echo $data[
                                                    'v_description'
                                                ]; ?>">View</a></td>
												<td>
												    <div class="row">
												        <a href="view_caterer_gallery.php?v_id=<?= $data[
                        'v_id'
                    ] ?>" class="btn btn-sm btn-danger">Gallery</a>&nbsp;&nbsp;&nbsp;
												        <a href="view_caterer_thali.php?v_id=<?= $data[
                        'v_id'
                    ] ?>" class="btn btn-sm btn-danger">Thali</a>
												    </div>
						  						</td>

									    		</tr>    						<?php }
      } else {
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
