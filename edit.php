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
$result = $conn->query("SELECT * FROM students WHERE id=$id");
if ($result->num_rows != 1) die("Student not found");
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $reg_number = $_POST['reg_number'];
    $enroll_course = $_POST['enroll_course'];

    $stmt = $conn->prepare("UPDATE students SET first_name=?, last_name=?, email=?, reg_number=?, enroll_course=? WHERE id=?");
    $stmt->bind_param("sssssi", $first_name, $last_name, $email, $reg_number, $enroll_course, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<form method="post">
    <h2>Edit Student</h2>
    <label>First Name:</label><input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>" required><br>
    <label>Last Name:</label><input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>" required><br>
    <label>Email:</label><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required><br>
    <label>Reg Number:</label><input type="text" name="reg_number" value="<?= htmlspecialchars($row['reg_number']) ?>" required><br>
    <label>Enroll Course:</label><input type="text" name="enroll_course" value="<?= htmlspecialchars($row['enroll_course']) ?>" required><br>
    <input type="submit" name="submit" value="Update">
    <a href="index.php">Back</a>
</form>