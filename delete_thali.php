<?php
include 'dbconnect.php';

$t_id = $_GET['id'];
$rs = mysqli_query($con, 'SELECT * from thali where t_id=' . $t_id);
$row = mysqli_fetch_assoc($rs);
unlink($row['t_img']);
$query = 'DELETE FROM thali WHERE t_id = ' . $t_id;
mysqli_query($con, $query);
header('Location: manage_thali.php');
?>
