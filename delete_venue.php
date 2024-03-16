<?php
include 'dbconnect.php';

$venue_id = $_GET['id'];
$rs = mysqli_query($con, 'SELECT * from venue where venue_id=' . $venue_id);
$row = mysqli_fetch_assoc($rs);
unlink($row['venue_img']);
$query = 'DELETE FROM venue WHERE venue_id = ' . $venue_id;
mysqli_query($con, $query);
header('Location: manage_venues.php');
?>
