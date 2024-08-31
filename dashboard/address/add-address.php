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

	$head   = $conn->real_escape_string($_POST['addrhead']);
	$body   = $conn->real_escape_string($_POST['addrbody']);
	$numb   = $conn->real_escape_string($_POST['addrnumb']);
	$name   = $conn->real_escape_string($_POST['addrname']);
	$email   = $conn->real_escape_string($_POST['addremail']);

	$query   = "INSERT into address ( 	
								addr_head,
								addr_body,
								addr_numb,
								addr_name,
								addr_email) 
							VALUES(	'". $head ."',
									'". $body ."',
									'". $numb ."',
									'". $name ."',
									'". $email ."')";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't enter data: ".$conn->error);
	}

	$conn->close();
	
	echo "Your Parent Address is saved successfully ..!!";

?>