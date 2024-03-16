<?php
include 'dbconnect.php';

$search = $_GET['search'];

$result = mysqli_query(
    $con,
    "SELECT * FROM vendor WHERE v_id like ('%$search%') OR v_name like ('%$search%') OR v_contact_person like ('%$search%') OR v_address like ('%$search%') OR v_phone like ('%$search%') OR v_email like ('%$search%') OR v_description like ('%$search%') OR v_type like ('%$search%') OR v_website like ('%$search%') ORDER BY v_id"
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
          echo "<h5 class='text-danger mt-3 mb-3'>No data to display.<h5>";
      } ?>       			    	    	
		</tbody>
		</table>
	</body>
</html>   		
