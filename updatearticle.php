<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

	require_once('connection.php');
	$conn = Connect();

	$id = $conn->real_escape_string($_POST['contid']);
	$cont = $conn->real_escape_string($_POST['updcontent']);
	$user = $conn->real_escape_string($_POST['user_id']);
	$page = $conn->real_escape_string($_POST['page']);

	$query = "UPDATE article 
				SET art_content = '$cont', 
					art_updater = '$user', 
					art_page = '$page'  
				WHERE art_id='$id'";

	$success = $conn->query($query);

	if (!$success) {
	    die("Couldn't delete data: ".$conn->error);
	}

	echo "<p>Content updated successfully ..!! </p>";

	$conn->close();
?>