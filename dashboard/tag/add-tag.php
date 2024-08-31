<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

    if(isset($_SESSION['mem_id'])) {
        $userId = $_SESSION['mem_id'];
        $username = $_SESSION['username'];
        $imguser = $_SESSION['userimg'];
    } else {
      header('Location: ../index.php');
      die();
    }

	require_once('../connection.php');
	$conn    = Connect();

	$tagname   = $conn->real_escape_string($_POST['tagname']);

	$query   = "INSERT into tags ( tag_name ) VALUES('". $tagname ."')";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't enter data: ".$conn->error);
	}

	$conn->close();
	
	echo "Your Parent Tag is saved successfully ..!!";

?>