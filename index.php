<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "student_managment");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
        }

        .handle {
            width: 90%;
            margin: auto;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
    <div class="handle">
        <h1>Students List</h1>
        <p>Welcome, <strong><?= htmlspecialchars($_SESSION['user_name']); ?></strong> | <a href="logout.php">Logout</a></p>
        <a href="create.php">➕ New Student</a><br><br>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Reg Number</th>
                    <th>Enroll Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['reg_number']}</td>
    <td>{$row['enroll_course']}</td>
    <td>
    <a href='edit.php?id={$row['id']}'>Edit</a> | 
    <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
    </td>
    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>