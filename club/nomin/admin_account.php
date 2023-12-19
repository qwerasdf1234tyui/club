<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: ../saruul/login.php"); // Redirect to login page if not logged in
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

$admin_id = $_SESSION["admin_id"];
$admin_username = $_SESSION["admin_username"];
$admin_password = $_SESSION["password"];
$admin_email= $_SESSION["email"];

// Handle form submission for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_email = $_POST["email"];
    $new_password = $_POST["password"];

    // Update the user information in the database
    $stmt = $conn->prepare("UPDATE admin SET email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("sss", $new_email, $new_password, $admin_id);
    $stmt->execute();
    $stmt->close();
}

// Retrieve user-specific information
$stmt = $conn->prepare("SELECT email, password FROM admin WHERE id = ?");
$stmt->bind_param("s", $admin_id);
$stmt->execute();
$stmt->bind_result($email, $password);
$stmt->fetch();
$stmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Club</title>
    <link rel="stylesheet" type="text/css" href="../munh/style.css">
    <link rel="stylesheet" type="text/css" href="../munh/style1.css">
    <style>
        body{background-color:rgb(203, 135, 235);}
    </style>
</head>
<body>
    <table class="main">
        <tr>
            <td class="home">
                <ul>
                    <li class="li"><a href="../nomin/admin_home.php">Home</a></li>
                    <li class="li"><a href="../nomin/admin_account.php">My account</a></li>
                    <li class="li"><a href="../saruul/admin.php">Logout</a></li>
                </ul>
            </td>
        </tr>
    </table>
    <div class="container">
        <p class="h">My Account</p>
        <div class="form-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return showSuccessAlert();">
            <div class="input-name">
                <label for="username">Username: <?php echo $admin_username; ?></label>
            </div>
            <div class="input-name">
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-name">
                <label for="password">Password:</label>
                <input type="text" name="password" value="<?php echo $password; ?>">
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
