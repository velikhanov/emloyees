<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "employees";
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
};
?>
