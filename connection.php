<?php


function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "pixel_coders_db";

 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

 if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

 return $conn;
}
 
?>