<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

	require_once('connection.php');
	$conn    = Connect();

	$prid    = $conn->real_escape_string($_POST['prodid']);
	$name    = $conn->real_escape_string($_POST['en_name']);
	$email   = $conn->real_escape_string($_POST['en_email']);
	$cont    = $conn->real_escape_string($_POST['en_cont']);
	$message = $conn->real_escape_string($_POST['en_msg']);

	$query   = "INSERT into enquiries (
							enq_name,
							enq_email,
							enq_cont,
							enq_prd_id,
							enq_txt) VALUES(
							'" . $name . "',
							'" . $email . "',
							'" . $cont . "',
							'" . $prid . "',
							'" . $message . "')";

	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't enter data: ".$conn->error);
	}

	echo "Thank You For Contacting Us <br>";

	$conn->close();

?>
