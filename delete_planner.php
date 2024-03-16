<?php
include 'dbconnect.php';

$planner_id = $_GET['id'];
$rs = mysqli_query(
    $con,
    'SELECT * from planner where planner_id=' . $planner_id
);
$row = mysqli_fetch_assoc($rs);
unlink($row['planner_pic']);
$query = 'DELETE FROM planner WHERE planner_id = ' . $planner_id;
mysqli_query($con, $query);
header('Location: manage_planners.php');
?>
