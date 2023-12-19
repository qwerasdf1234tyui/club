<?php
@session_start();
if (isset($_GET['user_id_'])) {
    $_SESSION['s_id'] = $_GET['user_id_'];
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$a_id = $_SESSION['admin_id'];
$s_id = $_SESSION['s_id'];
$sql ="DELETE FROM request WHERE user_id_='$s_id';";
if($connection->query($sql)===TRUE){
  echo "<script>alert('Student ID: ' + $s_id + ' rejected.');</script>";
  echo "<script>history.back();</script>";
}
else{
  echo"error" .$connection->error;
}
$connection->close();

?>

