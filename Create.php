<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "student_managment");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $reg_number = $_POST['reg_number'];
    $enroll_course = $_POST['enroll_course'];

    $stmt = $conn->prepare("INSERT INTO students (first_name,last_name,email,reg_number,enroll_course) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $reg_number, $enroll_course);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
</head>

<body>
    <form method="post">
        <h2>New Student</h2>
        <label>First Name:</label><input type="text" name="first_name" required><br>
        <label>Last Name:</label><input type="text" name="last_name" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Reg Number:</label><input type="text" name="reg_number" required><br>
        <label>Enroll Course:</label><input type="text" name="enroll_course" required><br>
        <input type="submit" name="submit" value="Submit">
        <a href="index.php">Back</a>
    </form>
</body>

</html>