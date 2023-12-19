<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST["login"])) {
    
    $club_id = isset($_POST["ID"]) ? mysqli_real_escape_string($conn, $_POST["ID"]) : '';
    $club_name= isset($_POST["club_name"]) ? mysqli_real_escape_string($conn, $_POST["club_name"]) : '';
    $location = isset($_POST["location"]) ? mysqli_real_escape_string($conn, $_POST["location"]) : '';
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conn, $_POST["email"]) : '';
    $phone = isset($_POST["phone"]) ? mysqli_real_escape_string($conn, $_POST["phone"]) : '';
    $date = isset($_POST["date"]) ? mysqli_real_escape_string($conn, $_POST["date"]) : '';
    $time = isset($_POST["time"]) ? mysqli_real_escape_string($conn, $_POST["time"]) : '';
    $image = isset($_POST["image"]) ? mysqli_real_escape_string($conn, $_POST["image"]) : '';
    $about = isset($_POST["about"]) ? mysqli_real_escape_string($conn, $_POST["about"]) : '';


    $stmt = $conn->prepare("SELECT * FROM club WHERE id = $club_id");
    $stmt->bind_param("sssssssss", $club_id, $club_name, $location, $email, $phone, $date, $time, $image, $about);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // login success!
        $_SESSION["club_id"] = $club_id;
        $_SESSION["club_name"]  = $club_name;
        $_SESSION["location"] = $location;
        $_SESSION["email"] = $email;
        $_SESSION["phone"] = $phone;
        $_SESSION["date"] = $date;
        $_SESSION["time"] = $time;
        $_SESSION["image"] = $image;
        $_SESSION["about"] = $about;
        echo "<script>alert('Student ID: ' + $club_id + ' rejected.');</script>";


        // header("Location: ../nomin/index.php"); // Redirect to welcome page or dashboard
        exit();
    } else {
        // Login failed
        $_SESSION["error"] = "incorrect_pass";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
}

$conn->close();



?>