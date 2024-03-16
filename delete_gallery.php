<?php
include 'dbconnect.php';

$g_id = $_GET['id'];
$rs = mysqli_query($con, 'SELECT * from gallery where g_id=' . $g_id);
$row = mysqli_fetch_assoc($rs);
unlink($row['g_img']);
$query = 'DELETE FROM gallery WHERE g_id = ' . $g_id;
mysqli_query($con, $query);
header('Location: manage_gallery.php');
?>
