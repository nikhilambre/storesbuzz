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
	$conn = Connect();

	$id = $conn->real_escape_string($_POST['catid']);
	$cname = $conn->real_escape_string($_POST['catname']);
	$cactive = $conn->real_escape_string($_POST['catact']);

	$query = "UPDATE category SET catg_name = '$cname', catg_active = '$cactive' WHERE cat_id='$id'";
	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't Edit data: ".$conn->error);
	}
	$conn->close();

	echo "<p>Category Edited successfully ..!! </p>";

?>