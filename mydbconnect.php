<?php


$servername = "localhost";
$username = "root";
$password = "";
$db="of10";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// select database
  if (mysqli_select_db( $conn, $db) === false)
      die("Could not select database");

//mysqli_close(mysqli_connect($hostname,$username,$password,$database)); //closing connection


?>
