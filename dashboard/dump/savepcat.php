<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

    if(isset($_SESSION['mem_id'])) {
        $userId = $_SESSION['mem_id'];
        $username = $_SESSION['username'];
        $imguser = $_SESSION['userimg'];
    } else {
      header('Location: index.php');
      die();
    }


	require_once('connection.php');
	$conn    = Connect();

	$pcat   = $conn->real_escape_string($_POST['pcatname']);

	$query   = "INSERT into parent_cat ( pcat_name ) VALUES('". $pcat ."')";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't enter data: ".$conn->error);
	}
	$conn->close();
	
	echo "Your Parent Category is saved successfully ..!!";

?>