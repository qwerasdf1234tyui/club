<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "club";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$s_id = $_SESSION["student_code"];

// Handle form submission for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["pass"];

    // Update the user information in the database
    $stmt = $conn->prepare("UPDATE student SET pass = ? WHERE student_code = ?");
    $stmt->bind_param("ss", $new_password, $s_id);
    $stmt->execute();
    $stmt->close();
}

// Retrieve user-specific information
$stmt = $conn->prepare("SELECT pass FROM student WHERE student_code = ?");
$stmt->bind_param("s", $password);
$stmt->execute();
$stmt->bind_result($password);
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
                    <li class="li"><a href="./myacc1.php">My account</a></li>
                    <li class="li"><a href="../saruul/login.php">Logout</a></li>
                </ul>
            </td>
        </tr>
    </table>
    <div class="container">
        <p class="h">My Account</p>
        <div class="form-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return showSuccessAlert();">
            <div class="input-name">
                <label for="pass">Change password:</label>
                <input type="password" name="pass" value="<?php echo $password; ?>">
                </div>
                <div class ="input-name">
                <input type="submit" value="Update">
                      </div>
            </form>
        </div>
    </div>
    <script>
        function showSuccessAlert() {
            alert("Update successful!");
            return true; // Allow the form submission to proceed
        }
    </script>
</body>
</html>
