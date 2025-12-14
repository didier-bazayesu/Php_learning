<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "student_managment");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

if (!isset($_GET['id'])) die("No ID provided");

$id = (int)$_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");
header("Location: index.php");
exit();
