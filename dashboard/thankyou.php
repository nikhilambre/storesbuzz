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

    if ($_POST['submit']){

		require_once('connection.php');
		$conn    = Connect();
		$name    = $conn->real_escape_string($_POST['u_name']);
		$email   = $conn->real_escape_string($_POST['u_email']);
		$cont    = $conn->real_escape_string($_POST['cont']);
		$message = $conn->real_escape_string($_POST['message']);
		
		$query   = "INSERT into tb_cform (u_name,u_email,cont,message) VALUES('" . $name . "','" . $email . "','" . $cont . "','" . $message . "')";
		
		$success = $conn->query($query);

		$conn->close();

		if (!$success) {
		    die("Couldn't enter data: ".$conn->error);

		}

		echo "Thank You For Contacting Us <br>";
	}

?>
<h2>
	<a href="../product.html">Continue your product search here</a>
</h2>