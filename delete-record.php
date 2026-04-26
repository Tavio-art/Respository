<?php
session_start();
include 'connection.php';

if (!isset($_GET['id'])) {
    $_SESSION['status'] = "No ID provided!";
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];

$query = "DELETE FROM record WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    $_SESSION['status'] = "Record deleted successfully!";
} else {
    $_SESSION['status'] = "Delete failed!";
}

header("Location: index.php");
exit();
?>