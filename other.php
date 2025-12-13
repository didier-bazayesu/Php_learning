<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }

        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h2>Student Information</h2>

        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" placeholder="Please enter student id" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" placeholder="Please enter first name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" placeholder="Please enter last name" required>

        <label for="phone">Phone Number:</label>
        <input type="number" name="phone" placeholder="Please enter phone number" required>

        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="select.php">back to the point</a>

    <?php

   







    ?>

</body>

</html>