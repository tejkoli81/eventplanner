<?php
include 'dbconnect.php';

$v_id = $_GET['id'];
$rs = mysqli_query($con, 'SELECT * from vendor where v_id=' . $v_id);
$row = mysqli_fetch_assoc($rs);
unlink($row['v_pic']);
$query = 'DELETE FROM vendor WHERE v_id = ' . $v_id;
mysqli_query($con, $query);
header('Location: manage_vendors.php');
?>
