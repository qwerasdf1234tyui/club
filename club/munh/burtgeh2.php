<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "club";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $cname = isset($_POST["cname"]) ? mysqli_real_escape_string($conn, $_POST["cname"]) : '';
    $category = isset($_POST["category"]) ? mysqli_real_escape_string($conn, $_POST["category"]) : '';
    $location = isset($_POST["location"]) ? mysqli_real_escape_string($conn, $_POST["location"]) : '';
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conn, $_POST["email"]) : '';
    $phone = isset($_POST["phone"]) ? mysqli_real_escape_string($conn, $_POST["phone"]) : '';
    $date = isset($_POST["date"]) ? mysqli_real_escape_string($conn, $_POST["date"]) : '';
    $time = isset($_POST["time"]) ? mysqli_real_escape_string($conn, $_POST["time"]) : '';
    $image = isset($_POST["image"]) ? mysqli_real_escape_string($conn, $_POST["image"]) : '';
    $about = isset($_POST["about"]) ? mysqli_real_escape_string($conn, $_POST["about"]) : '';


    $stmt = $conn->prepare("INSERT INTO club (name,category, bairshil, email, phone, dat, hugtsaa, img, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $cname,$category, $location, $email, $phone, $date, $time, $image, $about);

    try {
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Registration successful
            echo '<script>alert("Registration successful. Redirecting to login form.");';
            echo 'window.location.href = "login.php";</script>';
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle specific error codes
        if ($e->getCode() == 1062) {
            echo '<script>';
            echo 'alert("Student ID is already registered. Please use a different Student ID.");';
            echo 'window.location.href = "reg.php";';
            echo '</script>';
            exit();
        } else {
            // General error
            echo '<script>';
            echo 'alert("Error: ' . $e->getMessage() . '");';
            echo 'window.location.href = "club_burtgeh.php";';
            echo '</script>';
            exit();
        }
    }

    $stmt->close();
}

$conn->close();
?>
