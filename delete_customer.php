<?php
include 'dbconnect.php';

$cust_id = $_GET['id'];
$query = 'DELETE FROM customer WHERE cust_id = ' . $cust_id;
mysqli_query($con, $query);
header('Location: manage_customer.php');
?>
