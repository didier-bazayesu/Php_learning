<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <style>
        /* General body styling */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Form container */
        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        /* Form labels */
        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        /* Inputs and select */
        form input[type="text"],
        form input[type="email"],
        form select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="email"]:focus,
        form select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Submit button */
        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Success and error messages */
        .success-message {
            position: fixed;
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
            word-wrap: break-word;

        }
    </style>
</head>



<?php

//$server_name = "localhost";
// $username = "root";
// $password = "";
// $database = "student_managment";

$conn = mysqli_connect($server_name, $username, $password, $database);

// include("connection.php");

if (isset($_POST['submit'])) {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $reg_number = $_POST['reg_number'];
    $enroll_course = $_POST['enroll_course'];


    $query = "INSERT INTO students (first_name, last_name, email, reg_number, enroll_course)
              VALUES ('$first_name', '$last_name', '$email', '$reg_number', '$enroll_course')";

    $result = mysqli_query($connn, $query);
    if (!$result) {
        die("there is the proble in inserting");
    } else {
        header("Location:index.php");
        exit();
        die("data inserted successfully");
    }
}


// header("http://localhost/php%20activities/video%20tutrial/studentManagment/index.php")
?>




<body>




    <form action="" method="post">




        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" placeholder="Please enter first name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" placeholder="Please enter last name" required>

        <label for="email">email:</label>
        <input type="email" name="email" placeholder="Your Email" required>


        <label for="reg_number">Reg_number:</label>
        <input type="text" id="reg_number" name="reg_number" placeholder="Enter reg_number" required>

        <label for="enroll_course">Enroll_course</label>
        <input type="text" id="enroll_course" name="enroll_course" required placeholder="Course_required">

        <input type="submit" name="submit" value="Submit">
        <input name="select">
        <a href="index.php" role="button"> Back</a>
    </form>

</body>

</html>