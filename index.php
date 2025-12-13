 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        form input[type="number"],
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
        form input[type="number"]:focus,
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

<body>

   

    <form action="" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" placeholder="Please enter first name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" placeholder="Please enter last name" required>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" placeholder="Your gender" required>

        <label for="province">Province:</label>
        <select name="province" id="province" required>
            <option value="">--Select Province--</option>
            <option value="Eastern">Eastern</option>
            <option value="Northern">Northern</option>
            <option value="Southern">Southern</option>
            <option value="Western">Western</option>
            <option value="Kigali">Kigali</option>
        </select>

        <label for="phone_number">Phone Number:</label>
        <input type="number" id="phone_number" name="phone_number" placeholder="Enter phone number" required>

        <input type="submit" name="submit" value="Submit">
    </form>
    
    
    
</body>

<a href="signup.php">Signup</a>
</html>