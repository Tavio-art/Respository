<?php

$host = "localhost";
$user = "root";
$pass = "";         
$db   = "maines_db";

$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

?>