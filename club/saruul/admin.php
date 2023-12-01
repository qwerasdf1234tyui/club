<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background-color:#BB8FCE;">
    <div class="container">
        <h2>Admin Login</h2>
        <div class="form-container">
            <form action="admin_process_login.php" method="post">
                <div class="input-container">
                    <div class="input-name">
                        <input type="text" name="admin_id" placeholder="Username" class="text-name">
                    </div>

                    <div class="input-name">
                        <input type="password" name="admin_pass" placeholder="Password" class="text-name">
                    </div>
                </div>

                <div class="button-container">
                    <input type="submit" name="login" value="Login" onclick="location.href='admin_process.php';"class="button">
                    <input type="button" value="Cancel" onclick="location.href='../nomin/index.php';" class="button">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
