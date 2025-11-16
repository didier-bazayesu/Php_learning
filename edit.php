<?php
// --- Database connection setup ---
$server_name = "localhost";
$username = "root";
$password = "";
$database = "student_managment";

$connection = mysqli_connect($server_name, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- Initialize variables ---
$id = "";
$first_name = "";
$last_name = "";
$email = "";
$reg_number = "";
$enroll_course = "";
$error = "";

// --- Get data from URL (id) ---
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {//
        $row = mysqli_fetch_assoc($result);
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $email = $row["email"];
        $reg_number = $row["reg_number"];
        $enroll_course = $row["enroll_course"];
    } else {
        die("Student not found!");
    }
} else {
    die("No student ID provided!");
}

// --- Handle form submission (update data) ---
if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $reg_number = $_POST["reg_number"];
    $enroll_course = $_POST["enroll_course"];

    $update_query = "UPDATE students 
                     SET first_name='$first_name', 
                         last_name='$last_name', 
                         email='$email', 
                         reg_number='$reg_number', 
                         enroll_course='$enroll_course'
                     WHERE id=$id";

    $result = mysqli_query($connection, $update_query);

    if ($result) {
        // ✅ Redirect back to index.php after successful update
        header("Location: index.php");
        exit();
    } else {
        $error = "❌ Failed to update record: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

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

        .error-message {
            position: fixed;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            color: red;
            font-weight: bold;
            font-size: 16px;
            z-index: 1000;
        }
    </style>
</head>

<body>

    <?php if (!empty($error)): ?>
        <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <h2 style="text-align:center;">Edit Student</h2>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row["first_name"] ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

        <label for="reg_number">Reg Number:</label>
        <input type="text" name="reg_number" value="<?= htmlspecialchars($reg_number) ?>" required>

        <label for="enroll_course">Enroll Course:</label>
        <input type="text" name="enroll_course" value="<?= htmlspecialchars($enroll_course) ?>" required>

        <input type="submit" name="submit" value="Update">
        <a href="index.php" role="button">Back</a>
    </form>

</body>

</html>