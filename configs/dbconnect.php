<?php
session_start();
// $servername = "127.0.0.1";
// $username = "root";
// $password = "root";
// $dbname = "employees";
// // Create connection
// $connection = new mysqli($servername, $username, $password, $dbname);
//
//
// // Check connection
// if ($connection->connect_error) {
//   die("Connection failed: " . $connection->connect_error);
// };
// config/database.php

if ($url = env('DATABASE_URL', false)) {
    $parts = parse_url($url);
    $host = $parts["host"];
    $username = $parts["user"];
    $password = $parts["pass"];
    $database = substr($parts["path"], 1);
} else {
    $host = env('DB_HOST', 'localhost');
    $username = env('DB_USERNAME', 'forge');
    $password = env('DB_PASSWORD', '');
    $database = env('DB_DATABASE', 'forge');
}

// ...
'pgsql' => [
    'driver' => 'pgsql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '5432'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8',
    'prefix' => '',
    'prefix_indexes' => true,
    'schema' => 'public',
    'sslmode' => 'prefer',
],
?>
