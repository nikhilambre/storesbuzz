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

	$id = $conn->real_escape_string($_POST['msgid']);

	$query = "DELETE FROM tb_cform WHERE tb_id='$id'";
	$success = $conn->query($query);


	if (!$success) {
	    die("Couldn't delete data: ".$conn->error);
	}
	$conn->close();

	echo "<p>Message deleted successfully ..!! </p>";
?>