<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background-color:white;">
    <div class="container">
        <h2>Login Club</h2>
        <div class="form-container">
            <form action="log2.php" method="post">
                <div class="input-container">
                    <div class="input-name">
                        <input type="text" name="student_code" placeholder="Student ID" class="text-name">
                    </div>

                    <div class="input-name">
                        <input type="password" name="pass" placeholder="Password" class="text-name">
                        <?php
                        session_start();
                        if (isset($_SESSION["error"]) && $_SESSION["error"] == "incorrect_pass") {
                            echo '<span > <font color="red">Incorrect password. Please try again.</font></span>';
                            unset($_SESSION["error"]); // Clear the session variable after displaying the message
                        }
                        ?>
                        <p class="register-link">Don't have an account? <a href="reg.php">Register here</a></p>
                    </div>
                </div>

                <div class="input-name">
                    <center><input type="submit" name="login" value="Login" onclick="location.href='./saruul/index.php';" class="button"><center>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
