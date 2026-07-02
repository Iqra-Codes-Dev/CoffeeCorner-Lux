<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$dbname = getenv('DB_DATABASE');
$port = getenv('DB_PORT');

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
