<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "student_managment");
if (!$conn) die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['username'], $_POST['password'])) {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=? LIMIT 1");
    $stmt->bind_param("s", $username_input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password_input, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $username;
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=Invalid%20password");
            exit();
        }
    } else {
        header("Location: login.php?error=User%20not%20found");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
