<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$s_id = $_SESSION["student_code"];
$sql ="SELECT * FROM student WHERE student_code = '$s_id' ";
$result = mysqli_query($connection, $sql ) or die("died");
while($arr=mysqli_fetch_row($result)){
     $user_id = $arr[0];
     $firstname = $arr[1];
     $lastname = $arr[2];
     $course = $arr[3];
     $student_code = $arr[4];
     // array, list
}

$sql2 = "INSERT INTO request (firstname, lastname, course, student_code, user_id_) 
          VALUES ('$firstname', '$lastname', '$course', '$student_code', '$user_id')";
$result = mysqli_query($connection, $sql2 ) or die("");

echo "<script>alert('requested.'); history.back();</script>";

?>