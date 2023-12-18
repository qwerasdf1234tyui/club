<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="club";

    $conn = new mysqli($servername, $username, $password, $database);
   if($conn->connect_error){
    die("connection".$conn->connect_error);
   }
    $sql ="DELETE FROM student WHERE id='1';";
    if($conn->query($sql)===TRUE){
      echo "delete success";
    }
    else{
      echo"error" .$conn->error;
    }
$conn->close();
?>
