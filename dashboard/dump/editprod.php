<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

	require_once('connection.php');
	$conn = Connect();

	$id = $conn->real_escape_string($_POST['prodid']);
	$pname = $conn->real_escape_string($_POST['prodname']);
	$pactive = $conn->real_escape_string($_POST['prodact']);
	$pprice = $conn->real_escape_string($_POST['prodpri']);

	$query = "UPDATE product SET prodc_name = '$pname', prodc_active = '$pactive', prodc_price = '$pprice'  WHERE prd_id='$id'";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't Edit data: ".$conn->error);
	}
	$conn->close();

	echo "<p>Product Edited successfully ..!! </p>";


?>