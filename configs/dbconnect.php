<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "employees";
$port = "8889";
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname, $port);


// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
};
?>
