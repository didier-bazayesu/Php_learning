<?php

$server_name = "localhost";
$username = "root";
$password = "";
$database = "student_managment";
//create connection with database 
$conn   = new mysqli($server_name, $username, $password, $database);

//check connection 

if ($conn->connect_error) {
    die("connection failed " . $conn->connect_error);
}


// read the data from database ;
if(isset($_GET['id'])){
    $id = $_GET['id'];
$sql = "Delete FROM students where id= '$id'";
$result = $conn->query($sql);

if($result){
    header("Location: index.php");
    exit();
}else{
        echo "❌ Error deleting record: " . $conn->error;
}
}

?>