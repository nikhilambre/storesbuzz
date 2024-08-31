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

	$socialicon   = $conn->real_escape_string($_POST['socico']);
	$sociallink   = $conn->real_escape_string($_POST['soclink']);

	$query   = "INSERT into social ( social_name, social_link ) VALUES('". $socialicon ."', '". $sociallink ."')";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't enter data: ".$conn->error);
	}

	$conn->close();
	
	echo "Your Social Link is saved successfully ..!!";

?>