<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <style>

        body{
          display: flex;
          justify-content: center;
          justify-items: center;
          background-color: grey/3;
          
        }

        .handle-color{
            background-color: grey;
        }

        tr td {
            width: 20px;
            height: 3px;
            color: while;
        }
    </style>
</head>
<body>

<div class="handle">
    <h1>Stundents List </h1>
    <a href="Create.php" role="button"> new Client

     </a>  <br>

    <table>
        <thead>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email<r>
            <th>reg_number</th>
            <th>enroll_course</th>
        </thead>

        <tbody>
            <?php
            $server_name = "localhost";
            $username = "root";
            $password = "";
            $database = "student_managment" ; 
            //create connection with database 
            $conn   = new mysqli($server_name,$username,$password,$database);

            //check connection 

            if($conn->connect_error){
                die("connection failed " . $conn-> connect_error);
            }


            // read the data from database ;
               $sql = "SELECT * FROM students";
               $result = $conn->query($sql);
                 
            // checking error 

            if(!$result){
                die("the invalid querry". $conn->connect_error);

            }

            // read using while loop 

            while($row= $result->fetch_assoc()){

                echo "
                 <tr class= 'handle-color'>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['reg_number']}</td>
                    <td>{$row['enroll_course']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                       <a href='delete.php?id={$row['id']}'>Delete</a> 
                    </td> 
                 </tr> 
                ";
            }
         


            ?>


        </tbody>
        
    </table>


</div>
    
</body>
</html>