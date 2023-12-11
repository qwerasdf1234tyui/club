<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "club";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed". $connection->connect_error);}


$clubId = $_GET['a'];

// MySQL에서 해당 동아리 정보 가져오기
$sql = "SELECT * FROM club WHERE id = $clubId";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // 이미지와 동아리 이름 출력
    echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
    echo '<h2>' . $row["name"] . '</h2>';
    // 추가적인 동아리 정보를 출력할 수 있습니다.
} else {
    echo "동아리를 찾을 수 없습니다.";
}

// MySQL 연결 종료
$connection->close();
?>
?>