<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "club";


$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->close();
?>

<?php
$con=mysqli_connect("localhost","root","","club");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
