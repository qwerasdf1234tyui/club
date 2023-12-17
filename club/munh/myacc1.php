<?php 
session_start();


// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Retrieving user-specific information (you can modify this based on your database structure)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$s_id = $_SESSION["student_code"];
$stmt = $conn->prepare("SELECT firstname, lastname, course, class_n FROM student WHERE student_code = ?");
$stmt->bind_param("s", $s_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $course, $class_n);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <style>
        body{background-color:rgb(203, 135, 235);}
        </style>
</head>
<body>
  <table class="main">
    <tr>
      <td class="home">
        <ul>
          <li class="li"><a href="../nomin/index.php">Home</a></li>
         
          <li class="li"><a href="">My account</a></li>
          <li class="li"><a href="../saruul/login.php">Logout</a></li>
        </ul>
      </td>
     
    </tr>
    <tr>      
    
</table>
<div class="container" >
        <p class="h">My Account</p>
        <div class="form-container">
            <input class="p" value=" <?php echo $lastname . " " . $firstname; ?>" >Welcome</p>
           <p> <input class="p" value="  <?php echo $s_id; ?>"> Student ID:</p>
            <p class="p">Course: <?php echo $course; ?></p>
            <p class="p">Class: <?php echo $class_n; ?></p>

           
           
        </div>
    </div>
</html>
<?php
