<?php
include 'dbconnect.php';

$f_id = $_GET['id'];
$query = 'DELETE FROM feedback WHERE f_id = ' . $f_id;
mysqli_query($con, $query);
header('Location: manage_feedbacks.php');
?>
