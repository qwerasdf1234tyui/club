<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$a_id = $_SESSION['admin_id'];
$s_id = $_SESSION['s_id'];
$sql2 = "INSERT INTO member (student_id, admin_id) 
          VALUES ('55','$a_id')";
$result = mysqli_query($connection, $sql2 ) or die("");

echo "<script>alert('requested.'); history.back();</script>";

?>