<?php
@session_start();
if (isset($_GET['user_id_'])) {
    $_SESSION['s_id'] = $_GET['user_id_'];
}
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$club_id = $_SESSION['admin_id'];
$s_id = $_SESSION['s_id'];
$sql2 = "INSERT INTO member (student_id, admin_id) VALUES ('$s_id','$club_id')";
$result = mysqli_query($connection, $sql2 ) or die("");



$sql ="DELETE FROM request WHERE user_id_='$s_id';";
$result = mysqli_query($connection, $sql ) or die("");
$connection->close();
  
echo "<script>history.back();</script>";
?>
