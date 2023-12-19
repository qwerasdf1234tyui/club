<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$s_id = $_SESSION["student_code"];//SE20D002
// -------------------------- db, s_id duudsan bga.
//sql query 
$sql1 = "SELECT COUNT(student_code) as count FROM request WHERE student_code = '$s_id'";
//query 실행
$result1 = mysqli_query($connection, $sql1);
//결과 확인
if($result1) {
     $row1 = mysqli_fetch_array($result1);
     $count = $row1['count'];
     //만약에 학생 코드가 있으면 너 이미 보냈다. 반환 끝
     if($count > 0) {
          echo "<script>alert('you already sent request.'); history.back();</script>";
     }else{
          //se20D002 gdg code toi muriig gargaj ireh
          $sql2 ="SELECT id, firstname, lastname, course, student_code FROM student WHERE student_code = '$s_id' ";
          $result2 = mysqli_query($connection, $sql2 ) or die("died");
          while($arr=mysqli_fetch_row($result2)){
               $user_id = $arr[0];
               $firstname = $arr[1];
               $lastname = $arr[2];
               $course = $arr[3];
               $student_code = $arr[4];
          }
          $sql3 = "INSERT INTO request (firstname, lastname, course, student_code, user_id_) 
               VALUES ('$firstname', '$lastname', '$course', '$student_code', '$user_id')";
               $result3 = mysqli_query($connection, $sql3 ) or die("");
               echo "<script>alert('requested.'); history.back();</script>";
          
     }
}else{
     echo "error: " .mysqli_error($connection);
}

?>